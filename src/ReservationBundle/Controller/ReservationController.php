<?php

namespace ReservationBundle\Controller;

use Cassandra\Date;
use Dompdf\Dompdf;
use Dompdf\Options;
use ReservationBundle\Entity\Invoices;
use Symfony\Component\HttpFoundation\Request ;
use ReservationBundle\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ReservationBundle\Form\ReservationForm;
use Symfony\Component\Security\Core\Security;

use ReservationBundle\Services\PdfGenerator;

/**
 * Reservation controller.
 *
 */
class ReservationController extends Controller
{
    /**
     * Lists all reservation entities.
     *
     */

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('ReservationBundle:Reservation')->findAll();

        return $this->render('reservation/index.html.twig', array(
            'reservations' => $reservations,
        ));
    }

    /**
     * Finds and displays a reservation entity.
     *
     */
    public function showAction(Reservation $reservation)
    {

        return $this->render('reservation/show.html.twig', array(
            'reservation' => $reservation,
        ));
    }


    public function addReservationAction(Request $request){


        $em =$this->getDoctrine()->getManager();
        $chambres = $em->getRepository('ChambreBundle:Chambre')->findAll();
        $Reservation = new Reservation();
        $form = $this->createForm(ReservationForm::class,$Reservation);
        $form->handleRequest($request);
        $Reservation->setClient($this->getUser());


        if($form->isSubmitted() && $form->isValid())
        {
            if($this->getUser() == null){

                return $this->redirect("/login");
            }
            //$this->generatepdf('@Reservation/Factures/facture.html.twig',array('reservation' => $Reservation));
            $invoice = new Invoices();

            $em->persist($Reservation);
            $em->flush();
            $invoice->setDate(date_create_from_format('Y-m-d',date('Y-m-d')));
            $invoice->setReservation($Reservation);
            $em->persist($invoice);
            $em->flush();

            return $this->render('@Reservation/Factures/facture.html.twig',array('invoice' => $invoice));
        }

        return $this->render("@Reservation/Default/reservation.html.twig",
            array(
                'Form'=>$form->createView(),
                'chambres' =>  $chambres

            )
        );
    }
    public function aproposAction(){
        return $this->render('@Reservation/Default/apropos.html.twig');
    }

    public function generatepdf($file,array $options){
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView($file, $options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
    }


    public function facturerAction($id,$action){

        $em = $this->getDoctrine()->getManager();
        $invoice = $em->getRepository("ReservationBundle:Invoices")->find($id);
        if($action == 'download') {
            $this->generatepdf('@Reservation/Factures/facture.html.twig', array('invoice' => $invoice, 'action' => $action));
        }

    }

}

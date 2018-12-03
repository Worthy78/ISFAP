<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\AbonneNewlestter;
use App\Entity\ContactMessage;
use App\Repository\SlidersRepository;
use App\Entity\Sliders;

class FrontController extends AbstractController
{
    /**
     * @Route("/front", name="front")
     */
    public function index()
    {
        $sliders = $this->getDoctrine()->getRepository(Sliders::class)->findAll();

        return $this->render('front/index.html.twig', [
            'sliders' => $sliders,
        ]);
    }

    /**
     *@Route("contact", name="contact")
     */
    public function contact()
    {
        return $this->render('front/contact.html.twig');
    }

    /**
     * @Route(name="abonnementNewlestter")
     */
    public function abonnementNewlestter(Request $request)
    {
        if ($request->isMethod('post')) {
            $email = $request->get('email');
            $abon = new AbonneNewlestter();
            $em = $this->getDoctrine()->getManager();
            $abon->setEmail($email);
            $em->persist($abon);
            $em->flush();

            return $this->render('front/index.html.twig');
        }

        return $this->render('front/index.html.twig');
    }

    /**
     * @Route("/putMessage", name="message")
     */
    public function newMessage(Request $request)
    {
        if ($request->isMethod('post')) {
            $nom = $request->get('nom');
            $email = $request->get('email');
            $message = $request->get('message');
            $contact = new ContactMessage();
            $em = $this->getDoctrine()->getManager();
            $date = new\DateTime('now');
            $contact->setNom($nom);
            $contact->setEmail($email);
            $contact->setMessage($message);
            $contact->setDate($date);
            $em->persist($contact);
            $em->flush();

            return $this->render('front/index.html.twig');
        }

        return $this->render('front/index.html.twig');
    }
}

<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Filieres;
use App\Form\FilieresType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Sliders;
use App\Entity\AbonneNewlestter;
use App\Form\SlidersType;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/abone", name="abone")
     */
    public function abone()
    {
        $abones = $this->getDoctrine()->getRepository(AbonneNewlestter::class)->findAll();

        return $this->render('admin/abone.html.twig', [
            'abones' => $abones,
        ]);
    }

    /**
     * @Route("/slider", name="slider")
     */
    public function slider(Request $request)
    {
        $sliders = $this->getDoctrine()->getRepository(Sliders::class)->findAll();
        $slider = new Sliders();
        $form = $this->createForm(SlidersType::class, $slider);
        $em = $this->getDoctrine()->getManager();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $text = $slider->getText();
            $background = $slider->getBackground();
            $fileName = md5(uniqid()).'.'.$background->guessExtension();
            $background->move($this->getParameter('upload_slider'), $fileName);
            $slider->setBackground($fileName);
            $slider->setText($text);
            $em->persist($slider);
            $em->flush();

            return $this->redirectToRoute('slider');
        }

        return $this->render('admin/slider.html.twig', [
            'sliders' => $sliders,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/filiers", name="filiers")
     */
    public function filiers(Request $request) {

        $filiers = $this->getDoctrine()->getRepository(Filieres::class)->findAll();
        $categories = $this->getDoctrine()->getRepository(Categories::class)->findAll();
        $filier = new Filieres();
        $form = $this->createForm(FilieresType::class, $filier);
        $em = $this->getDoctrine()->getManager();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        $libelle = $filier->getLibelle();
        $duree = $filier->getDuree();
        $niveau = $filier->getNiveau();
        $inscriptoin = $filier->getInscription();
        $mensualiteDB = $filier->getMensualiteDemiBourse();
        $mensualiteBE = $filier->getMensualiteBourseEntiere();
        $mensualiteNB = $filier->getMensualiteNomBoursier();
        $categorie = $filier->getCategorie();
        $filier->setLibelle($libelle);
        $filier->setDuree($duree);
        $filier->setNiveau($niveau);
        $filier->setInscription($inscriptoin);
        $filier->setMensualiteDemiBourse($mensualiteDB);
        $filier->setMensualiteBourseEntiere($mensualiteBE);
        $filier->setMensualiteNomBoursier($mensualiteNB);
        $em->persist($filier);
        $em->flush();

        return $this->redirectToRoute('filiers');
        }
            return $this->render('admin/filiere.html.twig', array(
            'filiers'=>$filiers,
            'categories'=>$categories,
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route(name="addCategorie")
     */
    public function addCategorie(Request $request){

        if ($request->isMethod('post')) {

            $categorie = new Categories();
            $em = $this->getDoctrine()->getManager();
            $value = $request->get('categorie');
            $categorie->setLibelle($value);
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('filiers');
        }
        return $this->redirectToRoute('filiers');

    }
}

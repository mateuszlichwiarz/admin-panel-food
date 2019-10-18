<?php

    namespace App\Controller;

    use App\Entity\Food;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class FoodController extends AbstractController
    {
        /**
         * @Route("/food")
         */
        public function index() {

            $foods = $this->getDoctrine()->getRepository(Pizza::class)->findAll();

            return $this->render('food/index.html.twig', array('foods' => $foods));
        }
    }
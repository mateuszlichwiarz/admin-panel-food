<?php

    namespace App\Controller;

    use App\Entity\Food;

    use FOS\RestBundle\Controller\FOSRestController;
    use FOS\RestBundle\Controller\Anoonations as Rest;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class FoodController extends AbstractController
    {
        /**
         * @Route("/food")
         */
        public function index() {

            $foods = $this->getDoctrine()->getRepository(Food::class)->findAll();

            return $this->render('food/index.html.twig', array('foods' => $foods));
        }
    }
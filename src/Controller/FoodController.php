<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class FoodController extends AbstractController
    {
        /**
         * @Route("/food")
         */
        public function index() {
            return new Response('<html><body>Hello world!</body></html>');
        }
    }
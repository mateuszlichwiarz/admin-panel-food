<?php

    namespace App\Controller;

    use Symfony\Componen\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class FoodController
    {
        public function index() {
            return new Response('<html><body>Hello world!</body></html>');
        }
    }
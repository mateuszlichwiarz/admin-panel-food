<?php

    namespace App\Controller;

    use Symfony\Componen\HttpFoundation\Response;

    class FoodController
    {
        public function index() {
            return new Response('<html><body>Hello world!</body></html>');
        }
    }
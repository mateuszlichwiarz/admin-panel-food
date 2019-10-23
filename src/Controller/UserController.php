<?php

    namespace App\Controller;

    use App\Form\Type\UserType;

    use App\Entity\Food;

    use FOS\RestBundle\Controller\FOSRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * @Route("/users", name="_users")
     */
    class UserController extends FOSRestController
    {
        /**
         *  @Rest\Get("/login")
         * 
         * @return Response
         */
        public function login() {
            $food = new Food;

            $form = $this->createForm(UserType::class, $food, [
                'method' => 'POST'
            ]);
            
            return $this->render('user/login.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }
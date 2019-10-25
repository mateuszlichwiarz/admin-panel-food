<?php

    namespace App\Controller;

    use App\Form\Type\UserType;

    use App\Entity\Users;

    use FOS\RestBundle\Controller\FOSRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\Security\Http\Authentications\AuthenticationUtils;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * Class UserController
     * @Route("/users", name="_users")
     */
    class UserController extends FOSRestController
    {
        /**
         *  @Rest\Get("/login", name="login")
         * 
         * @return Response
         */
        public function login() {
            
        }
    }
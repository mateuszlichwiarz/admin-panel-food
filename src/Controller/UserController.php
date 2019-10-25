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
        public function login(Request $request, AuthenticationUtils $authenticationUtils) {
            $errors = $authenticationUtils->getLastAuthenticationError();
            $lastUsername = $authenticationUtils->getLastUsername();

            return $this->render('User/login.html.twig', [
                'errors' => $errors,
                'username' => $lastUsername
            ]);
        }

        /**
         * @Rest\Get("/logout", name="logout")
         */
        public function logout(): Response {}
    }
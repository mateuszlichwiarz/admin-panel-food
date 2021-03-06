<?php


    namespace App\Controller; 

    use FOS\RestBundle\Controller\AbstractFOSRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Security\Http\Authentication\AuthenticationUtils; 

 
    /**
     * Class UserController
     * 
     *
     * @package App\Controller
     * @Route("admin")
     * 
     */
    class UserController extends AbstractFOSRestController {
    
        /**
        * @Route("/login", name="login")
        *
        * @return Response
        */ 
        public function login(Request $request, AuthenticationUtils $authenticationUtils) {
            $errors = $authenticationUtils->getLastAuthenticationError();
            $lastUsername = $authenticationUtils->getLastUsername();
            
            return $this->render('user/login.html.twig', [
                'errors' => $errors,
                'username' => $lastUsername
            ]);
        }
            
        /**
        * @Route("/logout", name="logout")
        */
        public function logout() : Response {}

    }
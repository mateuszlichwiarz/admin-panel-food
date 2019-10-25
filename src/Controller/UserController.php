<?php

    namespace App\Controller; 
 
    use FOS\RestBundle\Controller\FOSRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Security\Http\Authentication\AuthenticationUtils; 

 
    /**
     * Class UserController
     * 
     *
     * @package App\Controller
     * 
     * 
     */
    class UserController extends FOSRestController {
    
    /**
    * @Route("users/login", name="login")
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
    * 
    * @return Response
    */
    public function logout() : Response {}
    
    }
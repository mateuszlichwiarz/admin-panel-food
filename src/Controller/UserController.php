<?php


    namespace App\Controller; 
    
    use App\Entity\Food;

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
     * @Route("admin")
     * 
     */
    class UserController extends FOSRestController {
    
    /**
    * @Route("/login", name="login")
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
     * @Rest\Get("/food")
     */
    public function adminPanel() {
        $foods = $this->getDoctrine()->getRepository(Food::class)->findAll();

        $admin = 0;

        return $this->render('food/index.html.twig', array(
            'foods' => $foods,
            'admin' => $admin
        ));
    }
        
    /**
    * @Rest\Get("/logout", name="logout")
    * 
    * @return Response
    */
    public function logout() : Response {}
    
>>>>>>> new_feature
    }
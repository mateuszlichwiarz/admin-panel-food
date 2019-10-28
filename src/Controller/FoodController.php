<?php

    namespace App\Controller;

    use App\Entity\Food;

    use App\Form\Type\ItemType;

    use FOS\RestBundle\Controller\FOSRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * Food controller
     * @Route("/admin/food", name="_food")
     */
    class FoodController extends FOSRestController
    {
        /**
         * @Rest\Get("")
         * 
         * @return Response
         */
        public function index() {

            $foods = $this->getDoctrine()->getRepository(Food::class)->findAll();

            return $this->render('food/index.html.twig', array('foods' => $foods));
        }

        /**
         * @Rest\Get("/{id}")
         * 
         * @return Response
         */
        public function showItem($id) {

            $item = $this->getDoctrine()->getRepository(Food::class)->find($id);

            return $this->render('food/show.html.twig', array('item' => $item));
        }

        /**
         * @Rest\Put("/{id}")
         * 
         * @return Response
         */
        public function editItem($id) {

            $item = new Food();
            $item = $this->getDoctrine()->getRepository(Food::class)->find($id);

            $form = $this->createForm(ItemType::class, $item, [
                'method' => 'PUT'
            ]);

            return $this->render('food/edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }
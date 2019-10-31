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

        public function showItemType() {
            
        }

        /**
         * @Rest\Get("/{id}")
         * 
         * @return Response
         */
        public function showItem($id) {

            $item = $this->getDoctrine()->getRepository(Food::class)->find($id);

            $type = $item->getType();
            $ucfirstType = ucfirst($type);

            $name = $item->getName();
            $ucfirstName = ucfirst($name);

            return $this->render('food/show.html.twig', array(
                'item' => $item, 
                'type' => $ucfirstType, 
                'name' => $ucfirstName
            ));
            
        }

        /**
         * @Route(
         *      "/{slug}",
         *      name="show_type",   
         *      requirements={
         *          "slug": "pizza|burger|salad|others"
         *      }
         * )
         */
        public function showItemType($slug) {
            
            $foods = $this->getDoctrine()->getRepository(Food::class)->findBy(array("type" => $slug));

            $ucfirstType = ucfirst($slug);

            return $this->render('food/itemtype.html.twig', array(
                'foods' => $foods, 
                'type' => $ucfirstType
            ));
        }

        /**
         * @Rest\Put("/{id}")
         * 
         * @return Response
         */
        public function editItem(Request $request, $id) {

            $item = new Food();
            $item = $this->getDoctrine()->getRepository(Food::class)->find($id);

            $form = $this->createForm(ItemType::class, $item, [
                'method' => 'PUT'
            ]);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
                
                $url = '/admin/food'.'/'.$id;

                return $this->redirect($url);
            }

            return $this->render('food/edit.html.twig', array(
                'form' => $form->createView()
            ));
        }

        /**
         * @Rest\Delete("/{id}")
         */
        public function deleteItem(Request $request, $id) {
            $food = $this->getDoctrine()->getRepository(Food::class)->find($id);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($food);
            $entityManager->flush();

            $response = new Response();
            $response->send();

        }

        /**
         * @Rest\Post("/new", name="new_item")
         * 
         * @return Response
         */
        public function newItem(Request $request) {

            $item = new Food();

            $form = $this->createForm(ItemType::class, $item, [
                'method' => 'POST'
            ]);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $item = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($item);
                $entityManager->flush();

                return $this->Redirect('/admin/food');
            }

            return $this->render('food/new.html.twig', array(
                'form' => $form->createView()
            ));

        }
    }
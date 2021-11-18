<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomePageController extends AbstractController
{
    /**
     * @Route("/{limit}", name="home_page", defaults={"limit": 25})
     */
    public function index(int $limit): Response
    {
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $products = $productRepository->findBy(
            array(),
            array('id' => 'ASC'),
            $limit,
            0
        );

        return $this->render('home_page/index.html.twig', [
            'allProducts' => $products,
        ]);
    }

    /**
     * @Route("/api/getProducts", name="get_products", methods={"GET"})
     */
    public function getProducts(Request $request): Response
    {
        $offset = $request->query->get('offset') ?? 0;
        $limit = $request->query->get('limit') ?? 25;
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $products = $productRepository->findBy(
            array(),
            array('id' => 'ASC'),
            $limit,
            $offset
        );
        return $this->json($products);
    }
}

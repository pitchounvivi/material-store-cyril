<?php

namespace App\Controller\Store;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/store/product", name="store_product")
     */
    public function index()
    {
        return $this->render('store/product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}

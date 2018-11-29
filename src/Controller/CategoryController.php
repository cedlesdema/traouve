<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Traobject;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends BaseController
{
    /**
     * @Route("/category", name="category")
     */
    public function footerCategory()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('category/footercategory.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/{id}", name="category_show", methods="GET")
     */
    public function show(Category $category): Response
    {
        $category = $this->getDoctrine()->getRepository(Traobject::class)->findBy(["id" => Category::class]);

        return $this->render('category/show.html.twig', [
            'category' => $category
        ]);
    }
}

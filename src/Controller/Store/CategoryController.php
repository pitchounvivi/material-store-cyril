<?php

namespace App\Controller\Store;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Service\FooService;
use App\Service\Form\FlusherService;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/store/category")
 */
class CategoryController extends AbstractController
{

    /**
     * @Route(
     *     "/",
     *     name="store_category_show_all",
     *     methods={"GET"}
     * )
     *
     * @param CategoryRepository $repository
     *
     * @return Response
     */
    public function showAll(CategoryRepository $repository): Response
    {
        return $this->render('store/category/show_all.html.twig', [
            'categories' => $repository->findAll(),
        ]);
    }

    /**
     * @Route(
     *     "/{id<\d{1,3}>}",
     *     name="store_category_show",
     *     methods={"GET"}
     * )
     *
     * @param Category $category
     *
     * @return Response
     */
    public function show(Category $category): Response
    {
        return $this->render('store/category/show.html.twig', [
            "category" => $category
        ]);
    }

    /**
     * @Route(
     *     "/new",
     *     name="store_category_new",
     *     methods={"GET","POST"}
     * )
     *
     * @param Request $request
     * @param FlusherService $flusher
     *
     * @return Response
     */
    public function new(Request $request, FlusherService $flusher): Response
    {
        $form = $this->createForm(CategoryType::class, new Category())->handleRequest($request);
        if ($flusher->flush($form, "Category already exists", true)) {
            return $this->redirectToRoute("store_category_show_all");
        }
        return $this->render('store/category/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route(
     *     "/{id<\d{1,3}>}/edit",
     *     name="store_category_edit",
     *     methods={"GET","POST"}
     * )
     *
     * @param Category $category
     * @param Request $request
     *
     * @return Response
     */
    public function edit(Category $category, Request $request): Response
    {
        $form = $this->createForm(CategoryType::class, $category)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            try {
                $manager->flush();
                return $this->redirectToRoute("store_category_show", ["id" => $category->getId()]);
            } catch (UniqueConstraintViolationException $exc) {
                $form->addError(new FormError("Category already exists"));
            }
        }
        return $this->render('store/category/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route(
     *     "/{id<\d{1,3}>}/delete",
     *     name="store_category_delete",
     *     methods={"DELETE"}
     * )
     *
     * @param Category $category
     *
     * @return Response
     */
    public function delete(Category $category, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $category->getId(), $request->request->get("_token"))) {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($category);
            $manager->flush();
        }
        return $this->redirectToRoute("store_category_show_all");
    }

}

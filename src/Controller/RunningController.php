<?php

namespace App\Controller;

use App\Entity\Running;
use App\Form\RunningType;
use App\Repository\RunningRepository;
use App\Service\CalculAverage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/running")
 */
class RunningController extends AbstractController
{
    /**
     * @Route("/", name="running_index", methods={"GET"})
     */
    public function index(RunningRepository $runningRepository): Response
    {
        return $this->render('running/index.html.twig', [
            'runnings' => $runningRepository->findBy(['user' => $this->getUser()]),
        ]);
    }

    /**
     * @Route("/new", name="running_new", methods={"GET","POST"})
     */
    public function new(Request $request, CalculAverage $calculAverage): Response
    {
        $running = new Running();
        $form = $this->createForm(RunningType::class, $running);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $running->setUser($this->getUser());

            $calculAverage->calculAverage($running);

            $entityManager->persist($running);
            $entityManager->flush();

            return $this->redirectToRoute('running_index');
        }

        return $this->render('running/new.html.twig', [
            'running' => $running,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="running_show", methods={"GET"})
     */
    public function show(Running $running): Response
    {
        return $this->render('running/show.html.twig', [
            'running' => $running,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="running_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Running $running, CalculAverage $calculAverage): Response
    {
        $form = $this->createForm(RunningType::class, $running);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $calculAverage->calculAverage($running);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('running_index', [
                'id' => $running->getId(),
            ]);
        }

        return $this->render('running/edit.html.twig', [
            'running' => $running,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="running_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Running $running): Response
    {
        if ($this->isCsrfTokenValid('delete'.$running->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($running);
            $entityManager->flush();
        }

        return $this->redirectToRoute('running_index');
    }

}

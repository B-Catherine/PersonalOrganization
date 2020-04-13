<?php

namespace App\Controller;

use App\Entity\PersonalEvent;
use App\Form\PersonalEventType;
use App\Repository\PersonalEventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/personal/event")
 */
class PersonalEventController extends AbstractController
{
    /**
     * @Route("/", name="personal_event_index", methods={"GET"})
     */
    public function index(PersonalEventRepository $personalEventRepository): Response
    {
        return $this->render('personal_event/index.html.twig', [
            'personal_events' => $personalEventRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="personal_event_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $personalEvent = new PersonalEvent();
        $form = $this->createForm(PersonalEventType::class, $personalEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($personalEvent);
            $entityManager->flush();

            return $this->redirectToRoute('personal_event_index');
        }

        return $this->render('personal_event/new.html.twig', [
            'personal_event' => $personalEvent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personal_event_show", methods={"GET"})
     */
    public function show(PersonalEvent $personalEvent): Response
    {
        return $this->render('personal_event/show.html.twig', [
            'personal_event' => $personalEvent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="personal_event_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PersonalEvent $personalEvent): Response
    {
        $form = $this->createForm(PersonalEventType::class, $personalEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personal_event_index');
        }

        return $this->render('personal_event/edit.html.twig', [
            'personal_event' => $personalEvent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personal_event_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PersonalEvent $personalEvent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personalEvent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($personalEvent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('personal_event_index');
    }
}

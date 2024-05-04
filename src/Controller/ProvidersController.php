<?php

namespace App\Controller;

use App\Entity\Providers;
use App\Form\ProvidersType;
use App\Repository\ProvidersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/providers')]
class ProvidersController extends AbstractController
{
    #[Route('/', name: 'app_providers_index', methods: ['GET'])]
    public function index(ProvidersRepository $providersRepository): Response
    {
        return $this->render('providers/index.html.twig', [
            'providers' => $providersRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_providers_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $provider = new Providers();
        $form = $this->createForm(ProvidersType::class, $provider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($provider);
            $entityManager->flush();

            return $this->redirectToRoute('app_providers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('providers/new.html.twig', [
            'provider' => $provider,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_providers_show', methods: ['GET'])]
    public function show(Providers $provider): Response
    {
        return $this->render('providers/show.html.twig', [
            'provider' => $provider,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_providers_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Providers $provider, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProvidersType::class, $provider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_providers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('providers/edit.html.twig', [
            'provider' => $provider,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_providers_delete', methods: ['POST'])]
    public function delete(Request $request, Providers $provider, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$provider->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($provider);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_providers_index', [], Response::HTTP_SEE_OTHER);
    }
}

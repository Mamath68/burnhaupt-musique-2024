<?php

namespace App\Controller;

use App\Entity\Familly;
use App\Form\FamillyType;
use App\Repository\FamillyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/familly')]
class FamillyController extends AbstractController
{
    #[Route('/', name: 'app_familly_index', methods: ['GET'])]
    public function index(FamillyRepository $famillyRepository): Response
    {
        return $this->render('familly/index.html.twig', [
            'famillies' => $famillyRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_familly_show', methods: ['GET'])]
    public function show(Familly $familly): Response
    {
        return $this->render('familly/show.html.twig', [
            'familly' => $familly,
        ]);
    }

}

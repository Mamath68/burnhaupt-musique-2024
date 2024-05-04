<?php

namespace App\Controller;

use App\Entity\Subfamilly;
use App\Form\SubfamillyType;
use App\Repository\SubfamillyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/subfamilly')]
class SubfamillyController extends AbstractController
{
    #[Route('/', name: 'app_subfamilly_index', methods: ['GET'])]
    public function index(SubfamillyRepository $subfamillyRepository): Response
    {
        return $this->render('subfamilly/index.html.twig', [
            'subfamillies' => $subfamillyRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_subfamilly_show', methods: ['GET'])]
    public function show(Subfamilly $subfamilly): Response
    {
        return $this->render('subfamilly/show.html.twig', [
            'subfamilly' => $subfamilly,
        ]);
    }

}

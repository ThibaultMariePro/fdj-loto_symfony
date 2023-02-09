<?php

namespace App\Controller;

use App\Entity\Grid;
use App\Form\GridType;
use App\Repository\GridRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/game', name: 'game')]
class GameController extends AbstractController
{
    #[isGranted('ROLE_USER')]
    #[Route('/play', name: '_play')]
    public function createGrid(
        EntityManagerInterface $em,
        Request $rq
    ): Response
    {
        $grid = new Grid();
        $gridForm = $this->createForm(GridType::class, $grid)->handleRequest($rq);
        if($gridForm->isSubmitted()&&$gridForm->isValid()){
            $em->persist();
            $em->flush();
            return $this->redirectToRoute('game_mygrids');
        }
        return $this->render('game/play.html.twig', compact('gridForm'));
    }
    #[isGranted('ROLE_USER')]
    #[Route('/mygrids', name: '_mygrids')]
    public function mygrids(
        GridRepository $gridRepository
    ): Response{
        $grids = $gridRepository->findAll();
        return $this->render(
            'game/play.html.twig',
            compact('grids')
        );

    }
}

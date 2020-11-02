<?php

namespace App\Controller;

use App\Repository\ExpressionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/", name="profile")
     */
    public function index(ExpressionRepository $expressionRepository): Response
    {

        return $this->render('profile/index.html.twig', [
            'expressions' => $expressionRepository->findAllForUserPaginated($this->getUser())
        ]);
    }
}

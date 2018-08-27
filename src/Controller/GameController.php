<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/game")
 */
class GameController extends Controller
{
    /**
     * @Route("", name="game.index")
     */
    public function index()
    {
        return $this->render('game/index.html.twig');
    }
}

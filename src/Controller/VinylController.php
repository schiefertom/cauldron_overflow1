<?php

namespace App\Controller;

use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{

    #[Route('/', name: 'homepage')]
    public function homepage(): Response
    {
        $tracks = [
          ['songName' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
          ['songName' => 'Sinnermann', 'artist' => 'Prelude Mix'],
          ['songName' => 'Grandma', 'artist' => 'Dole & Korn'],
          ['songName' => 'Black Betty', 'artist' => 'Ram Jam'],
          ['songName' => 'Das Elfte Gebot', 'artist' => 'Feuerschwanz']
        ];

        //first parameter is the name of the twig template, second parameter is an array of variables passed to the twig template
        return $this->render('vinyl/homepage.html.twig', [
            'title' => "DJ Toms Mega Collection",
            'tracks' => $tracks
        ]);
    }

    #[Route('/browse/{slug}', name: 'browse')]
    public function browse(string $slug = null): Response
    {
        if($slug) {
            $title = u(str_replace('-', ' ', $slug))->title(true);
        }
        else {
            $title = 'All Genres';
        }

        return new Response('Genre: '.$title);
    }

}
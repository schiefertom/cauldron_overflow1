<?php

namespace App\Controller;

use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController
{

    #[Route('/', name: 'homepage')]
    public function homepage(): Response
    {
        return new Response('Title: DJ Toms Mega Collection');
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
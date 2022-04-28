<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{

    #[Route('/', name: 'vinyl_homepage')]
    public function homepage(): Response
    {
        $tracks = [
          ['songName' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
          ['songName' => 'Sinnermann', 'artist' => 'Prelude Mix'],
          ['songName' => 'Grandma', 'artist' => 'Dole & Korn'],
          ['songName' => 'Black Betty', 'artist' => 'Ram Jam'],
          ['songName' => 'Das Elfte Gebot', 'artist' => 'Feuerschwanz']
        ];
        dump($tracks);
        //first parameter is the name of the twig template, second parameter is an array of variables passed to the twig template
        return $this->render('vinyl/homepage.html.twig', [
            'title' => "DJ Toms Mega Collection",
            'tracks' => $tracks
        ]);
    }

    #[Route('/browse/{slug}', name: 'vinyl_browse')]
    public function browse(Request $request, $_route, string $slug = null): Response
    {
        $test = $request->query->get('test');
        if($test){
            dump($request, $_route, $request->attributes);
        }
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig', ['genre'=>$genre]);
    }

}
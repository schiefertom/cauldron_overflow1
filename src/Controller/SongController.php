<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('api/songs/{id<\d+>}', name: 'vinyl_song_getsong', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        //TODO: query the DB
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3'
        ];

        $logger->log(LogLevel::WARNING, "TSIE warning");

        //equivalent to return $this->($song);
        return new JsonResponse($song);
    }
}
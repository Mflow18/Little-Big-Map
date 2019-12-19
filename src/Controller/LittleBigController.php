<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class LittleBigController extends AbstractController
{
    /**
     * @Route("/little/big", name="little_big")
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function index(HttpClientInterface $httpClient)
    {
        $user = $this->getUser();
        $categories = $user->getCategories()->toArray();
        $array = count($categories);
        $string = '';
        foreach ($categories as $key => $word) {
            $input = $word->getName();
            $string = $string . ',' . $input;
        }
        $response = $httpClient->request('POST', 'http://327d2793.ngrok.io/api', [
                'json' => 'Nantes'.$string
            ]
        );
        dd($response->getContent());
        return $this->render('little_big/index.html.twig', [
            'controller_name' => 'LittleBigController',
        ]);
    }
}

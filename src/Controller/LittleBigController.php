<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LittleBigController extends AbstractController
{
    /**
     * @Route("/little/big", name="little_big")
     */
    public function index(Request $request)
    {
        $client = HttpClient::create();
        $request = $client->request('GET', "http://cf6ed779.ngrok.io/api?id=Nantes&fruit=banane");
        dd($request);
        return $this->render('little_big/index.html.twig', [
            'controller_name' => 'LittleBigController',
        ]);
    }
}

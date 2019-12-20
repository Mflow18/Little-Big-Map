<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\User;
use App\Entity\UserAddresses;
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
        $string = '';
        foreach ($categories as $key => $word) {
            $input = $word->getName();
            $string = $string . ',' . $input;
        }
        $response = $httpClient->request('POST', 'http://3334296f.ngrok.io/api', [
                'json' => $string
            ]
        );
        $array = json_decode($response->getContent());
        $entityManager = $this->getDoctrine()->getManager();
        foreach($array as $key => $value) {
            $userAddress = new UserAddresses();
            $userAddress->setCategory($value->Category);
            $userAddress->setLatitude($value->Latitude);
            $userAddress->setLongitude($value->Longitude);
            $userAddress->setName($value->Nom);
            $userAddress->addUser($user);
            $entityManager->persist($userAddress);
        }
        $entityManager->flush();
       $addresses = $user->getAddresses();
        return $this->render('little_big/index.html.twig', [
            'controller_name' => 'LittleBigController',
            'addresses' => $addresses,
        ]);
    }
}

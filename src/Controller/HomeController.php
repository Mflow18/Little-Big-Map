<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/creeruncompte", name="createaccount")
     */
    public function createaccount(Request $request, UserPasswordEncoderInterface $encoder, HttpClientInterface $httpClient): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $plainpassword = $user->getPassword();
            $encodedPassword = $encoder->encodePassword($user, $plainpassword);
            $user->setPassword($encodedPassword);
            $httpClient->request('POST', 'http://cc9433c7.ngrok.io/api', [
                    'json' => ['firstName' => $user->getLastName(),
                    ]
                ]
            );
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('home', [
                'user' => $user,
            ]);
        }

        return $this->render('/home/createaccount.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
        ]);
    }
}

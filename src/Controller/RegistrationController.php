<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="api_")
 */
class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'register', methods:'POST')]
    public function index(ManagerRegistry $doctrine, Request $request, UserPasswordHasherInterface $passwordHarsher): Response
    {
        $em = $doctrine->getManager();
       // dd($request);
        $decoded = json_decode($request->getContent());
        $email = $decoded->email;
        $plaintextPassword = $decoded->password;
        $user = new User();
        $hashedPassword = $passwordHarsher->hashPassword($user, $plaintextPassword);
        $user->setPassword($hashedPassword);
        $user->setEmail($email);
        $user->setUsername($email);
        $em->persist($user);
        $em->flush();

        return $this->json(['message'=>'Registered Successfully']);
       // return $this->render('registration/index.html.twig', [
        //    'controller_name' => 'RegistrationController',
       // ]);
    }
    
    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('registration/index.html.twig', [
            'controller_name' => 'RegistrationController',
        ]);
    }
}

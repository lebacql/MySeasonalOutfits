<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Bundle\SecurityBundle\Security;

class ApiLoginController extends AbstractController
{
    
    #[Route('/api/connexion', name: 'api_login')]
    public function login(#[CurrentUser] ?User $user, Request $request, Security $security)
    {
        $firewallName = $security->getFirewallConfig($request)?->getName();

        $data = json_decode($request->getContent(), true);

        $email = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        return $this->json([
            'firewall' => $firewallName,
            'email' => $email,
            'password' => $password,
            'user' => $user
            //  'user'  => $user->getUserIdentifier(),
            //  'token' => $token,
        ]);
    } 


    public function getToken(): ?TokenInterface
    {
        return $this->container->get('security.token_storage')->getToken();
    }
    
} 

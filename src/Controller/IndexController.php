<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegistrationFormType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/IndexController.php',
        ]);
    }
    
  

       
       private $entityManager;
   
      public function __construct(EntityManagerInterface $entityManager)
      {
        
         $this->entityManager = $entityManager;
        
   
      }
    /**
 * @Route("/inscription", name="inscription")
 */
public function register(Request $request, ValidatorInterface $validator): Response
{
  $us = new Utilisateur();
  $us->setNom('aziz');
  $us->setRole('user');
  $us->setAdresse('azizhassine673@gmail.com');

  $this->entityManager->persist($us);
  $this->entityManager->flush();
  return new Response('user enregisté avec id '.$us->getId());
}
 

  
 
}
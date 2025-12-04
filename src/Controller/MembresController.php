<?php

namespace App\Controller;

use App\Repository\MembresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Membres;
use App\Form\MembreType;
use Doctrine\ORM\EntityManagerInterface;
//use Symfony\Component\Config\Builder\Method;
use Symfony\Component\HttpFoundation\Request;

final class MembresController extends AbstractController
{
    #[Route('/membres', name: 'app_membres', methods: ['GET'])]
    public function index(MembresRepository $membresRepository): Response
    {
        $membres=$membresRepository->findAll(); 
        return $this->render('membres/index.html.twig', [
            'controller_name' => 'MembresController',
            'membres'=>$membres
        ]);
    }
    #[Route('/new', name: 'app_membres_new', methods: ['GET', 'POST'])]
    public function createMembre(Request $request, EntityManagerInterface $entityManager): Response
    {
        $membre = new Membres();
        $form = $this->createForm(MembreType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($membre);
            $entityManager->flush();

            return $this->redirectToRoute('app_membres');
        }

        return $this->render('membres/new.html.twig', [
        
        'form' => $form,
    ]);
    }
     #[Route('delete/{id}', name: 'app_membres_delete', methods: ['GET'])]
    public function delete(int $id,EntityManagerInterface $entityManager, MembresRepository $membreRepository): Response
    {
            $membre = $membreRepository->find($id);
            $entityManager->remove($membre);
            $entityManager->flush();
        

        return $this->redirectToRoute('app_membres', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/edit/{id}', name: 'app_membres_edit',methods:['GET','POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager, int $id): Response
{
    // Récupération du membre
    $membre = $entityManager->getRepository(Membres::class)->find($id);

    if (!$membre) {
        throw $this->createNotFoundException(
            'Aucun membre trouvé avec l\'ID : '.$id
        );
    }
    
    // Création du formulaire
    $form = $this->createForm(MembreType::class, $membre);
    $form->handleRequest($request);

    // Traitement du formulaire
    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        $this->addFlash('success', 'Le membre a été modifié avec succès');

        return $this->redirectToRoute('app_membres_show', [
            'id' => $membre->getIdMembre()
        ]);
    }
    
    return $this->render('membres/edit.html.twig', [
        'form' => $form,
        'membre' => $membre
    ]);
}
    #[Route('/{id}', name: 'app_membres_show',methods: ['GET'])]
    public function show(Membres $membres): Response
    {
        return $this->render('membres/show.html.twig', [
            'membres' => $membres,
        ]);
    }

}

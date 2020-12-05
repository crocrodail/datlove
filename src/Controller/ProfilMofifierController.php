<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ProfilType;
use App\Form\PhotoType;
use App\Entity\User;
use App\Entity\Photos;
use App\Service\FileUploader;
use Doctrine\ORM\Query;

class ProfilMofifierController extends AbstractController
{
    /**
     * @Route("/profil/mofifier", name="profil_mofifier")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(ProfilType::class, $this->getUser());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('default');
        }

        $photos = new Photos();
        $formPhotos = $this->createForm(PhotoType::class, $photos);
        $formPhotos->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();
        $qb = $entityManager->createQueryBuilder();
        $qb->select('u')
           ->from(Photos::class, 'u')
           ->where('u.user_id = '.$this->getUser()->getId());


        return $this->render('profil/mofifier.html.twig', [
            'user' => $this->getUser(),
            'profil' => $form->createView(),
            'photos' => $formPhotos->createView(),
            'my_photos' => $qb->getQuery()->getResult(Query::HYDRATE_ARRAY)
        ]);
    }
    /**
     * @Route("/profil/photo", name="profil_image")
     */
    public function photo(Request $request, FileUploader $file_uploader): Response
    {
      $form = $this->createForm(PhotoType::class);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid())
      {
        $file = $form['url']->getData();
        if ($file)
        {
          $file_name = $file_uploader->upload($file);
          if (null !== $file_name) // for example
          {
            $directory = $file_uploader->getTargetDirectory();
            $full_path = $directory.$file_name;
            move_uploaded_file($file,$full_path);
            $photo = new Photos();
            $entityManager = $this->getDoctrine()->getManager();
            $photo
              ->setUserId($this->getUser()->getId())
              ->setUrl($full_path);
            $entityManager->persist($photo);
            $entityManager->flush();
          }
        }
      }
      return $this->redirectToRoute('profil_mofifier');
    }
}

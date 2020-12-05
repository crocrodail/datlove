<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Query;
use App\Entity\User;
use App\Entity\Photos;

class SwipeController extends AbstractController
{
    /**
     * @Route("/swipe", name="swipe")
     */
    public function index(): Response
    {
      $entityManager = $this->getDoctrine()->getManager();
      $qb = $entityManager->createQueryBuilder();
      $users = $qb->select('u')
         ->from(User::class, 'u')
         ->getQuery()->getResult(Query::HYDRATE_ARRAY);
      foreach ($users as $key => $value) {
        $qb = $entityManager->createQueryBuilder();
        $photos = $qb->select('u')
           ->from(Photos::class, 'u')
           ->where('u.user_id = '.$value['id'])
           ->setMaxResults(1)
           ->getQuery()->getResult(Query::HYDRATE_ARRAY);
          // dd($users[$key]);
        $users[$key]['photo'] = $photos[0]['url'] ?? "";
      }
        return $this->render('swipe/index.html.twig', [
            'users' => $users,
        ]);
    }
}

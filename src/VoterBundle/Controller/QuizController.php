<?php

namespace VoterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;
use VoterBundle\Entity\Quiz;

class QuizController extends Controller
{

    public function indexAction(UserInterface $user) {
        $unanswered = $this->getDoctrine()
            ->getRepository(Quiz::class)
            ->findUnanswered($user);

        return $this->render('@Voter/Quiz/list.html.twig', [
            'unanswered' => $unanswered,
        ]);
    }

    public function showAction(UserInterface $user, Quiz $quiz) {
        return $this->render('@Voter/Quiz/show.html.twig', ['quiz' => $quiz]);
    }
}
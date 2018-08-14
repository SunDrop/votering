<?php

namespace VoterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use VoterBundle\Entity\Quiz;
use VoterBundle\Entity\QuizAnswers;
use VoterBundle\Form\QuizAnswersType;

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
        $quizAnswers = new QuizAnswers;
        $form = $this->buildAnsweredForm($quizAnswers, $quiz);
        return $this->render('@Voter/Quiz/show.html.twig', [
            'quiz' => $quiz,
            'form' => $form->createView(),
        ]);
    }

    public function voteAction(Request $request, UserInterface $user, Quiz $quiz) {
        //TODO: add checkbox form handling
        $quizAnswers = new QuizAnswers;
        $quizAnswers->setUser($user);
        $form = $this->buildAnsweredForm($quizAnswers, $quiz);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($quizAnswers);
            $entityManager->flush();
        }

        return $this->redirectToRoute('voter_quiz');
    }

    private function buildAnsweredForm(QuizAnswers $quizAnswers, Quiz $quiz) : FormInterface {
        return $this->createForm(QuizAnswersType::class, $quizAnswers, [
            'quiz' => $quiz,
        ])
            ->add('submit', SubmitType::class, [
            'label' => 'Vote',
            'attr' => ['class' => 'btn btn-default pull-right'],
        ]);

    }
}
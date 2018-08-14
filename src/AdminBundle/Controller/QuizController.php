<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\QuizType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use VoterBundle\Entity\Quiz;

class QuizController extends Controller {

    public function listAction() {
        $quizes = $this->getDoctrine()
            ->getRepository(Quiz::class)->findAll();

        return $this->render('@Admin/Quiz/list.html.twig', [
            'quizes' => $quizes,
        ]);

    }

    public function editAction(Quiz $quiz) {
        // TODO: check is answered
        var_dump($quiz->getId());
        exit;
    }

    public function newAction(Request $request) {
        $quiz = new Quiz;
        $form = $this->createForm(QuizType::class, $quiz)
            ->add('submit', SubmitType::class, [
                'label' => 'Create',
            ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($quiz);
            $entityManager->flush();

            return $this->redirectToRoute('admin_quiz_list');
        }

        return $this->render('@Admin/Quiz/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function deleteAction(Quiz $quiz) {
        var_dump($quiz->getId());
        exit;
    }

}
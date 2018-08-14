<?php

namespace VoterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use VoterBundle\Entity\Quiz;
use VoterBundle\Entity\QuizAnswers;
use VoterBundle\Entity\QuizOptions;

class QuizAnswersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var Quiz $quiz */
        $quiz = $options['quiz'];
        $builder->add('quizOption', ChoiceType::class, [
            'choices' => $quiz->getQuizOptions(),
            'choice_label' => function($quizOption) {
                /** @var QuizOptions $quizOption */
                return strtoupper($quizOption->getOption());
            },
            'expanded' => true,
            'multiple' => $quiz->getType() != Quiz::TYPE_RADIO,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => QuizAnswers::class,
            'quiz' => null,
        ));
    }
}

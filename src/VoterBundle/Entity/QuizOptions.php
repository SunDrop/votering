<?php

namespace VoterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizOptions
 *
 * @ORM\Entity()
 * @ORM\Table(name="quiz_options")
 */
class QuizOptions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="option", type="string", length=255)
     */
    private $option;

    /**
     * @ORM\ManyToOne(targetEntity="VoterBundle\Entity\Quiz", inversedBy="id")
     */
    private $quiz;

    /**
     * @ORM\OneToMany(targetEntity="VoterBundle\Entity\QuizAnswers", mappedBy="quizOption")
     */
    private $quizAnswers;


    public function getId()
    {
        return $this->id;
    }

    public function setOption(?string $option) : self
    {
        $this->option = $option;

        return $this;
    }

    public function getOption() : ?string
    {
        return $this->option;
    }

    public function getQuiz() : ?Quiz
    {
        return $this->quiz;
    }

    public function setQuiz(?Quiz $quiz) : self
    {
        $this->quiz = $quiz;

        return $this;
    }

}


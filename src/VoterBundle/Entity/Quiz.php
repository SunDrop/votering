<?php

namespace VoterBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Quiz
 *
 * @ORM\Entity(repositoryClass="VoterBundle\Repository\QuizRepository")
 * @ORM\Table(name="quiz")
 */
class Quiz
{
    const TYPE_RADIO = 'radio';
    const TYPE_CHECKBOX = 'checkbox';

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
     * @ORM\Column(name="question", type="string", length=255)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string",
     *      nullable=false,
     *      columnDefinition="ENUM('radio', 'checkbox') NOT NULL DEFAULT 'radio'",
     *      options={"default":"radio"}
     * )
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="VoterBundle\Entity\QuizOptions", mappedBy="quiz")
     */
    private $quizOptions;


    public function __construct()
    {
        $this->quizOptions = new ArrayCollection();
    }

    /**
     * @return Collection|QuizOptions[]
     */
    public function getQuizOptions() : Collection
    {
        return $this->quizOptions;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set question
     *
     * @param string $question
     *
     * @return Quiz
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Quiz
     */
    public function setType($type)
    {
        if (!in_array($type, [self::TYPE_CHECKBOX, self::TYPE_RADIO], true)) {
            throw new \InvalidArgumentException("Invalid type");
        }
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}


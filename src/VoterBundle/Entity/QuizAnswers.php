<?php

namespace VoterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizAnswers
 *
 * @ORM\Entity()
 * @ORM\Table(name="quiz_answers")
 */
class QuizAnswers
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_at", type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateAt;

    /**
     * @ORM\ManyToOne(targetEntity="VoterBundle\Entity\User", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="VoterBundle\Entity\QuizOptions", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $quizOption;

    /**
     * QuizAnswers constructor.
     */
    public function __construct() {
        $this->dateAt = new \DateTime;
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
     * Set dateAt
     *
     * @param \DateTime $dateAt
     *
     * @return QuizAnswers
     */
    public function setDateAt($dateAt)
    {
        $this->dateAt = $dateAt;

        return $this;
    }

    /**
     * Get dateAt
     *
     * @return \DateTime
     */
    public function getDateAt()
    {
        return $this->dateAt;
    }

    public function getUser() : ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getQuizOption() : ?QuizOptions
    {
        return $this->quizOption;
    }

    public function setQuizOption(?QuizOptions $quizOption): self
    {
        $this->quizOption = $quizOption;

        return $this;
    }

}

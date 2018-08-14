<?php

namespace VoterBundle\Repository;

use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\User\UserInterface;
use VoterBundle\Entity\Quiz;

class QuizRepository extends \Doctrine\ORM\EntityRepository {

    /**
     * @param UserInterface $user
     *
     * @return Quiz[]|null
     */
    public function findAnswered(UserInterface $user) {
        return $this->getAnsweredQuery()
            ->setParameter('user', $user)
            ->getQuery()->execute();
    }

    /**
     * @param UserInterface $user
     *
     * @return Quiz[]|null
     */
    public function findUnanswered(UserInterface $user) {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('quiz')->from('VoterBundle:Quiz', 'quiz')
            ->where($qb->expr()->notIn('quiz.id',
                $this->getAnsweredQuery()->getDQL()))
            ->andWhere('quiz.isActive = ' . Quiz::IS_ACTIVE)
            ->setParameter('user', $user);

        return $qb->getQuery()->execute();
    }

    private function getAnsweredQuery() : QueryBuilder {
        return $this->createQueryBuilder('q')
            ->join('q.quizOptions', 'qo')
            ->leftJoin('qo.quizAnswers', 'qa')
            ->andWhere('quiz.isActive = ' . Quiz::IS_ACTIVE)
            ->andWhere('qa.user = :user')
            ->groupBy('q.id');
    }
}

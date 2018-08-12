<?php

namespace VoterBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Entity()
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

/**
 * @WTF: why salt is null?
 * salt (string) - to manually provide a salt to use when hashing the password.
 * Note that this will override and prevent a salt from being automatically generated.
 * If omitted, a random salt will be generated by password_hash() for each password hashed.
 * This is the intended mode of operation and as of PHP 7.0.0
 * the salt option has been deprecated.
 */

}


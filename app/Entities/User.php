<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;
    /**
     * @ORM\Column(type="string",length="100")
     */
    public $name;

    /**
     * @ORM\Column(type="string",length="200")
     */
    public $email;


    /**
     * @ORM\Column(type="string",length="64")
     */
    public $password;

    /**
     * @ORM\Column(type="date")
     */
    public $dateOfBirth;

    /**
     * @ORM\ManyToMany(targetEntity="Tweet", mappedBy="likes"))
     */
    public $liked_tweets;
}

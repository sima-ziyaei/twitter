<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tweets")
 */
class Tweet
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * JoinColumn(name: 'owner_id', referencedColumnName: 'id')
     */
    public $owner;

    /**
     * @ORM\Column(type="string",length="140")
     */
    public $body;

    /**
     * @ORM\Column(type="date")
     */
    public $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="Tweet")
     */
    public $replied_to;


    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="liked_tweets"))
     * @ORM\JoinTable(name="likes")
     */
    public $likes;

    /**
     * @ORM\OneToMany(targetEntity="Tweet", mappedBy="replied_to"))
     */
    public $replies;
}

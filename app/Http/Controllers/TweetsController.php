<?php

namespace App\Http\Controllers;

use App\Entities\Tweet;
use App\Entities\User;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class TweetsController extends Controller
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function makeTweet(Request $request)
    {
        $tweet = new Tweet();
        $request->validate([
            "body" => "max:140"
        ]);

        $tweet->body = $request->body;
        $tweet->owner = $this->em->find(User::class,session('user')->id);
        
        $tweet->created_at = new \DateTime();

        $this->em->persist($tweet);
        $this->em->flush();

    }

    public function index()
    {
        $tweets = $this->em->getRepository(Tweet::class)->findAll();

        return view("tweets", ['tweets' => $tweets]);
    }
}

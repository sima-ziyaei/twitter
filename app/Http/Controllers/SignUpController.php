<?php

namespace App\Http\Controllers;


use App\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;

class SignUpController extends Controller
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    public function store(Request $request)
    {

        $post = new User();
        $request->validate([
            "name"=> 'required|max:100|min:3',
            'email'=> 'unique:\App\Entities\User,email|max:100|email',
            'password'=> 'required|confirmed',
            'dateOfBirth'=> 'required',
        ]);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->password = bcrypt($request->password);
        $post->dateOfBirth = new \DateTime($request->dateOfBirth);
        $this->em->persist($post);
        $this->em->flush();
        session(['user' => $post]);
        return redirect('/');
    }

    public function index()
    {

        return view('signup');
    }
}

<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;
        $user = $this->em->getRepository(User::class)->findOneByEmail($email);

        if (!$user) {
            return view("login", ['error'=> 'you do not have account with this email! please signup ']);
        } else {
            if (!Hash::check($password, $user->password)) {
                return view("login", ['error'=> 'password is wrong! ']);
            } else {
                session(['user' => $user]);
                return redirect('/');
            }
        }
    }


    public function index()
    {
        return view("login", ['error'=>null]);
    }
}

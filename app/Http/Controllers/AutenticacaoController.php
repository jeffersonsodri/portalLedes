<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Regex\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AutenticacaoController extends Controller
{


    /**
     * @return view
     */
    public function login(){
        return view('auth.login');
    }


    /**
     *
     */
    public function logar(Request $request){

        $dados = $request->all();


        $l = $dados['login'];
        $senha = $dados['password'];

        $user = User::where('login', $l)->first();

        // dd($user);
        if (Auth::check() || ($user && Hash::check($senha, $user->password))) {
            Auth::login($user);


            return redirect()->route('dashboard');
        }
        else{

            return redirect()->route('login')->with('mensagem', "Login ou Senha Incorretos!");
        }
    }



    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }


}

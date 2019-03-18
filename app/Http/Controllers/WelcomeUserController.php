<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
    public function index($name, $nickname = null)
    {
        $name = ucfirst($name);

        if ( $nickname ) {
            return "Hola {$name}. Tu nickname es {$nickname}";
        } else {
            return "Hola {$name}. No tienes nickname";
        }
    }
}

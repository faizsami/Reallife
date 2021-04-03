<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeLetterController extends Controller
{
    //
    public function view()
    {
        return view('user.view-welcome-letter', ['active' => ['dashboard','welcome']]);
    }

    public function print()
    {
        return view('user.print-welcome-letter');
    }
}

<?php

namespace App\Listeners\Auth;

 use Illuminate\Auth\Events\Login;
 use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserLoggedIn
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function handle(Login $event)
    {
        Session::put('loggedin'. '');
    }
}
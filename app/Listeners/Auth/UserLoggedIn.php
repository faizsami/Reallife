<?php

namespace App\Listeners\Auth;

 use Illuminate\Auth\Events\Login;
 use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Http\Request;

class UserLoggedIn
{
    /**
     * Create the event listener.
     *
     * @return void
     */

     private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function handle(Login $event)
    {
        $this->request->session()->put('LoggedInSuccessMessage', 'random value');
    }
}
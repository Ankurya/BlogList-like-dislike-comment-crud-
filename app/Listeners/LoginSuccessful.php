<?php

namespace App\Listeners;
use Session;
use App\Events\UserLoggedIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginSuccessful
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        // dd($event);
        // dd('login-success', 'Hello ' . $event->user->name . ', welcome back!');
        Session::flash('login-success', 'Hello ' . $event->user->name . ', welcome back!');



    }
}

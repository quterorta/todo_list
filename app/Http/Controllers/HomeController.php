<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use App\Events\SendingEmail;
use App\Listeners\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskCreate;

class HomeController extends Controller
{
    use HasRoles;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!Auth::user()) {
            return redirect('/login');
        }

        return view('home_page');
    }

}

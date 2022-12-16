<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familymembers;
use App\Models\User;
use App\Models\Saving;


class DashboardController extends Controller
{

    public function index()
    {
            return view('dashboard');

    }

   public function dashboard()
    {
       $staff = Familymembers::where("status",1)->count();
        // $user = User::count();
        // $patient = Patient::count();
$savings = Saving::where('status',1)->sum('amount');
        return view('dashboard',['staff'=>$staff,'savings'=>$savings]);
    }

    public function myprofile()
    {
         return view('profile');
    }

    public function createuser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required|string|confirmed|min:3',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $user->attachRole('administrator');


        return redirect('/user')->with('message', "User saved");

    }
}

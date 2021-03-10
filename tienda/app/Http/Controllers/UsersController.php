<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Auth;

class UsersController extends Controller
{
    public function viewUsers($id)
    {
        $User = User::find($id);
        if($User){
            return view('Users',['Usuario'=>$User]);
        }else{
            return redirect()->route('home');
        }
    }
}

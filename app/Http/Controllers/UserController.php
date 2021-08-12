<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilePatient;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function profile(Request $request)
    {
       if (is_null($profile = ProfilePatient::where('user_id',Auth::id())->first())) {
           return view('profile',['status'=>FALSE]);
       } else {
        return view('profile',['profile'=>$profile,'status'=>TRUE]);
       }
       
            
            
       

    }


    public function create_profile(Request $request)
    {

        ProfilePatient::create([
            'user_id'=>Auth::id(),
            'fullname'=>$request->fullname,
            'address'=>$request->address,
            'age'=>$request->age,
            'phone'=>$request->phone,
            'status'=>$request->status,
            'thumb'=>$request->thumb,
            
            
        ]);
    }
}

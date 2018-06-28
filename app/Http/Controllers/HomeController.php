<?php

namespace App\Http\Controllers;
use App\Cms;
use Illuminate\Http\Request;
use DB;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');


    }

     public function cmspage($id)
    {

       
            $result= Cms::where('id', $id)->first();
            //dd($result);
            //Cms::find($request->id)->$request->all();
            return view('home',compact('result'));  
            
          }

    
    

}

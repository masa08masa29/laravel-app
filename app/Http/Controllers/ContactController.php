<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ContactController extends Controller
{

    public function index(){

        return view('contact.index');
    }

    public function confirm(Request $request){

        return view('contact.confirm');
    }

    public function send(Request $request){

        return view('contact.thank');
    }
}

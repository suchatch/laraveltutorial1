<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index()
    {
        $address = "9/23 อ่อนนุช21";
        $tel = "0800716943";
        $email = "charoenpon@hotmail.com";
        return view('about')
            ->with('address', $address)
            ->with('tel', $tel)
            ->with('email', $email);
    }
}

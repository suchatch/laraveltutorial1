<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    function index(){
        return view('admin.department.index');
    }
}

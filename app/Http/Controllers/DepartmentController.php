<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('admin.department.index');
    }

    public function store(Request $request)
    {
        //ตรวจสอบข้อมูล
        $request->validate([
            'department_name' => 'required|unique:departments|max:255'
        ], [
            'department_name.required' => 'กรุณาป้อนชื่อ ชื่อแผนก',
            'department_name.max' => 'ห้ามป้อนเกิน 255 ตัวอักษร'
        ]);

        //บันทึกข้อมูล
        $department = new Department;
        $department->department_name = $request->department_name;
        $department->user_id = Auth::user()->id;
        $department->save();
        return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อย");
    }
}

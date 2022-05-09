<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Employee;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['employees'] = DB::select('select * from employees where active = 1 AND created_by ='.auth()->user()->id.' ORDER BY employees.id DESC');
        return view('employees.index',$data);
    }
    
}

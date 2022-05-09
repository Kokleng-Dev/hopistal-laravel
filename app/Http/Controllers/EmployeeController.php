<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
        $get = DB::table('employees')->where('id',$id);

        if($get->count() > 0){
            $data['info'] = $get->first();
            return view('employees.view', $data);
        } else {
            return redirect('/dashboard')->with('error', 'គ្មានទិន្នន័យ');
        }
    }
    public function add()
    {
        return view('employees.add');
    }
    public function insert(Request $request){
        $get = $request->except('_token','photo');
        $get['created_by'] = auth()->user()->id;
        $get['remember_token'] = $request->_token;

        if($request->phone1 != ''){
            if($request->phone2 != ''){
                $request->validate([
                  'phone1' => 'numeric',
                  'phone2' => 'numeric'
                ]);
            }else{
                $request->validate([
                  'phone1' => 'numeric'
                ]);
            }
        }
        if($request->phone2 != ''){
            if($request->phone1 != ''){
                $request->validate([
                  'phone1' => 'numeric',
                  'phone2' => 'numeric'
                ]);
            }else{
                $request->validate([
                  'phone2' => 'numeric'
                ]);
            }
        }
        if($request->file('photo')){
            if (!$request->file('photo')->getSize()) {
                return redirect('/employee/add')
                            ->with('warning','ទំហំរូបលើសពី 2MB')
                            ->withInput();
            }
            else{
                $imageName=time().'.'.$request->photo->getClientOriginalExtension();
                $imagefolder = public_path('/assets/images/');
                $request->photo->move($imagefolder, $imageName);
                $get['photo'] = $imageName;
            }
        } 
        $insert = DB::table('employees')->insertGetId($get);

        if($insert){
            return redirect('/dashboard')->with('success', 'ការបញ្ចូលសមាជិកថ្មីទទួលបានជោគជ័យ');
        }
        else{
            return redirect('/dashboard')->with('error', 'ការបញ្ចូលសមាជិកថ្មីទទួលបរាជ័យ');
        }
    }
    public function edit($id){
        $data['info'] = DB::table('employees')->where('id',$id)->first();
        return view('employees.edit',$data);
    }
    public function update(Request $request, $id){
        

        $data = $request->except('_token','photo');
        $data['updated_by'] = auth()->user()->id;
        $data['remember_token'] = $request->_token;

        if($request->phone1 != ''){
            if($request->phone2 != ''){
                $request->validate([
                  'phone1' => 'numeric',
                  'phone2' => 'numeric'
                ]);
            }else{
                $request->validate([
                  'phone1' => 'numeric'
                ]);
            }
        }
        if($request->phone2 != ''){
            if($request->phone1 != ''){
                $request->validate([
                  'phone1' => 'numeric',
                  'phone2' => 'numeric'
                ]);
            }else{
                $request->validate([
                  'phone2' => 'numeric'
                ]);
            }
        }
        if($request->file('photo')){
            if (!$request->file('photo')->getSize()) {
                return redirect('/employee/add')
                            ->with('warning','ទំហំរូបលើសពី 2MB')
                            ->withInput();
            }
            else{
                $imageName=time().'.'.$request->photo->getClientOriginalExtension();
                $imagefolder = public_path('/assets/images/');
                $request->photo->move($imagefolder, $imageName);
                $data['photo'] = $imageName;
            }
        } 

        $update = DB::table('employees')
                ->where('id', $id)
                ->limit(1)
                ->update($data);
        if($update){
            return redirect('/dashboard')->with('success', 'Update ទិន្នន័យជោគជ័យ');
        }
        else{
            return redirect('/dashboard')->with('error', 'Update ទិន្នន័យ បរាជ័យ');
        }
    }
    public function delete($id){
        $update = DB::table('employees')
                ->where('id', $id)
                ->limit(1)
                ->update(array('active' => 0,'updated_by' => auth()->user()->id));
        if($update){
            return redirect('/dashboard')->with('success', 'លុបទិន្នន័យជោគជ័យ');
        }
        else{
            return redirect('/dashboard')->with('error', 'លុបទិន្នន័យ បរាជ័យ');
        }     
    }

    public function import() 
    {
        Excel::import(new EmployeeImport,request()->file('import_excel'));
               
        return back();
    }
    public function export() 
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminmodel; 

class admincontroller extends Controller
{


    //ACCOUNT
    public function login()
    {
        return view('admin.adminlogin');
    }
    public function register()
    {
        return view('admin.adminregister');
    }

    public function create()
    {
        return view('admin.adminregister');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'firstname'  => 'required',
            'middlename'=> 'required',
            'lastname'=> 'required',
            'schoolid'=> 'required',
            'masterkey'=> 'required',
            'birthdate'=> 'required',
        ]);
        $newadmin = adminmodel::create($data); 
        return redirect(route('admin.adminregister'));
    }








    public function add_new_books()
    {
        return view('admin.add_new_books');
    }

    public function new_employee()
    {
        return view('admin.employee');
    }

    public function graduate_table()
    {
        return view('admin.graduate');
    }

    public function undergraduate_table()
    {
        return view('admin.undergraduate');
    }

public function adminsidebar()
{
return view ('admin.sidebar');

}

public function setup()
{
return view ('admin.setup');

}

public function employee()
{
return view ('admin.employee');

}


}


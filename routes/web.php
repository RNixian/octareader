<?php
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\adminmodel; 
use App\Models\usermodel; 

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});


//ADMIN----------------------------------------------------------------------------------------------------------------------------------------

route::get('/admin/login', [admincontroller::class, 'login'])->name('admin.adminlogin');
route::get('/admin/register', [admincontroller::class, 'register'])->name('admin.adminregister');

//ADMIN CRUD

route::get('/admin/adminregister', [admincontroller::class, 'create'])->name(name:'admin.create');
route::post('/admin', [admincontroller::class, 'store'])->name('admin.store');







//BOOKS
route::get('/admin/add_new_books', [admincontroller::class, 'add_new_books'])->name('admin.add_new_books');

//EMPLOYEE
route::get('/admin/add_new_employee', [admincontroller::class, 'new_employee'])->name('admin.emlpoyee');



//GRADUATE
route::get('/admin/graduate', [admincontroller::class, 'graduate_table'])->name('admin.graduate');



//UNDERGRADUATE
route::get('/admin/undergraduate', [admincontroller::class, 'undergraduate_table'])->name('admin.undergraduate');




//USER-----------------------------------------------------------------------------------------------------------------------------------------




//SETUP
route::get('/admin/sidebar', [admincontroller::class, 'adminsidebar'])->name('admin.sidebar');

route::get('/admin/setup', [admincontroller::class, 'setup'])->name('admin.setup');

route::get('/admin/employee', [admincontroller::class, 'employee'])->name('admin.employee');

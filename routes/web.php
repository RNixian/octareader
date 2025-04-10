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


//ADMIN CRUD-----------------------------------------------------------------------------------------------------------------------------------

route::get('/admin/adminregister', [admincontroller::class, 'create'])->name(name:'admin.register');
route::post('/admin', [admincontroller::class, 'store'])->name('admin.store');

//BOOKS-----------------------------------------------------------------------------------------------------------------------------------------
route::get('/admin/add_new_books', [admincontroller::class, 'add_new_books'])->name('admin.add_new_books');
route::post('/admin', [admincontroller::class, 'storebooks'])->name('admin.storebooks');

//EMPLOYEE----------------------------------------------------------------------------------------------------------------------------------------
route::get('/admin/add_new_employee', [admincontroller::class, 'employee'])->name('admin.emlpoyee');

//GRADUATE----------------------------------------------------------------------------------------------------------------------------------------
route::get('/admin/graduate', [admincontroller::class, 'graduate_table'])->name('admin.graduate');
Route::get('/admin/graduate', [admincontroller::class, 'showbooksingraduate'])->name('admin.graduate');
Route::get('/delete-book/{id}', [admincontroller::class, 'deletebook'])->name('deletebook');
Route::get('/edit-book/{id}', [admincontroller::class, 'editbook'])->name('editbook');
Route::put('/update-book/{id}', [admincontroller::class, 'updatebook'])->name('updatebook');



//UNDERGRADUATE-----------------------------------------------------------------------------------------------------------------------------------
route::get('/admin/undergraduate', [admincontroller::class, 'undergraduate_table'])->name('admin.undergraduate');
Route::get('/admin/undergraduate', [admincontroller::class, 'showbooksinundergraduate'])->name('admin.undergraduate');
Route::get('/delete-book/{id}', [admincontroller::class, 'deletebook'])->name('deletebook');
Route::get('/edit-book/{id}', [admincontroller::class, 'editbook'])->name('editbook');
Route::put('/update-book/{id}', [admincontroller::class, 'updatebook'])->name('updatebook');

//SIDEBAR-------------------------------------------------------------------------------------------------------------------------------------------
route::get('/admin/sidebar', [admincontroller::class, 'adminsidebar'])->name('admin.sidebar');

//DEPARTMENT-------------------------------------------------------------------------------------------------------------------------------------------
route::get('/admin/setup/department', [admincontroller::class, 'department'])->name('admin.setup.department');
route::post('/admin/setup/department', [admincontroller::class, 'storedepartment'])->name('admin.setup.storedepartment');
route::get('/admin/setup/department', [admincontroller::class, 'showdepartment'])->name('admin.setup.department');
Route::get('/delete-dept/{id}', [admincontroller::class, 'deletedept'])->name('deletedept');
Route::get('/edit-dept/{id}', [admincontroller::class, 'editdept'])->name('editdept');
Route::put('/update-dept/{id}', [admincontroller::class, 'updatedept'])->name('updatedept');

//COURSE-------------------------------------------------------------------------------------------------------------------------------------------
route::get('/admin/setup/course', [admincontroller::class, 'course'])->name('admin.setup.course');
route::post('/admin/setup/course', [admincontroller::class, 'storecourse'])->name('admin.setup.storecourse');
route::get('/admin/setup/course', [admincontroller::class, 'showcourse'])->name('admin.setup.course');
Route::get('/delete-course/{id}', [admincontroller::class, 'deletecourse'])->name('deletecourse');
Route::get('/edit-course/{id}', [admincontroller::class, 'editcourse'])->name('editcourse');
Route::put('/update-course/{id}', [admincontroller::class, 'updatecourse'])->name('updatecourse');

//CAROUSEL-------------------------------------------------------------------------------------------------------------------------------------------
route::get('/admin/setup/carousel', [admincontroller::class, 'carousel'])->name('admin.setup.carousel');
route::post('/admin/setup/carousel', [admincontroller::class, 'storecarousel'])->name('admin.setup.storecarousel');
route::get('/admin/setup/carousel', [admincontroller::class, 'showcarousel'])->name('admin.setup.carousel');
Route::get('/delete-carousel/{id}', [admincontroller::class, 'deletecarousel'])->name('deletecarousel');
Route::get('/edit-carousel/{id}', [admincontroller::class, 'editcarousel'])->name('editcarousel');
Route::put('/update-carousel/{id}', [admincontroller::class, 'updatecarousel'])->name('updatecarousel');






//USER-----------------------------------------------------------------------------------------------------------------------------------------




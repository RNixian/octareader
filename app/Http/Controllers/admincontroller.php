<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminmodel; 
use App\Models\booksmodel; 
use App\Models\carouselmodel; 
use App\Models\contactmodel; 
use App\Models\coursemodel; 
use App\Models\departmentmodel; 
use App\Models\membersmodel; 
use App\Models\usermodel; 


class admincontroller extends Controller
{

//-------------------------------------------------------------------------------------------------------------------------------------------------

    //ACCOUNT
    public function login()
    {
        return view('admin.adminlogin');
    }


    public function register()
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
        $newadmin = adminmodel::register($data); 
        return redirect(route('admin.adminregister'));
    }

//-------------------------------------------------------------------------------------------------------------------------------------------------

//BOOKS


    public function add_new_books()
    {
        return view('admin.add_new_books');
    }

    public function storebooks(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'year' => 'required|integer',
            'category' => 'required|string',
            'department' => 'required|string',
            'pdf_filepath' => 'required|file|mimes:pdf',
            'coverphoto_imgpath' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);
    
        if ($request->hasFile('pdf_filepath')) {
            $validatedData['pdf_filepath'] = $request->file('pdf_filepath')->store('octabooks', 'public');
        }
    
        if ($request->hasFile('coverphoto_imgpath')) {
            $validatedData['coverphoto_imgpath'] = $request->file('coverphoto_imgpath')->store('octacover', 'public');
        }
    
  
        $ebook = booksmodel::create($validatedData);
    
        if (strtolower($validatedData['category']) === 'graduate') {
            return redirect()->route('admin.graduate')->with('success', 'Graduate book uploaded successfully.');
        } elseif (strtolower($validatedData['category']) === 'under-graduate') {
            return redirect()->route('admin.undergraduate')->with('success', 'Undergraduate book uploaded successfully.');
        } else {
        
            return redirect()->back()->with('success', 'Book uploaded, but category is unrecognized.');
        }
    }
    


//-------------------------------------------------------------------------------------------------------------------------------------------------

//EMPLOYEE
    public function employee()
    {
        return view('admin.employee');
    }



//-------------------------------------------------------------------------------------------------------------------------------------------------

//GRADUATE    
    public function graduate_table()
    {
        return view('admin.graduate');
    }


    public function showbooksingraduate()
    {
        $booksmodel = booksmodel::all();
        return view('admin.graduate')->with('booksmodel', $booksmodel);
    
    }


//-------------------------------------------------------------------------------------------------------------------------------------------------

//UNDERGRADUATE
    public function undergraduate_table()
    {
        return view('admin.undergraduate');
    }

    public function showbooksinundergraduate()
    {
        $booksmodel = booksmodel::all();
        return view('admin.undergraduate')->with('booksmodel', $booksmodel);
    
    }

//GRADUATE AND UNDERGRADUATE (EDIT AND DELETE)

public function deletebook(Request $request, $id) {
    $book = booksmodel::find($id);

    $categoryType = strtolower($request->input('category', 'graduate')); 

    if (!$book) {
        if ($categoryType === 'undergraduate') {
            return redirect()->route('admin.undergraduate')->with('error', 'Book not found.');
        } else {
            return redirect()->route('admin.graduate')->with('error', 'Book not found.');
        }
    }

    $book->delete();

    if (strtolower($book->category) === "graduate") {
        return redirect()->route('admin.graduate')->with('success', 'Book deleted successfully.');
    } else {
        return redirect()->route('admin.undergraduate')->with('success', 'Book deleted successfully.');
    }
}

public function updatebook(Request $request, $id) {
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'year' => 'required|integer',
        'category' => 'required|string',
        'department' => 'required|string',
        'pdf_filepath' => 'nullable|file|mimes:pdf',  // allow updating PDF if provided
        'coverphoto_imgpath' => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // allow updating image if provided
    ]);

    $book = booksmodel::find($id);

    if (!$book) {
        return redirect()->route('admin.graduate')->with('error', 'Book not found.');
    }

    if ($request->hasFile('pdf_filepath')) {
        $book->pdf_filepath = $request->file('pdf_filepath')->store('octabooks', 'public');
    }

    if ($request->hasFile('coverphoto_imgpath')) {
        $book->coverphoto_imgpath = $request->file('coverphoto_imgpath')->store('octacover', 'public');
    }

    $book->update($request->only(['title', 'author', 'year', 'category', 'department']));

    if (strtolower($book->category) === "graduate") {
        return redirect()->route('admin.graduate')->with('success', 'Book updated successfully.');
    } else {
        return redirect()->route('admin.undergraduate')->with('success', 'Book updated successfully.');
    }

}


    
//-------------------------------------------------------------------------------------------------------------------------------------------------

//SIDEBAR    
public function adminsidebar()
{
return view ('admin.sidebar');

}




//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//SETUP

//DEPARMENT-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
public function department()
{
return view ('admin.setup.department');
}

public function storedepartment(Request $request)
{
    $data = $request->validate([
        'department'  => 'required',

    ]);
    $newdept = departmentmodel::create($data); 
    return redirect(route('admin.setup.department'));
}

public function showdepartment()
{
    $departmentmodel = departmentmodel::all();
    return view('admin.setup.department')->with('departmentmodel', $departmentmodel);

}

public function deletedept($id)
{
    $dept = departmentmodel::findOrFail($id);
    $dept->delete(); 

    return redirect()->back()->with('success', 'Department deleted successfully!');
}

public function editdept($id){

    $task = departmentmodel::find($id);
    return view('admin.setup.department', compact('department'));
    }
    
    public function updatedept(Request $request, $id) {
        $request->validate([
            'department' => 'required|min:1|max:255|alpha',
        ]);
    
         $post = departmentmodel::find($id);
         $post->fill($request->all());
         $post->save();
        return redirect()->route('admin.setup.department');
    }
    



//COURSE-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

public function course()
{
return view ('admin.setup.course');
}

public function storecourse(Request $request)
{
    $data = $request->validate([
        'course'  => 'required',
    ]);
    $newcourse = coursemodel::create($data); 
    return redirect(route('admin.setup.course'));
}

public function showcourse()
{
    $coursemodel = coursemodel::all();
    return view('admin.setup.course')->with('coursemodel', $coursemodel);

}

public function deletecourse($id)
{
    $dept = coursemodel::findOrFail($id);
    $dept->delete(); 

    return redirect()->back()->with('success', 'Course deleted successfully!');
}

public function editcourse($id){

    $task = coursemodel::find($id);
    return view('admin.setup.course', compact('course'));
    }
    
    public function updatecourse(Request $request, $id) {
        $request->validate([
            'course' => 'required|min:1|max:255|alpha',
        ]);
    
         $post = coursemodel::find($id);
         $post->fill($request->all());
         $post->save();
        return redirect()->route('admin.setup.course');
    }
    
//CAROUSEL-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

public function carousel()
{
return view ('admin.setup.carousel');
}

public function showcarousel()
{
    $carouselmodel = carouselmodel::all();
    return view('admin.setup.carousel')->with('carouselmodel', $carouselmodel);

}

public function storecarousel(Request $request)
{
    $validatedData = $request->validate([
        'carousel_imgpath' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        'display_order' => 'required|int',

    ]);

    if ($request->hasFile('carousel_imgpath')) {
        $validatedData['carousel_imgpath'] = $request->file('carousel_imgpath')->store('octacarousel', 'public');
    }
    $carousel = carouselmodel::create($validatedData);
    return redirect()->route('admin.setup.carousel')->with('success', 'Carousel uploaded successfully.');

}

public function deletecarousel($id)
{
    $carousel = carouselmodel::findOrFail($id);
    $carousel->delete(); 

    return redirect()->back()->with('success', 'Carousel deleted successfully!');
}

public function updatecarousel(Request $request, $id) {
    $request->validate([
        'carousel_imgpath' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        'display_order' => 'required|int|max:255',
 
    ]);

    $carousel = carouselmodel::find($id);

    if (!$carousel) {
        return redirect()->route('admin.setup.carousel')->with('error', 'Carousel not found.');
    }

    if ($request->hasFile('carousel_imgpath')) {
        $carousel->carousel_imgpath = $request->file('carousel_imgpath')->store('octacarousel', 'public');
    }

    $carousel->update($request->only(['display_order']));
        return redirect()->route('admin.setup.carousel')->with('success', 'Carousel updated successfully.');
   
}





}
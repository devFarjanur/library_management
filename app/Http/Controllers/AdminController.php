<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\Book;


class AdminController extends Controller
{
    public function AdminDashboard(){
        $totalbooks = Book::count();
        $students = User::where('role', 'student')->get();
    
        return view('admin.index', compact('totalbooks', 'students'));
    } // end method

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }  // end method

    public function AdminLogin(){
        return view('admin.admin_login');
    }  // end method


    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));
    }  // end method

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alter-type' => 'success'
        );


        return redirect()->back()->with($notification);
    } // end method



    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    } //  end method




    // admin product category   


    // public function AdminProductCategories()
    // {
    //     return view('admin.category.admin_category');
    // }



    // public function AdminCreateProductCategories()
    // {
    //     return view('admin.category.admin_add_category');
    // }






    
    // admin product

    public function AdminBook(){
        $books = Book::all();
        return view('admin.book/admin_book',compact('books'));
    } // end method


    public function AdminAddBook(){
        return view('admin.book/admin_add_book');
    } // end method

    public function adminBookStore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'author' => 'nullable|string',
            'edition' => 'nullable|string',
            'quantity' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ]);
        
        Book::create($validatedData);
    
        return redirect()->route('admin.book')->with([
            'message' => 'Book Added Successfully',
            'alert-type' => 'success'
        ]);
    }

    // public function AdminProductSingleview($id){
    //     $book = Book::findOrFail($id);
    //     return view('admin.product/admin_product_single', compact('book'));
    // }



    public function AdminEditBook($id)
    {
        $book = Book::findOrFail($id); // Find the product by ID
    
        return view('admin.book.admin_edit_book', compact('book'));
    }


    public function AdminUpdateBook(Request $request, $id){
        $book = Book::find($id);
        $book->name = $request->input('name');
        $book->price = $request->input('price');
        $book->stock = $request->input('stock');
        $book->description = $request->input('description');

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$book->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $book->photo = $filename;
        }


    
        $book->save();
    
        $notification = [
            'message' => 'Book Updated Successfully',
            'alter-type' => 'success'
        ];
    
        return redirect()->back()->with($notification);
    }



    //     public function CourseTeacherQuestionChapterStore(Request $request, $id)
    // {
    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         'questionchapter' => 'required|string|max:255',
    //     ]);
    
    //     // Retrieve the authenticated user
    //     $userId = Auth::id();
    //     $user = Questioncreator::findOrFail($userId);
    
    //     // Retrieve the course ID associated with the user
    //     $courseId = $user->course_id;
    
    //     // Fetch the category based on the provided ID
    //     $category = QuestionCategory::findOrFail($id);
    
    //     // Create a new QuestionSet instance
    //     $questionchapter = new QuestionChapter();
    //     $questionchapter->name = $validatedData['questionchapter'];
    //     $questionchapter->course_id = $courseId;
    //     $questionchapter->questionCategory_id = $category->id;
    
    //     // Save the question set to the database
    //     $questionchapter->save();
    
    //     // Redirect back with a success message
    //     $notification = [
    //         'message' => 'Question Chapter Added Successfully',
    //         'alert-type' => 'success'
    //     ];
    
    //     // Redirect to the appropriate route with the necessary parameters
    //     return redirect()->route('course.teacher.question.chapter', ['id' => $category->id])->with($notification);
    // }




    


    // public function AdminUpdateProduct(Product $product, Request $request)
    // {
    //     $this->validate($request, [
    //         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    //         'name' => 'required|string|max:255',
    //         'price' => 'nullable|string|min:0',
    //         'stock' => 'nullable|string|min:0',
    //         'description' => 'required|string',
    //     ]);



    //     if ($request->file('photo'))
    //     {
    //         $file = $request->file('photo');
    //         @unlink(public_path('upload/admin_images/'.$product->photo));
    //         $filename = date('YmdHi').$file->getClientOriginalName();
    //         $file->move(public_path('upload/admin_images'), $filename);
    //         $product->photo = $filename;
    //     }

    //     $product->update($request->all());

    //     $notification = array(
    //         'message' => 'Product updated Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // }


    // public function AdminUpdateProduct(Request $request, $id){

    //     $product = Product::find($id);
    //     $product-> photo = $request->input('photo');
    //     $product-> name = $request->input('name');
    //     $product-> price = $request->input('price');
    //     $product-> stock = $request->input('stock');
    //     $product-> description = $request->input('description');

    //     // if($request->hasfile('photo')){

    //     //     $destination = 'upload/admin_images/'.$product->photo;
    //     //     if(File::exits($destination))
    //     //     {
    //     //         File::delete($destination);
    //     //     }

    //     //     $file = $request->file('photo');
    //     //     $extention = $file->getClientOriginalExtension();
    //     //     $filename = time().'.'.$extention;
    //     //     $file->move('uploads/admin/', $filename);
    //     //     $product->photo = $filename;
    //     // }

    //     if ($request->hasFile('photo')) {
    //         $photo = $request->file('photo');
    //         $filename = time() . '.' . $photo->getClientOriginalExtension();
        
    //         // Use Storage facade for file operations
    //         Storage::putFile('upload/admin_images/', $photo, $filename, 'public');
        
    //         // Remove old image using Storage facade (if exists)
    //         if ($product->photo) {
    //             Storage::delete('upload/admin_images/' . $product->photo);
    //         }
        
    //         $product->photo = $filename;
    //     }
    



    //     $product->update();

    //     $notification = array(
    //         'message' => 'Product Updateded Successfully',
    //         'alter-type' => 'success'
    //     );


    //     return redirect()->back()->with($notification);



    // }








}

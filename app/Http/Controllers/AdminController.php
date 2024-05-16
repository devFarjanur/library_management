<?php

namespace App\Http\Controllers;

use App\Models\BorrowApproval;
use App\Models\BorrowRequest;
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






    
    // admin book

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





    public function AdminBorrowRequest()
    {
        // Fetch all borrow requests for admins
        $borrowRequests = BorrowRequest::all();

        return view('admin.book.admin_borrow_request', compact('borrowRequests'));
    }



    public function AdminApproveBorrowRequest(Request $request, BorrowRequest $borrowRequest)
    {
        // Check if the authenticated user has the 'admin' role
        if (auth()->user()->role !== 'admin') {
            return abort(403, 'Unauthorized');
        }
        
        // Find the book related to the borrow request
        $book = $borrowRequest->book;

        // Decrement the quantity of the book
        $book->decrement('quantity');

        // Create a new entry in borrow_approvals table
        BorrowApproval::create([
            'borrow_request_id' => $borrowRequest->id,
            'admin_id' => auth()->user()->id,
            'status' => 'approved'
        ]);

        // Update the status of the borrow request to approved
        $borrowRequest->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Borrow request approved successfully. Book quantity decremented.');
    }
    


    public function AdminRejectBorrowRequest(Request $request, BorrowRequest $borrowRequest)
    {
        // Check if the user is authorized to reject borrow requests


        if (auth()->user()->role !== 'admin') {
            return abort(403, 'Unauthorized');
        }
    
        // Create a new entry in borrow_approvals table
        BorrowApproval::create([
            'borrow_request_id' => $borrowRequest->id,
            'admin_id' => auth()->user()->id,
            'status' => 'rejected'
        ]);
        
        // Update the status of the borrow request to rejected
        $borrowRequest->update(['status' => 'rejected']);
    
        return redirect()->back()->with('success', 'Borrow request rejected successfully.');
    }








}

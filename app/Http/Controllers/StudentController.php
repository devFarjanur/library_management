<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\Book;

class StudentController extends Controller
{
    // public function StudentLogout(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }  // end method

    // public function StudentLogin(){
    //     return view('student.student_login');
    // }  // end method


    // public function StudentProfile(){
    //     $id = Auth::user()->id;
    //     $profileData = User::find($id);
    //     return view('student.student_profile_view',compact('profileData'));
    // }  // end method

    // public function StudentProfileStore(Request $request){
    //     $id = Auth::user()->id;
    //     $data = User::find($id);
    //     $data->name = $request->name;
    //     $data->email = $request->email;
    //     $data->phone = $request->phone;
        
    //     if ($request->file('photo')) {
    //         $file = $request->file('photo');
    //         @unlink(public_path('upload/admin_images/'.$data->photo));
    //         $filename = date('YmdHi').$file->getClientOriginalName();
    //         $file->move(public_path('upload/admin_images'), $filename);
    //         $data->photo = $filename;
    //     }

    //     $data->save();

    //     $notification = array(
    //         'message' => 'Student Profile Updated Successfully',
    //         'alter-type' => 'success'
    //     );


    //     return redirect()->back()->with($notification);
    // } // end method



    // public function StudentChangePassword(){
    //     $id = Auth::user()->id;
    //     $profileData = User::find($id);
    //     return view('student.student_change_password',compact('profileData'));
    // } //  end method



    // public function StudentDashboard(){

    
    //     return view('student.index');
    // } // end method



    // public function StudentBook(){
    //     $books = Book::all();
    //     return view('student.book/student_book',compact('books'));
    // } // end method







}

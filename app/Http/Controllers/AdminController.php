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
    
        return view('admin.index', compact('totalbooks'));
    } // end method

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
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


    public function AdminProductCategories()
    {
        return view('admin.category.admin_category');
    }



    public function AdminCreateProductCategories()
    {
        return view('admin.category.admin_add_category');
    }






    
    // admin product

    public function AdminProduct(){
        $books = Book::all();
        return view('admin.product/admin_product',compact('books'));
    } // end method


    public function AdminAddProduct(){
        return view('admin.product/admin_add_product');
    } // end method

    public function AdminProductStore(Request $request)
    {
        $validatedInput = $request->validate([ // Rename to validatedInput
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name' => 'required|string|max:255',
            'price' => 'nullable|string|min:0',
            'stock' => 'nullable|string|min:0',
            'description' => 'required|string',
        ]);


        //Handle photo upload (if uploaded)

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            // @unlink(public_path('upload/admin_images/'.$data->photo));
            $photoName = date('YmdHi').$photo->getClientOriginalName();
            $photo->move(public_path('upload/admin_images'), $photoName);
            $validatedInput['photo'] = $photoName;
        }



    
        $book = Book::create($validatedInput);
    
        $notification = array(
            'message' => 'Product Added Successfully',
            'alter-type' => 'success'
        );


        return redirect()->back()->with($notification);
    } // end method


    public function AdminProductSingleview($id){
        $book = Book::findOrFail($id);
        return view('admin.product/admin_product_single', compact('book'));
    }



    public function AdminEditProduct($id)
    {
        $book = Book::findOrFail($id); // Find the product by ID
    
        return view('admin.product.admin_edit_product', compact('book'));
    }


    public function AdminUpdateProduct(Request $request, $id){
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
            'message' => 'Product Updated Successfully',
            'alter-type' => 'success'
        ];
    
        return redirect()->back()->with($notification);
    }





    


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

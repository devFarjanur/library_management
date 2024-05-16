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



use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }






    public function StudentDashboard(Request $request)
    {

        // Retrieve search criteria from the request
        $title = $request->input('title');
        $author = $request->input('author');
        // You can add more criteria as needed

        // Retrieve all books initially
        $query = Book::query();

        // Apply search criteria if provided
        if ($title) {
            $query->where('title', 'like', '%'.$title.'%');
        }

        if ($author) {
            $query->where('author', 'like', '%'.$author.'%');
        }

        // Add more conditions for other criteria
        
        // Perform search based on criteria
        $searchResults = $query->get();

        return view('dashboard', compact('searchResults'));
    }



    public function StudentSearchBook(Request $request)
    {
        // Retrieve search criteria from the request
        $title = $request->input('title');
        $author = $request->input('author');

        // Retrieve all books initially
        $query = Book::query();

        // Apply search criteria if provided
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if ($author) {
            $query->where('author', 'like', '%' . $author . '%');
        }

        // Perform search based on criteria
        $searchResults = $query->get();

        return view('layouts.book.student_search_result', compact('searchResults'));
    }




    public function StudentBookBorrow(Book $book)
    {
        // Check if the stock is greater than 0
        if ($book->quantity <= 0) {
            $notification = [
                'message' => 'The book is out of stock. Unable to borrow.',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }

    
        // Create a new borrow request
        $borrowRequest = new BorrowRequest();
        $borrowRequest->user_id = auth()->user()->id;
        $borrowRequest->book_id = $book->id;
        $borrowRequest->status = 'pending'; // Set initial status to pending
        $borrowRequest->save();
    
        $notification = [
            'message' => 'Borrow request submitted successfully.',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('student.borrow.book.list')->with($notification);
    }
    
    


    public function StudentBookBorrowList()
    {
        // Fetch borrow requests for the current student
        $borrowRequests = BorrowRequest::where('user_id', auth()->user()->id)->get();

        return view('layouts.book.student_borrow_list', compact('borrowRequests'));
    }

    



}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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



    public function SearchBook(Request $request)
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

        return view('dashboard', compact('searchResults'));
    }



}

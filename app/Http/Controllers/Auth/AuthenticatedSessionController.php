<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user
        $credentials = $request->only('email', 'password');
        $credentials['approved'] = true; // Ensure user is approved
    
        if (!Auth::attempt($credentials)) {
            return redirect()->route('login')->withErrors([
                'email' => 'These credentials do not match our records or the account is not approved.',
            ]);
        }
    
        $request->session()->regenerate();
    
        // Determine redirect URL based on user role
        $url = match ($request->user()->role) {
            'admin' => 'admin/dashboard',
            'student' => '/dashboard',
            default => '/', // Default redirect for unrecognized roles
        };
    
        return redirect()->intended($url);
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
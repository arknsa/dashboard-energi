<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle a login request with regex validation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Define the email and password regex patterns
        $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';  // Email 
        $passwordPattern = '/^[A-Za-z0-9]{8,}$/';  // Password 

        // Validate email and password with regex
        if (preg_match($emailPattern, $request->email) && preg_match($passwordPattern, $request->password)) {
            // If both are valid, redirect to the desired URL
            return redirect()->away('https://lookerstudio.google.com/u/0/reporting/5dff1a72-9997-43c7-a9f7-55327a833a48/page/zLOBE');
        }

        // If validation fails, redirect back with error message
        return back()->with('error_message', 'Oops... Sorry, Incorrect input');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Simple logout logic (if needed)
        return redirect('/login');
    }
}

<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $user = DB::table('user')
        ->where('username', $request->username)
        ->first();

    if ($user && $request->password === $user->password) {
        Session::put('user', $user);
        return redirect('/dashboard');
    } else {
        return back()->with('error', 'Username atau password salah');
    }
});

Route::get('/dashboard', function () {
    if (!Session::has('user')) {
        return redirect('/login');
    }

    $user = Session::get('user');
    return view('dashboard', compact('user'));
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/login');
});

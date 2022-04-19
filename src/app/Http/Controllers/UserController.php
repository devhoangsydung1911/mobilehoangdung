<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $users = User::where('role_id', 1)->get();
    return view('adminlte.user')->with('users', $users);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(UserRequest $request)
  {
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UserRequest $request)
  {
    $user = new User;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);

    if ($user->save()) {
      return redirect()->route('home');
    } else {
      return redirect()->back();
    }
  }

  public function postLogin(Request $request)
  {

    $login = ['email' => $request->email, 'password' => $request->password];
    if ($request->remember == trans('remember')) {
      $remember = true;
    } else {
      $remember = false;
    }

    if (Auth::guard()->attempt($login, $remember)) {
      if (Auth::user()->role_id == 2) {
        $userAdmin = Auth::user()->username;
        return view('adminlte.dashboard')->with('userAdmin', $userAdmin);
      } else
       if (Auth::user()->role_id == 1) {
        return redirect('home');
      }
    } else {
      return redirect()->back()->with('LG', 'Email hoặc mật khẩu không chính xác');
    }
  }


  public function getUser()
  {
    if (Auth::check() && Auth::user()->role_id == 1) {
      $user = Auth::user();
      return response()->json($user);
    }
  }

  public function getLogout()
  {
    Auth::logout();
    return redirect()->route('home');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}

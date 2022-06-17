<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
  // Metodo que recibe el formulario
  public function login(Request $request)
  {
    $this->validateLogin($request);

    // Login true
    if(Auth::attempt($request->only(['email', 'password']))) {
      $user = Auth::user();
      $token = $request->user()->createToken($request->name)->plainTextToken;
      return response()->json(['token' => $token], 200);
    }
    // Login false

    return response()->json(['error' => 'Usuario o contraseña incorrectos'], 401);
  }

  // Metodo que verifica que llegue la informacion correctamente
  public function validateLogin(Request $request)
  {
    return $request->validate([
      'email' => 'required|email',
      'password' => 'required',
      'name' => 'required'
    ]);
  }
}
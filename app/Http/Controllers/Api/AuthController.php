<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validateUser = Validator::make(
            $credentials,
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'user' => $user,
                'authorization' => [
                    'token' => $user->createToken('API TOKEN')->plainTextToken,
                    'type' => 'bearer',
                ]
            ], 200);
        } else {
            $error = "Unauthorized";
            return response()->json(['success' => $error], 406);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully !',
            'user' => $user
        ], 200);
    }

    public function sendResetPassword(Request $request)
    {
        $email = $request->email;
        $password = Str::random(8);
        $data['password'] = bcrypt($password);

        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $user = DB::select($query, ['email' => $email]);

        if ($user) {
            $update = DB::update(
                'UPDATE users SET password = ?,updated_at = NOW() WHERE id = ?',
                [
                    $data['password'],
                    $user[0]->id
                ]
            );

            if ($update) {
                $first_name = $user[0]->first_name;
                Mail::send('admin.users.mail', ['userName' => $first_name, 'password' => $password], function ($m) use ($request) {
                    $m->to($request->email)->subject('Hamro Artist User Password Reset');
                });
            }
            return response()->json(['success' => 'Password reset mail sent successfully !'], 200);
        } else {
            return response()->json(['error' => 'This user is either inactive or not in the system !'], 406);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['success' => 'User logged out successfully !'], 200);
    }
}

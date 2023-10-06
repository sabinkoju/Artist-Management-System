<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } else {
            $error = "Unauthorized";
            return response()->json(['success' => $error], 406);
        }
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
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    private $url = 'user.index';

    public function index()
    {
        $users = DB::select('SELECT * FROM users');
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.add');
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();

        $create = DB::insert(
            'INSERT INTO users (first_name, last_name,email,password,phone,dob,gender,address,created_at,updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?,NOW(), NOW())',
            [
                $data['first_name'],
                $data['last_name'],
                $data['email'],
                Hash::make($data['password']),
                $data['phone'],
                $data['dob'],
                $data['gender'],
                $data['address']
            ]
        );

        if ($create) {
            $first_name = $data['first_name'];
            Mail::send('admin.users.mail', ['userName' => $first_name, 'password' => $data['password'], 'email' => $data['email']], function ($m) use ($request) {
                $m->to($request->email)->subject('Hamro Artist User Credential');
            });
        }

        return redirect()->route('user.index')->with('success', 'User ' . $data['first_name'] . ' ' . $data['last_name'] . ' created successfully!');
    }

    public function show($id)
    {
        $result = DB::select('SELECT * FROM users WHERE id = ?', [$id]);

        if (count($result) === 0) {
            return redirect()->route('user.index')->with('error', 'User not found!');
        } else {
            $user = (object) $result[0]; // Convert the result to an object
        }

        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $result = DB::select('SELECT * FROM users WHERE id = ?', [$id]);

        if (count($result) === 0) {
            return redirect()->route('user.index')->with('error', 'User not found!');
        } else {
            $user = (object) $result[0]; // Convert the result to an object
        }

        $genders = ['m' => 'Male', 'f' => 'Female', 'o' => 'Other'];

        return view('admin.users.edit', compact('user', 'genders'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        //Validation
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
            'phone' => 'required|integer|min:9',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ], [
            'first_name.required' => 'First name field is required',
            'last_name.required' => 'Last name field is required',
            'email.required' => 'Email field is required',
            'phone.required' => 'Phone field is required',
            'dob.required' => 'Birth Date field is required',
            'gender.required' => 'Gender field is required',
            'address.required' => 'Address field is required',
        ]);

        DB::update(
            'UPDATE users SET first_name = ?,last_name = ?,email = ?,phone = ?,dob = ?,gender = ?,address= ?,updated_at = NOW() WHERE id = ?',
            [
                $data['first_name'],
                $data['last_name'],
                $data['email'],
                $data['phone'],
                $data['dob'],
                $data['gender'],
                $data['address'],
                $id
            ]
        );

        return redirect()->route('user.index')->with('success', 'User "' . $data['first_name'] . ' ' . $data['last_name'] . '" updated successfully!');
    }


    public function destroy($id)
    {
        $user = DB::select('SELECT * FROM users WHERE id = ?', [$id]);
        DB::delete('DELETE FROM users WHERE id = ?', [$id]);
        return redirect()->route($this->url)->with('success', 'User ' . $user[0]->first_name . ' ' . $user[0]->last_name . ' deleted successfully!');
    }
}

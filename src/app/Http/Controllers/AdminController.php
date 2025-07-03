<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * オーナー作成ページ
     */
    public function createOwner()
    {
        return view('admin.register');
    }

    /**
     * オーナー作成処理
     */
    public function storeOwner(RegisterRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $role_id = 3;

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role_id' => $role_id,
        ]);

        $message = 'オーナーを作成しました';

        return redirect()->route('done', compact('message'));
    }
}

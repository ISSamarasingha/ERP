<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function create($users_id)

    {
        $users = User::find($users_id);
        return view('admin.user.create', compact('users',));
    }

    public function update(Request $request, $users_id)

    {
        $user = User::find($users_id);
        $user->update($request->only(['role']));
        return redirect('admin/users/view')->with('status', 'User Updated');
    }

       public function destroy($users_id)
    {
        $user = User::findOrFail($users_id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}

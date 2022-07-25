<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Validated;
use App\Models\User;

class adminController extends Controller
{
    public function managementUser()
    {
        $data = DB::table('users')
            ->where('id', '!=', auth()->user()->id)
            ->get();


        return view('pages.admin.managementUser', [
            'title' => 'Ilmiah | Management User',
            'data' => $data
        ]);
    }

    public function tambahUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ];

        DB::table('users')->insert($data);
        return redirect()->route('managementUser');
    }

    public function editUser($id)
    {
        $data = DB::table('users')->find($id);
        return view('pages.admin.managementEditUser', [
            'title' => 'Ilmiah | Edit User',
            'data' => $data
        ]);
    }

    public function editUserPost(Request $request)
    {
        $id = $request->id;

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ];

        DB::table('users')->where('id', $id)->update($data);
        return redirect()->route('managementUser');
    }

    public function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('managementUser');
    }

    // endClass
}

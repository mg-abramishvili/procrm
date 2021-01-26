<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ProjectConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Auth; 

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);

        $project_conf = ProjectConfiguration::where('user_id', \Auth::user()->id)->latest()->first();

        return view('users.edit', compact('user', 'project_conf'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users,email,'.Auth::user()->id.',id',
            'fio' => 'required',
        ]);

        $data = request()->all();
        $user = User::find($data['id']);
        $user->email = $data['email'];
        $user->name = $data['email'];
        $user->fio = $data['fio'];

        $user->password = Hash::make($data['password']);

        $user->save();
        return redirect()->back();
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
}

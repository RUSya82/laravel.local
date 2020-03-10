<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\News;
use App\Roles;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $users = User::query()->paginate(6);
        return view('admin.users', [
            'title' => "Список пользователей",
            'categories' => Category::all(),
            'users' => $users
        ]);
    }

    public function edit(Request $request, User $user){
        return view('admin.editUser', [
                'title' => 'Редактирование пользователя',
                'user' => $user,
                'categories' => Category::all(),
                'roles' => Roles::all()
            ]
        );
    }

    public function save(Request $request, User $user){
        if ($request->isMethod('post')) {
            $this->validate($request, User::rules());
            $user->fill($request->all());
            $user->save();
            //dd($user);
            return redirect()->route('admin.users')->with('success', 'Пользователь успешно изменен!');
        }
        return true;
    }

    public function delete(User $user){
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'Пользователь удалён!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->paginate();
        return view('admin.users.index', compact('users'));
    }
}

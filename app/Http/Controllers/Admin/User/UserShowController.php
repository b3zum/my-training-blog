<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserShowController extends Controller
{
    public function __invoke(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
}

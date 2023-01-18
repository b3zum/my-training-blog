<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UserUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $user->update($request->validated());
        return view('admin.users.show', compact('user'));
    }
}

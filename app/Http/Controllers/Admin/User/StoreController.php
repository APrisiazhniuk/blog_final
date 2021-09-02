<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
//        $password = Str::random(10);
        Mail::to($data['email'])->send(new PasswordMail($data['password']));
        $data['password'] = Hash::make($data['password']);
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        event(new Registered($user));
        return redirect()->route('admin.user.index');
    }
}

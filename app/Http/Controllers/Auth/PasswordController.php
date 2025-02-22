<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;


class PasswordController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit-password', [
            'user' => $request->user(),
        ]);
    }
    /**
     * Update the user's password.
     */
    public function update(PasswordUpdateRequest $request): RedirectResponse
    {
        // $validated = $request->validateWithBag('updatePassword', [
        //     'current_password' => ['required', 'current_password'],
        //     'password' => ['required', Password::defaults(), 'confirmed'],
        // ]);
        try {
            // throw new \Exception('hello world');
            $validated = $request->validated();

            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);

            return back()->with('success', 'password-updated');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors(), 'updatePassword');
        }
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfile;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function profile()
    {
        return view('me.profile', [
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('me.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(UpdateUserProfile $request)
    {
        //obiekt powstaje wczesniej i zostaje automatycznie walidowany

        $data = $request->validated();

        $this->userRepository->updateModel(
            Auth::user(),
            $request->validated()
        );

        return redirect()
        ->route('me.profile')
        ->with('status', 'Profil został zaktualizowany');
    }

    public function updateValidationRules(Request $request)
    {
        //funkcja requestu do walidacji
        $request->validate([
            'email' => 'required|unique:users|email',
            'name' => 'required|max:20'
        ]);

        /* Druga opcja
        $request->validate([
            'email' => ['required', 'unique::users', 'email'],
        ])
        */
        return redirect()
        ->route('me.profile')
        ->with('status', 'Profil został zaktualizowany');
    }
}

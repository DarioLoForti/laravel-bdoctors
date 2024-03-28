<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Http\Requests\CustomRegisterRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $specializations = Specialization::all();
        return view('admin.auth.register', compact('specializations'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(CustomRegisterRequest $request): RedirectResponse
    {
        /* NEW USER INSERT: LEGACY CODE, ONLY FOR USER TABLE IN DB */

        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

        /* NEW DOCTOR INSERT: ONLY FOR DOCTOR TABLE IN DB */

        $form_data = $request->all();
        $form_data['user_id'] = auth()->user()->id;
        $doctor = new Doctor();

        if ($request->hasFile('image')) {
            $image_path = Storage::disk('public')->put('doctors_images', $form_data['image']);
            $form_data['image'] = $image_path;
        }

        if ($request->hasFile('cv')) {
            $cv_path = Storage::disk('public')->put('doctors_cvs', $form_data['cv']);
            $form_data['cv'] = $cv_path;
        }

        $doctor->fill($form_data);
        $randomCode = '';
        do {
            $randomCode .= chr(rand(65, 90));
        } while (strlen($randomCode) < 8);

        $doctor->slug = Str::slug(auth()->user()->name . auth()->user()->surname . '-' . $randomCode);

        $doctor->save();

        /* ADD DOCTOR'S SPECIALIZATIONS */

        if ($request->has('specializations')) {
            $doctor->specializations()->attach($form_data['specializations']);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}

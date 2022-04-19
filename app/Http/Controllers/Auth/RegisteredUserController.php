<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Direction;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
  /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::where('users.type_user', '=', 15)->get();
        return view('back-office.user.index', [
            'users' => $users,
        ]);

        // return view('auth.register');
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user = User::All();
        $directions = Direction::All();
        return view('auth.register',[
            'directions' => $directions,
            'users' => $user,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:13',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
//dd($request);
        $user = User::create([
            'nom' => $request->name,
            'prenom' => $request->prenom,
            'telephone'=> $request->telephone,
            'type_user'=>  15, // Correspond a user système parametre/valeur
            'email' => $request->email,
            'direction_id' => $request->direction,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('back-office.user.show',
    [
        'user' => $user,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        //dd($user);
        $directions = Direction::All();
        return view('back-office.user.edit',
        [
            'users' => $user,
            'directions' => $directions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update(
            [
                'user' => $request->user,
            ]
            );

            return view('back-office.user.index', [
                'user' => $user,
            ])->with('message', "L'utilisateur a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        $users = User::where('users.type_user', '=', 15)->get();
        return view('back-office.user.index', [
            'users' => $users,
        ])->with("statutUser","L'utilisateur a bien été supprimé");
    }
}

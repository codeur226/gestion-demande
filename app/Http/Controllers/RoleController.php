<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste = Role::All();
        //dd($liste);
        return view('back-office.role.index', compact('liste'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        $permissions = Permission::all()->where('supprimer', '!=', 1);

        return view('back-office.role.create', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(
            [
                'nom' => $request->role,
                'typerole' => $request->typeRole,
            ]);
        $role->permissions()->sync($request->permissions);

        $liste = Role::All();

        return view('back-office.role.index', compact('liste'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $liste = Role::where('id', $role->id)->get();

        return view('back-office.role.show', compact('liste'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role = Role::findOrFail($role->id);
        $permissions = Permission::All();
        if (is_null($role)) {
            return Redirect::route('back-office.role.index');
        }

        return view('back-office.role.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update(
            [
                'nom' => $request->role,
                'typerole' => $request->typeRole,
            ]);

        $role->permissions()->sync($request->permissions);

        // Flashy::message('Role modifié avec succes !!!');

        $liste = Role::All();

        return view('back-office.role.index', ['liste' => $liste]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $liste = Role::findOrFail($role->id);
        $liste->delete();

        return redirect('role');
    }
}

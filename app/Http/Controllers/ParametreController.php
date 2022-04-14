<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametres = Parametre::orderbyDesc('id')->paginate();

        return view('back-office.parametre.index', [
            'parametres' => $parametres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parametre = new Parametre();

        return view('back-office.parametre.create',
    [
        'parametre' => $parametre,
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parametre = Parametre::create([
            'parametre' => $request->parametre,
        ]);

        return redirect()->route('parametres.index')->with('message', 'Le Parametre a bien été ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $parametre = Parametre::find($id);

        return view('back-office.parametre.show',
    [
        'parametre' => $parametre,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Parametre $parametre)
    {
        // dd($parametre->parametre);
        return view('back-office.parametre.edit',
        [
            'parametre' => $parametre,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parametre $parametre)
    {
        $parametre->update(
            [
                'parametre' => $request->parametre,
            ]
            );

        return redirect()->route('parametres.index')->with('message', 'Le Parametre été modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Parametre::destroy($id);
        return redirect()->route('parametres.index')->with("statutParametre","Le paramètre a bien ete supprimée");;
    }
}

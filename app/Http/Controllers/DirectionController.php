<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directions = Direction::orderbyDesc('id')->paginate();

        return view('back-office.direction.index', [
            'directions' => $directions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direction = new Direction();

        return view('back-office.direction.create',
    [
        'direction' => $direction,
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $direction = Direction::create([
            'libelle_court' => $request->libelle_court,
            'libelle_long' => $request->libelle_long,
        ]);

        return redirect()->route('directions.index')->with('message', 'La direction a bien été ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function show(Direction $direction)
    {
        $direction = Direction::find($direction->id);

        return view('back-office.direction.show',
    [
        'direction' => $direction,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function edit(Direction $direction)
    {
        return view('back-office.direction.edit',
        [
            'direction' => $direction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direction $direction)
    {
        $direction->update(
            [
                'direction' => $request->direction,
            ]
            );

        return redirect()->route('directions.index')->with('message', 'La direction été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction)
    {
        Direction::destroy($direction->id);
        return redirect()->route('directions.index')->with("statutDirection","La direction a bien été supprimée");
    }
}

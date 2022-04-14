<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $themes = Theme::orderByDesc('id')->paginate(15);

        return view('back-office.theme.index', ['themes' => $themes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theme = new Theme();

        return view('back-office.theme.create',['themes' => $theme]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $theme = Theme::create([
           'libelle' => $request->libelle,
           'description' => $request->description,
           
       ]);

       return redirect()->route('themes.index', $theme)->with('statut', 'Votre nouveau théme a été bien ajouté !');
   }


   /**
    * Show the form for editing the specified resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function edit(Theme $theme)
   {
    $themes=Theme::findOrFail($theme->id);
    if(is_null($themes))
    {
        return view();
    }

    return view("back-office.theme.edit",compact('themes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        // dd($theme);
      // $theme=Theme::all();
     // $theme=
       return view("back-office.theme.show", compact('theme'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $theme->update(
            [
                "libelle"=>$request->libelle,
                "description"=>$request->description,
            ]
            );
            return redirect()->route('themes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        Theme::destroy($theme->id);

        return redirect()->route('themes.index')->with('statut', 'votre produit a bien été supprimé !');
    }
}

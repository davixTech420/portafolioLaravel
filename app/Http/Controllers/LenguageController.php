<?php

namespace App\Http\Controllers;

use App\Models\Lenguage;
use Illuminate\Http\Request;

/**
 * Class LenguageController
 * @package App\Http\Controllers
 */
class LenguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lenguages = Lenguage::paginate();

        return view('lenguage.index', compact('lenguages'))
            ->with('i', (request()->input('page', 1) - 1) * $lenguages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lenguage = new Lenguage();
        return view('lenguage.create', compact('lenguage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lenguage::$rules);

        if (Lenguage::where('name',$request->name)->exists()){
            return redirect()->route('lenguages.index')->with('error','Ya Existe El Lenguaje De Programacion');
        }

        $lenguage = Lenguage::create($request->all());

        return redirect()->route('lenguages.index')
            ->with('success', 'Lenguage created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lenguage = Lenguage::find($id);

        return view('lenguage.show', compact('lenguage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lenguage = Lenguage::find($id);

        return view('lenguage.edit', compact('lenguage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lenguage $lenguage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lenguage $lenguage)
    {
        request()->validate(Lenguage::$rules);

        $lenguage->update($request->all());

        return redirect()->route('lenguages.index')
            ->with('success', 'Lenguage updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lenguage = Lenguage::find($id)->delete();

        return redirect()->route('lenguages.index')
            ->with('success', 'Lenguage deleted successfully');
    }
}

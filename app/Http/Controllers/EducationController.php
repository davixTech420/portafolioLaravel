<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

/**
 * Class EducationController
 * @package App\Http\Controllers
 */
class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::paginate();

        return view('education.index', compact('education'))
            ->with('i', (request()->input('page', 1) - 1) * $education->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $education = new Education();
        return view('education.create', compact('education'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Education::$rules);

        $education = Education::create($request->all());

        return redirect()->route('education.index')
            ->with('success', 'Education created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $education = Education::find($id);

        return view('education.show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = Education::find($id);

        return view('education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Education $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        request()->validate(Education::$rules);

        $education->update($request->all());

        return redirect()->route('education.index')
            ->with('success', 'Education updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $education = Education::find($id)->delete();

        return redirect()->route('education.index')
            ->with('success', 'Education deleted successfully');
    }
}

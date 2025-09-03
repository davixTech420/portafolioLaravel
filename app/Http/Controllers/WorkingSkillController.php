<?php

namespace App\Http\Controllers;

use App\Models\WorkingSkill;
use Illuminate\Http\Request;

/**
 * Class WorkingSkillController
 * @package App\Http\Controllers
 */
class WorkingSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workingSkills = WorkingSkill::paginate();

        return view('working-skill.index', compact('workingSkills'))
            ->with('i', (request()->input('page', 1) - 1) * $workingSkills->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workingSkill = new WorkingSkill();
        return view('working-skill.create', compact('workingSkill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(WorkingSkill::$rules);

        $workingSkill = WorkingSkill::create($request->all());

        return redirect()->route('working-skills.index')
            ->with('success', 'WorkingSkill created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workingSkill = WorkingSkill::find($id);

        return view('working-skill.show', compact('workingSkill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workingSkill = WorkingSkill::find($id);

        return view('working-skill.edit', compact('workingSkill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  WorkingSkill $workingSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkingSkill $workingSkill)
    {
        request()->validate(WorkingSkill::$rules);

        $workingSkill->update($request->all());

        return redirect()->route('working-skills.index')
            ->with('success', 'WorkingSkill updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workingSkill = WorkingSkill::find($id)->delete();

        return redirect()->route('working-skills.index')
            ->with('success', 'WorkingSkill deleted successfully');
    }
}

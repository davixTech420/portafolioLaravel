<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

/**
 * Class JobController
 * @package App\Http\Controllers
 */
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::paginate();

        return view('job.index', compact('jobs'))
            ->with('i', (request()->input('page', 1) - 1) * $jobs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = new Job();
        return view('job.create', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Job::$rules);
        if ($request->hasFile('photo')) {
            $imagen = $request->file('photo');
            $mime_tipe = $imagen->getMimeType();
            if (!in_array($mime_tipe,['image/jpeg' ,'image/jpg', 'image/png'])) {
                return redirect(route('users.index'))->with('error', 'El Formato De La Imagen   No Es Valido');
            }
            $nombre =$imagen->getClientOriginalExtension();
            $ruta = "imagenes/jobs/";
            $subida = $imagen->move($ruta,$nombre);
        }

        $job = Job::create([
            'description' => $request->description,
            'title' => $request->title,
            'photo' => $subida,
            'logo_url' =>  $request->logo_url
        ]);
        $job->save();

        return redirect()->route('jobs.index')
            ->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);

        return view('job.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        request()->validate(Job::$rules);

        $job->update($request->all());

        return redirect()->route('jobs.index')
            ->with('success', 'Job updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $job = Job::find($id)->delete();

        return redirect()->route('jobs.index')
            ->with('success', 'Job deleted successfully');
    }
}

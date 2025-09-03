<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Lenguage;
use App\Models\WorkingSkill;
use App\Models\Education;
use App\Models\Job;
use Illuminate\Http\Request;


class ViewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Display the resume view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function resume()
    {
        $leng = Lenguage::all();
        $exp = Experience::all();
        $edu = Education::all();
        $skill = WorkingSkill::all();
        return view('resume',compact('leng','exp','edu','skill'));
    }
    public function projects()
    {
         $tra = Job::all();
        
        return view('projects', compact('tra'));
    }
    public function contact()
    {
        return view('contact');
    }
    public function privacy(){
        return view('privacy');
    }

    public function term(){
        return view('term');
    }
}

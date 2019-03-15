<?php

namespace dwproject\Http\Controllers;

use Illuminate\Http\Request;
use dwproject\Models\Research;
use Illuminate\Database\Eloquent\Collection;

class ResearchController extends Controller
{
    
    protected $research;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Research $r)
    {
        $this->middleware('auth');
        $this->research = $r;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        return view('research');
    }

    public function showResearchData(){
        $data = $this->research->getData();

        $countPerCollege = $this->research->getResearchCountPerCollege($data);
        
        return response()->json($countPerCollege);
    }
}

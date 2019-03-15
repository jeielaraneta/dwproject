<?php

namespace dwproject\Http\Controllers;

use Illuminate\Http\Request;
use dwproject\Models\BudgetAllocation;
use Illuminate\Database\Eloquent\Collection;

class BudgetAllocationController extends Controller
{

    protected $budgetAllocation;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BudgetAllocation $ba)
    {
        $this->middleware('auth');
        $this->budgetAllocation = $ba;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('budget_allocation');
    }

    public function showBudgetAllocationData(){

        $data = $this->budgetAllocation->getData();

        $baPerSY = $this->budgetAllocation->getBudgetAllocationPerSY($data);
        $baPerDept = $this->budgetAllocation->getBudgetAllocationPerDept($data);

        $output = $this->budgetAllocation->setDataModel($baPerSY, $baPerDept);

        return response()->json($output);
      
    }

    
}

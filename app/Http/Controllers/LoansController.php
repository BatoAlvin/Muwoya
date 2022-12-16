<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use App\Models\Familymembers;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan = Loans::where('status',1)->get();
        $consignee = Familymembers::where('status',1)->get();
        return view('loans.index',['loan'=>$loan,'consignee'=>$consignee]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post_service = Loans::create([
            'loan_name' => $request->loan_name,
            'loan_amount' => $request->loan_amount,
            'return_amount' => $request->return_amount,
            'loan_percentage' => $request->loan_percentage,
            'loan_description' => $request->loan_description,
            'loan_date' => $request->loan_date,
          ]);
          return redirect('/loans')->with('message', "Loan for $post_service->loan_name saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $loan = Loans::find($id);
        return view('loans.loan')->with('loan', $loan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function edit(Loans $loans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loans $loans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loans $loans)
    {
        //
    }
}

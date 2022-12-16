<?php

namespace App\Http\Controllers;

use App\Models\Eldersgiftexchange;
use Illuminate\Http\Request;
use App\Exports\EldersExport;
use Maatwebsite\Excel\Facades\Excel;

class EldersgiftexchangeController extends Controller
{
    public function export()
    {
        return Excel::download(new EldersExport, 'elder.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $elderexchange = Eldersgiftexchange::where('status',1)->get();
        return view('eldersgiftexchange.index')->with('elderexchange',$elderexchange);
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
        $post_service = Eldersgiftexchange::create([
            'name' => ucfirst(strtolower($request->name)),
            'eldergift' => ucfirst(strtolower($request->eldergift)),
          ]);
          return redirect('/elders')->with('message', "Users saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eldersgiftexchange  $eldersgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $elderexchange = Eldersgiftexchange::find($id);
        return view('eldersgiftexchange.eldergiftexchange')->with('elderexchange', $elderexchange);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eldersgiftexchange  $eldersgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Eldersgiftexchange $eldersgiftexchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eldersgiftexchange  $eldersgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Eldersgiftexchange::where('id',$id)->first();
        if ($check) {
            $service = Eldersgiftexchange::where('id',$id)->update([
                'name' => ucfirst(strtolower($request->name)),
                'eldergift' => ucfirst(strtolower($request->eldergift)),
            ]);
        return redirect('/elders')->with('message', "User updated successfully");
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eldersgiftexchange  $eldersgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $elderexchanges=Eldersgiftexchange::find($id);
        $elderexchanges->update([
          'status'=>0,
        ]);
        return redirect('/elders')->with('message', "User removed successfully");
    }
}

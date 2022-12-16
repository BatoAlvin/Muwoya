<?php

namespace App\Http\Controllers;

use App\Models\Workingclassgiftexchange;
use Illuminate\Http\Request;
use App\Exports\WorkingclassExport;
use Maatwebsite\Excel\Facades\Excel;


class WorkingclassgiftexchangeController extends Controller
{
    public function export()
    {
        return Excel::download(new WorkingclassExport, 'workingclass.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workingclassexchange = Workingclassgiftexchange::where('status',1)->get();
        return view('workingclassgiftexchange.index')->with('workingclassexchange',$workingclassexchange);
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
        $post_service = Workingclassgiftexchange::create([
            'workingclassname' => ucfirst(strtolower($request->workingclassname)),
            'workingclassnames' => ucfirst(strtolower($request->workingclassnames)),
          ]);
          return redirect('/workingclass')->with('message', "Users saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workingclassgiftexchange  $workingclassgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $working = Workingclassgiftexchange::find($id);
        return view('workingclassgiftexchange.workingclassgiftexchange')->with('working', $working);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workingclassgiftexchange  $workingclassgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Workingclassgiftexchange $workingclassgiftexchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workingclassgiftexchange  $workingclassgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Workingclassgiftexchange::where('id',$id)->first();
        if ($check) {
            $service = Workingclassgiftexchange::where('id',$id)->update([
                'workingclassname' => ucfirst(strtolower($request->workingclassname)),
                'workingclassnames' => ucfirst(strtolower($request->workingclassnames)),
            ]);
        return redirect('/workingclass')->with('message', "User updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workingclassgiftexchange  $workingclassgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $workingclassexchanges=Workingclassgiftexchange::find($id);
        $workingclassexchanges->update([
          'status'=>0,
        ]);
        return redirect('/workingclass')->with('message', "User removed successfully");
    }
}

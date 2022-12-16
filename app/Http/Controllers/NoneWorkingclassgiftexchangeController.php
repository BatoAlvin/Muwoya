<?php

namespace App\Http\Controllers;

use App\Models\NoneWorkingclassgiftexchange;
use Illuminate\Http\Request;
use App\Exports\NoneworkingclassExport;
use Maatwebsite\Excel\Facades\Excel;


class NoneWorkingclassgiftexchangeController extends Controller
{
    public function export()
    {
        return Excel::download(new NoneworkingclassExport, 'noneworkingclass.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noneworkingclassexchange = NoneWorkingclassgiftexchange::where('status',1)->get();
        return view('noneworkingclassgiftexchange.index')->with('noneworkingclassexchange',$noneworkingclassexchange);
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
        $post_service = NoneWorkingclassgiftexchange::create([
            'working_classname' => ucfirst(strtolower($request->working_classname)),
            'working_classnames' => ucfirst(strtolower($request->working_classnames)),
          ]);
          return redirect('/noneworkingclass')->with('message', "Users saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoneWorkingclassgiftexchange  $nonWorkingclassgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $noneworking = NoneWorkingclassgiftexchange::find($id);
        return view('noneworkingclassgiftexchange.noneworkingclassgiftexchange')->with('noneworking', $noneworking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NonWorkingclassgiftexchange  $nonWorkingclassgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function edit(NonWorkingclassgiftexchange $nonWorkingclassgiftexchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NonWorkingclassgiftexchange  $nonWorkingclassgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = NoneWorkingclassgiftexchange::where('id',$id)->first();
        if ($check) {
            $service = NoneWorkingclassgiftexchange::where('id',$id)->update([
                'working_classname' => ucfirst(strtolower($request->working_classname)),
                'working_classnames' => ucfirst(strtolower($request->working_classnames)),
            ]);
        return redirect('/noneworkingclass')->with('message', "User updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NonWorkingclassgiftexchange  $nonWorkingclassgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $noneworkingclassexchanges=NoneWorkingclassgiftexchange::find($id);
        $noneworkingclassexchanges->update([
          'status'=>0,
        ]);
        return redirect('/noneworkingclass')->with('message', "User removed successfully");
    }
}

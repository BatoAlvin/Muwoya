<?php

namespace App\Http\Controllers;

use App\Models\Studentsgiftexchange;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;


class StudentsgiftexchangeController extends Controller
{
    public function export()
    {
        return Excel::download(new StudentsExport, 'student.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
         $studentexchange = Studentsgiftexchange::where('status',1)->get();
         return view('studentsgiftexchange.index')->with('studentexchange',$studentexchange);
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
        $post_service = Studentsgiftexchange::create([
            'studentname' => ucfirst(strtolower($request->studentname)),
            'studentsname' => ucfirst(strtolower($request->studentsname)),
          ]);
          return redirect('/students')->with('message', "Users saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studentsgiftexchange  $studentsgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentexchange = Studentsgiftexchange::find($id);
        return view('studentsgiftexchange.studentgiftexchange')->with('studentexchange', $studentexchange);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studentsgiftexchange  $studentsgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Studentsgiftexchange $studentsgiftexchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studentsgiftexchange  $studentsgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check = Studentsgiftexchange::where('id',$id)->first();
        if ($check) {
            $service = Studentsgiftexchange::where('id',$id)->update([
                'studentname' => ucfirst(strtolower($request->studentname)),
                'studentsname' => ucfirst(strtolower($request->studentsname)),
            ]);
        return redirect('/students')->with('message', "User updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studentsgiftexchange  $studentsgiftexchange
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentexchanges=Studentsgiftexchange::find($id);
        $studentexchanges->update([
          'status'=>0,
        ]);
        return redirect('/students')->with('message', "Users removed successfully");
    }
}

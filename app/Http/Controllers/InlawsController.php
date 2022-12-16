<?php

namespace App\Http\Controllers;

use App\Models\Inlaws;
use Illuminate\Http\Request;
use App\Exports\InlawsExport;
use Maatwebsite\Excel\Facades\Excel;


class InlawsController extends Controller
{
    public function export()
    {
        return Excel::download(new InlawsExport, 'inlaw.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inlawexchange = Inlaws::where('status',1)->get();
        return view('inlaws.index')->with('inlawexchange',$inlawexchange);
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
        $post_service = Inlaws::create([
            'inlaw_name' => ucfirst(strtolower($request->inlaw_name)),
            'inlaw_names' => ucfirst(strtolower($request->inlaw_names)),
          ]);
          return redirect('/inlaws')->with('message', "Users saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inlaws  $inlaws
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $inlawexchange = Inlaws::find($id);
        return view('inlaws.inlaw')->with('inlawexchange', $inlawexchange);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inlaws  $inlaws
     * @return \Illuminate\Http\Response
     */
    public function edit(Inlaws $inlaws)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inlaws  $inlaws
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Inlaws::where('id',$id)->first();
        if ($check) {
            $service = Inlaws::where('id',$id)->update([
                'inlaw_name' => ucfirst(strtolower($request->inlaw_name)),
                'inlaw_names' => ucfirst(strtolower($request->inlaw_names)),
            ]);
        return redirect('/inlaws')->with('message', "User updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inlaws  $inlaws
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inlawexchange=Inlaws::find($id);
        $inlawexchange->update([
          'status'=>0,
        ]);
        return redirect('/inlaws')->with('message', "User removed successfully");
    }
}

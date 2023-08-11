<?php

namespace App\Http\Controllers;

use App\Models\Dynamic;
use Illuminate\Http\Request;

class DynamicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dynamic.index');
    }

    public function saveData(Request $request)
    {
        return $request;
        $data = $request->input('data');

        foreach ($data as $input) {
            // Save each input to the database using the model
            Dynamic::create(['data' => $input]);
        }

        return response()->json(['message' => 'Data saved successfully.']);
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
        $post_service = DynamicController::create([
            'customname' => $request->customname,
          ]);
          return redirect('/dynamic')->with('message', "Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dynamic  $dynamic
     * @return \Illuminate\Http\Response
     */
    public function show(Dynamic $dynamic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dynamic  $dynamic
     * @return \Illuminate\Http\Response
     */
    public function edit(Dynamic $dynamic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dynamic  $dynamic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dynamic $dynamic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dynamic  $dynamic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dynamic $dynamic)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScanFormRequest;
use App\Models\Patient;
use App\Models\Scan;
use Illuminate\Http\Request;

class ScansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ScanFormRequest $request)
    {
        $patient = Patient::find($request->patient_id);
        $validated = $request->validated();

        $patient->scans()->create(
            array_merge(
                $validated,
                ['scan_path' =>  $this->storeScan($request)]
            )
        );
        return back()
            ->with('success', 'a new Scan is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pathToFile = public_path('images/1666352035.png');
        return response()->download($pathToFile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }


    public function download($id)
    {
        $scan = Scan::find($id);
        $arr = explode('\\', $scan->scan_path);
        $name = end($arr);

        $filePath = public_path() . '\images\\' . $name;
        return response()->download($filePath);
    }
    private function storeScan($request)
    {
        $imageName = time() . '.' . $request->image->extension();
        // upload image to Public Folder
        return  $request->image->move(public_path('images'), $imageName);
    }
}
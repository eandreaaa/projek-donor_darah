<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Penerimaan;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function show(Penerimaan $penerimaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendonor = Penerimaan::find($id);
        return view('status', compact('pendonor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            // 'jadwal' => 'required',
        ]);

        $data = Penerimaan::find($id);
        $data->update(
            [
                'jadwal' => $request->jadwal,
                'donor_id' => $id,
                'status' => $request->status,
            ]);

        return redirect()->route('dukes')->with('berhasilAdd', 'Berhasil membuat status');
    }

    public function filter(Request $request)
    {
        $select = $request->sort;
        $donors = Donor::whereHas('penerimaan', function ($query) use ($select) {
            $query->where('status', $select);
        })->with('penerimaan')->get();
    
        return view('dukes', compact('select', 'donors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerimaan $penerimaan)
    {
        //
    }
}

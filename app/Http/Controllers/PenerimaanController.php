<?php

namespace App\Http\Controllers;

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
    public function edit($donor_id)
    {
        $donor = Penerimaan::where('donor_id', $donor_id)->first();
        $donorId = $donor_id;
        return view('status', compact('donor', 'donorId'));
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

        // return dd($request);
        // $request->status == 'Ditolak'
        // if ($request->status == 'Ditolak') {
        //     $isi = "-";
        // } else {
        //     $isi = $request->jadwal;
        // }
        

        $data = Penerimaan::find($id);
        $data->update(
            [
                'donor_id' => $id
            ],
            [
                'status' => $request->status,
                'jadwal' => $request->jadwal,
            ]
        );

        return redirect()->route('dukes')->with('berhasilAdd', 'Berhasil membuat status');
    }

    public function filter(Request $request)
    {
        // dd($request->all());
        $select = $request->sort;
        $donors = Penerimaan::with('donor')->where('status','LIKE', '%'.$select.'%')->get();
        // dd($donors);
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

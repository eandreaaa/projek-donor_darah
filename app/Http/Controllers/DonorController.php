<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;
use PDF;
use Excel;
use App\Exports\DonorExport;
use App\Models\Penerimaan;

class DonorController extends Controller
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

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only('email', 'password');
        
        if (Auth::attempt($user)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin-page');
            }elseif (Auth::user()->role == 'dukes') {
                return redirect('/dukes-only');
            }
        } else {
            return redirect()->back()->with('failed', 'Gagal login. Silakan coba lagi');
        }
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
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
        $request -> validate([
            'nama' => 'required',
            'email' => 'required',
            'hp' => 'required|min:4',
            'umur' => 'required|min:2',
            'berat' => 'required|max:3',
            'goldar' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png', 
        ]);

        $image = $request->file('foto');
        $imgName = rand() . '.' . $image->extension();
        $path = public_path('assets/imges');
        $image->move($path,$imgName);

        Donor::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'hp' => $request->hp,
            'umur' => $request->umur,
            'berat' => $request->berat,
            'goldar' => $request->goldar,
            'foto' => $imgName,
        ]);

        $donor_id = Donor::latest()->first();
        Penerimaan::create([
            'status' => "Pending",
            'donor_id' => $donor_id->id
        ]);

        return redirect()->back()->with('daftar', 'Berhasil mendaftarkan diri! Tunggu informasi selanjutnya ya~');
    }

    public function admin(Request $request)
    {
        $search = $request->search;
        $donors = Donor::with('penerimaan')->where('nama', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->simplePaginate(5);
        return view('admin', compact('donors'));
    }

    public function downPDF()
    {
        $data = Donor::with('penerimaan')->get()->toArray();
        view()->share('donors',$data);
        $pdf = PDF::loadview('print', $data)->setPaper('a4', 'landscape');
        return $pdf->download('data_pendonor-darah.pdf');
    }

    public function downExcel()
    {
        $file_name = 'data_pendonor.xlsx';
        return Excel::download(new DonorExport, $file_name);
    }


    public function dukes(Request $request)
    {
        $search = $request->search;
        $donors = Donor::with('penerimaan')->where('nama', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'ASC')->get();
        return view('dukes', compact('donors'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $donor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $donor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donor $donor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donor = Donor::where('id', $id)->firstOrFail();
        $image = public_path('assets/imges/'.$donor['foto']);
        unlink($image);
        $donor->delete();
        Penerimaan::where('donor_id', $id)->delete();
        
        return redirect()->back();

    }
}

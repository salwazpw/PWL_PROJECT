<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pengunjung;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $reservasi = Reservasi::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('pengunjung_id','like',"%{$request->keyword}%")
            ->orWhere('kamar_id','like',"%{$request->keyword}%")
            ->orWhere('tanggal_booking','like',"%{$request->keyword}%")
            ->orWhere('tanggal_checkin','like',"%{$request->keyword}%")
            ->orWhere('tanggal_checkout','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);

            $reservasi->appends($request->only('keyword'));
            return view('reservasi.reservasiIndex',compact('reservasi'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservasi = Reservasi::get();
        $pengunjung = Pengunjung::get();
        $kamar = Kamar::get();

        return view('reservasi.reservasiCreate' ,['reservasi'=>$reservasi, 'pengunjung'=>$pengunjung, 'kamar'=>$kamar, ]);
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
            'Pengunjung'=> 'required',
            'Kamar'=> 'required',
            'tanggal_booking'=> 'required|date',
            'tanggal_checkin'=> 'required',
            'tanggal_checkout'=>'required',
        ]);

        $reservasi = new Reservasi();
        $reservasi->tanggal_booking = $request->get('tanggal_booking');
        $reservasi->tanggal_checkin = $request->get('tanggal_checkin');
        $reservasi->tanggal_checkout = $request->get('tanggal_checkout');

        $pengunjung = new Pengunjung();
        $pengunjung ->id = $request->get('Pengunjung');

        $kamar = new Kamar();
        $kamar->id = $request->get('Kamar');
        
        $reservasi->pengunjung()->associate($pengunjung);
        $reservasi->kamar()->associate($kamar);
        $reservasi->save();
        
        Alert::success('Success','Data Reservasi Berhasil Ditambahkan');
        return redirect()->route('reservasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservasi = Reservasi::with('pengunjung', 'kamar')->where('id', $id)->first();
        return view('reservasi.reservasiDetail', ['reservasi' => $reservasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservasi = Reservasi::with('pengunjung', 'kamar')->where('id', $id)->first();
        $pengunjung = Pengunjung::all();
        $kamar = Kamar::all(); 
        return view('reservasi.reservasiEdit', compact('reservasi', 'pengunjung', 'kamar'));
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
        $request -> validate([
            'Pengunjung'=> 'required',
            'Kamar'=> 'required',
            'tanggal_booking'=> 'required|date',
            'tanggal_checkin'=> 'required',
            'tanggal_checkout'=>'required'
        ]);

        $reservasi = Reservasi::with('pengunjung', 'kamar')->where('id', $id)->first();;
        $reservasi->tanggal_booking = $request->get('tanggal_booking');
        $reservasi->tanggal_checkin = $request->get('tanggal_checkin');
        $reservasi->tanggal_checkout = $request->get('tanggal_checkout');

        $pengunjung = new Pengunjung();
        $pengunjung ->id = $request->get('Pengunjung');

        $kamar = new Kamar();
        $kamar->id = $request->get('Kamar');
        
        $reservasi->pengunjung()->associate($pengunjung);
        $reservasi->kamar()->associate($kamar);
        $reservasi->save();

        return redirect()->route('reservasi.index')
            ->with('success', 'Reservasi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Reservasi::find($id)->delete();
            return redirect()->route('reservasi.index')
                -> with('success', 'Reservasi Berhasil Dihapus');
        }
        catch (\Exception $e) {
            Alert::error('Gagal','Data Tidak Dapat Dihapus Karena Terhubung dengan Tabel Lain');
            return redirect()->route('reservasi.index');
       }
    }

    public function reservasi($id){
        
        $reservasi = Reservasi::where('id', $id)->first();
        return view('reservasi.reservasi',['reservasi' => $reservasi]);

    }

    public function cetak_pdf($id){
        $reservasi = Reservasi::where('id', $id)->first();
        $pdf = PDF::loadview('reservasi.reservasiPdf',['reservasi'=>$reservasi]);
        return $pdf->stream();
    }
}

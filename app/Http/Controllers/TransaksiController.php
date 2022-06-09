<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Kamar;
use App\Models\Pengunjung;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use PDF;


class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 5;
        $transaksi = Transaksi::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('reservasi_id','like',"%{$request->keyword}%")
            ->orWhere('kamar_id','like',"%{$request->keyword}%")
            ->orWhere('pengunjung_id','like',"%{$request->keyword}%")
            ->orWhere('tanggal_transaksi','like',"%{$request->keyword}%")
            ->orWhere('biaya_admin','like',"%{$request->keyword}%")
            ->orWhere('total_harga','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $transaksi->appends($request->only('keyword'));
            return view('transaksi.transaksiIndex',compact('transaksi'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    public function create()
    {
        $transaksi = Transaksi::get();
        $reservasi = Reservasi::get();
        $kamar = Kamar::get();
        $pengunjung = Pengunjung::get();

        return view('transaksi.transaksiCreate' ,['transaksi'=>$transaksi, 'reservasi'=>$reservasi, 'kamar'=>$kamar, 'pengunjung'=>$pengunjung]);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'Reservasi'=> 'required',
            'Kamar' => 'required',
            'Pengunjung' => 'required',
            'tanggal_transaksi' => 'required|date',
            'biaya_admin' => 'required',
            'total_harga' => 'required',
        ]);

        $transaksi = new Transaksi();
        $transaksi->tanggal_transaksi = $request->get('tanggal_transaksi');
        $transaksi->biaya_admin = $request->get('biaya_admin');
        $transaksi->total_harga = $request->get('total_harga');

        $reservasi = new Reservasi();
        $reservasi->id = $request->get('Reservasi');

        $kamar = new Kamar();
        $kamar->id = $request->get('Kamar');

        $pengunjung = new Pengunjung();
        $pengunjung->id = $request->get('Pengunjung');

        $transaksi->reservasi()->associate($reservasi);
        $transaksi->kamar()->associate($kamar);
        $transaksi->pengunjung()->associate($pengunjung);
        $transaksi->save();
        
        Alert::success('Success','Data Transaksi Berhasil Ditambahkan');
        return redirect()->route('transaksi.index');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('reservasi', 'kamar', 'pengunjung')->where('id', $id)->first();
        return view('transaksi.transaksiDetail', ['transaksi' => $transaksi]);
    }

    public function edit($id)
    {
        $transaksi = Transaksi::with('reservasi', 'kamar', 'pengunjung')->where('id', $id)->first();
        $reservasi = Reservasi::all();
        $kamar = Kamar::all(); 
        $pengunjung = Pengunjung::all();
        return view('transaksi.transaksiEdit', compact('transaksi', 'reservasi', 'kamar', 'pengunjung'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Reservasi'=> 'required',
            'Kamar' => 'required',
            'Pengunjung' => 'required',
            'tanggal_transaksi' => 'required|date',
            'biaya_admin' => 'required',
            'total_harga' => 'required',
        ]);

        $transaksi = Transaksi::with('reservasi', 'kamar', 'pengunjung')->where('id', $id)->first();
        $transaksi->tanggal_transaksi = $request->get('tanggal_transaksi');
        $transaksi->biaya_admin = $request->get('biaya_admin');
        $transaksi->total_harga = $request->get('total_harga');

        $reservasi = new Reservasi;
        $reservasi->id = $request->get('Reservasi');

        $kamar = new Kamar;
        $kamar->id = $request->get('Kamar');

        $pengunjung = new Pengunjung;
        $pengunjung->id = $request->get('Pengunjung');
        
        $transaksi->reservasi()->associate($reservasi);
        $transaksi->kamar()->associate($kamar);
        $transaksi->pengunjung()->associate($pengunjung);
        $transaksi->save();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi Berhasil Diupdate');
    }

    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        return redirect()->route('transaksi.index')
            -> with('success', 'Transaksi Berhasil Dihapus');
    }

    public function transaksi($id){
        
        $transaksi = Transaksi::where('id', $id)->first();
        return view('transaksi.transaksi', ['transaksi' => $transaksi]);

    }

    public function cetak_pdf($id){
        $transaksi = Transaksi::where('id', $id)->first();
        $pdf = PDF::loadview('transaksi.transaksi_pdf',['transaksi'=>$transaksi]);
        return $pdf->stream();
    }
}

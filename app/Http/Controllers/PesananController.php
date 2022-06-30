<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Kamar;
use App\Models\Minuman;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use PDF;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 5;
        $pesanan = Pesanan::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('kamar_id','like',"%{$request->keyword}%")
            ->orWhere('makanan_id','like',"%{$request->keyword}%")
            ->orWhere('minuman_id','like',"%{$request->keyword}%")
            ->orWhere('jumlah_minuman','like',"%{$request->keyword}%")
            ->orWhere('jumlah_makanan','like',"%{$request->keyword}%")
            ->orWhere('total_harga','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $pesanan->appends($request->only('keyword'));
            return view('pesanan.pesananIndex',compact('pesanan'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    public function create()
    {
        $pesanan = Pesanan::get();
        $kamar = Kamar::get();
        $makanan = Makanan::get();
        $minuman = Minuman::get();

        return view('pesanan.pesananCreate' ,['pesanan'=>$pesanan, 'kamar'=>$kamar, 'makanan'=>$makanan, 'minuman'=>$minuman]);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'Kamar'=> 'required',
            'Makanan' => 'required',
            'jumlah_makanan' => 'required|max:3',
            'Minuman' => 'required',
            'jumlah_minuman' => 'required|max:3',
            'total_harga' => 'required',
        ]);

        $pesanan = new Pesanan();
        $pesanan->jumlah_makanan = $request->get('jumlah_makanan');
        $pesanan->jumlah_minuman = $request->get('jumlah_minuman');
        $pesanan->total_harga = $request->get('total_harga');

        $kamar = new Kamar();
        $kamar->id = $request->get('Kamar');

        $makanan = new Makanan();
        $makanan->id = $request->get('Makanan');

        $minuman = new Minuman();
        $minuman->id = $request->get('Minuman');
        
        $pesanan->kamar()->associate($kamar);
        $pesanan->makanan()->associate($makanan);
        $pesanan->minuman()->associate($minuman);
        $pesanan->save();
        
        Alert::success('Success','Data Pesanan Berhasil Ditambahkan');
        return redirect()->route('pesanan.index');
    }

    public function show($id)
    {
        $pesanan = Pesanan::with('kamar', 'makanan', 'minuman')->where('id', $id)->first();
        return view('pesanan.pesananDetail', ['pesanan' => $pesanan]);
    }

    public function edit($id)
    {
        $pesanan = Pesanan::with('kamar', 'makanan', 'minuman')->where('id', $id)->first();
        $kamar = Kamar::all(); 
        $makanan = Makanan::all(); 
        $minuman = Minuman::all(); 
        return view('pesanan.pesananEdit', compact('pesanan', 'kamar', 'makanan', 'minuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Kamar'=> 'required',
            'Makanan' => 'required',
            'jumlah_makanan' => 'required|max:3',
            'Minuman' => 'required',
            'jumlah_minuman' => 'required|max:3',
            'total_harga' => 'required',
        ]);

        $pesanan = Pesanan::with('kamar', 'makanan', 'minuman')->where('id', $id)->first();
        $pesanan->jumlah_makanan = $request->get('jumlah_makanan');
        $pesanan->jumlah_minuman = $request->get('jumlah_minuman');
        $pesanan->total_harga = $request->get('total_harga');

        $kamar = new Kamar;
        $kamar->id = $request->get('Kamar');

        $makanan = new Makanan;
        $makanan->id = $request->get('Makanan');

        $minuman = new Minuman;
        $minuman->id = $request->get('Minuman');
        
        $pesanan->kamar()->associate($kamar);
        $pesanan->makanan()->associate($makanan);
        $pesanan->minuman()->associate($minuman);
        $pesanan->save();

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan Berhasil Diupdate');
    }

    public function destroy($id)
    {
        Pesanan::find($id)->delete();
        Alert::warning('Success','Data Pesanan Berhasil Dihapus');
        return redirect()->route('pesanan.index')
            -> with('success', 'Pesanan Berhasil Dihapus');
    }

    public function pesanan($id){
        
        $pesanan = Pesanan::where('id', $id)->first();
        return view('pesanan.pesanan',['pesanan' => $pesanan]);

    }

    public function cetak_pdf($id){
        $pesanan = Pesanan::where('id', $id)->first();
        $pdf = PDF::loadview('pesanan.pesananPdf',['pesanan'=>$pesanan]);
        return $pdf->stream();
    }
}

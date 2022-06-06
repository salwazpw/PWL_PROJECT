<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Kamar;
use App\Models\Minuman;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

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
        $kamar = Kamar::get();
        $pesanan = Pesanan::get();
        $makanan = Makanan::get();
        $minuman = Minuman::get();

        // if($jumlah_makanan){
        //     $pesanan->jumlah_makanan = $_GET['jumlah_makanan'];
        //     $pesanan->jumlah_minuman = $_GET['jumlah_minuman'];
        //     $makanan->harga = $_GET['harga'];
        //     $minuman->harga = $_GET['harga'];
        //     $pesanan->total_harga = ($pesanan->jumlah_makanan*$makanan->harga)+($pesanan->jumlah_minuman*$minuman->harga);
        // }

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
            'id' => 'required',
            'Kamar'=> 'required',
            'Makanan' => 'required',
            'jumlah_makanan' => 'required|max:3',
            'Minuman' => 'required',
            'jumlah_minuman' => 'required|max:3',
            'total_harga' => 'required',
        ]);

        $pesanan = new Pesanan();
        $pesanan->id = $request->get('id');
        $pesanan->jumlah_makanan = $request->get('jumlah_makanan');
        $pesanan->jumlah_minuman = $request->get('jumlah_minuman');
        $pesanan->total_harga = $request->get('total_harga');

        $kamar = new Kamar();
        $kamar->id = $request->get('Kamar');

        $makanan = new Makanan();
        $makanan->id = $request->get('Makanan');

        $minuman = new Minuman();
        $minuman->id = $request->get('Minuman');
        
        $pesanan->makanan()->associate($kamar);
        $pesanan->makanan()->associate($makanan);
        $pesanan->minuman()->associate($minuman);
        $pesanan->save();

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan Berhasil Diupdate');
    }

    public function destroy($id)
    {
        Pesanan::find($id)->delete();
        return redirect()->route('pesanan.index')
            -> with('success', 'Pesanan Berhasil Dihapus');
    }
}

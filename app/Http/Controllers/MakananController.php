<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class MakananController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 5;
        $makanan = Makanan::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('nama_makanan','like',"%{$request->keyword}%")
            ->orWhere('gambar_makanan','like',"%{$request->keyword}%")
            ->orWhere('harga','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $makanan->appends($request->only('keyword'));
            return view('makanan.makananIndex',compact('makanan'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    public function create()
    {
        $makanan = Makanan::all();
        return view('makanan.makananCreate',['makanan'=>$makanan]);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'id'=> 'required|string|max:10',
            'nama_makanan' => 'required|string',
            'foto_makanan' => 'required',
            'harga' => 'required|float',
        ]);
        
        $makanan = new Makanan;
        $makanan->id = $request->get('id');
        $makanan->nama_makanan = $request->get('nama_makanan');
        $makanan->harga = $request->get('harga');

        if ($request->file('gambar_makanan')){
            $image_name = $request ->file('gambar_makanan')->store('images', 'public');
        }

        $makanan->gambar_makanan = $image_name;

        $makanan->save();
        
        Alert::success('Success','Data Makanan Berhasil Ditambahkan');
        return redirect()->route('makanan.index');
    }

    public function show($id)
    {
        $makanan = Makanan::find($id);
        return view('makanan.makananDetail',compact('makanan'));
    }

    public function edit($id)
    {
        $makanan = Makanan::find($id);
        return view('makanan.makananEdit',compact('makanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id'=> 'required|string|max:10',
            'nama_makanan' => 'required|string',
            'harga' => 'required|string',
        ]);
        $makanan = Makanan::where('id', $id)->first();
        $makanan->id = $request->get('id');
        $makanan->nama_makanan = $request->get('nama_makanan');
        $image_name = $request->file('gambar_makanan')->store('images', 'public');
        $makanan->gambar_makanan = $image_name;
        $makanan->harga = $request->get('harga');

        if($request->hasFile('gambar_makanan')){
            if($makanan->gambar_makanan && file_exists(storage_path('app/public/'. $makanan->gambar_makanan))){
                Storage::delete('public/'.$makanan->gambar_makanan);
            }
            $image_name = $request->file('gambar_makanan')->store('images', 'public');
            $makanan->gambar_makanan = $image_name;
        }
        $makanan->save();

        return redirect()->route('makanan.index')
        ->with('success', 'Data Makanan Berhasil Diupdate');
    }

    public function destroy($id)
    {
        Makanan::find($id)->delete();
        return redirect()->route('makanan.index')
            -> with('success', 'Makanan Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Minuman;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class MinumanController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 5;
        $minuman = Minuman::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('nama_minuman','like',"%{$request->keyword}%")
            ->orWhere('gambar_minuman','like',"%{$request->keyword}%")
            ->orWhere('harga','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $minuman->appends($request->only('keyword'));
            return view('minuman.minumanIndex',compact('minuman'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    public function create()
    {
        $minuman = Minuman::all();
        return view('minuman.minumanCreate',['minuman'=>$minuman]);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nama_minuman' => 'required|string',
            'gambar_minuman' => 'required',
            'harga' => 'required',
        ]);

        $minuman = new Minuman();
        $minuman->id = $request->get('id');
        $minuman->nama_minuman = $request->get('nama_minuman');
        $minuman->harga = $request->get('harga');

        if ($request->file('gambar_minuman')){
            $image_name = $request ->file('gambar_minuman')->store('images', 'public');
        }

        $minuman->gambar_minuman = $image_name;

        $minuman->save();
        
        Alert::success('Success','Data Minuman Berhasil Ditambahkan');
        return redirect()->route('minuman.index');
    }

    public function show($id)
    {
        $minuman = Minuman::find($id);
        return view('minuman.minumanDetail',compact('minuman'));
    }

    public function edit($id)
    {
        $minuman = Minuman::find($id);
        return view('minuman.minumanEdit',compact('minuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_minuman' => 'required|string',
            'harga' => 'required|string',
        ]);
        $minuman = Minuman::where('id', $id)->first();
        $minuman->nama_minuman = $request->get('nama_minuman');
        $image_name = $request->file('gambar_minuman')->store('images', 'public');
        $minuman->gambar_minuman = $image_name;
        $minuman->harga = $request->get('harga');

        if($request->hasFile('gambar_minuman')){
            if($minuman->gambar_minuman && file_exists(storage_path('app/public/'. $minuman->gambar_minuman))){
                Storage::delete('public/'.$minuman->gambar_minuman);
            }
            $image_name = $request->file('gambar_minuman')->store('images', 'public');
            $minuman->gambar_minuman = $image_name;
        }
        $minuman->save();

        return redirect()->route('minuman.index')
        ->with('success', 'Data Minuman Berhasil Diupdate');
    }

    public function destroy($id)
    {
        try{
            Minuman::find($id)->delete();
            return redirect()->route('minuman.index')
                -> with('success', 'Minuman Berhasil Dihapus');
        }
        catch (\Exception $e) {
            Alert::error('Gagal','Data Tidak Dapat Dihapus Karena Terhubung dengan Tabel Lain');
            return redirect()->route('minuman.index');
       }
    }
}

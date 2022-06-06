<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $kamar = Kamar::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('tipe_kamar','like',"%{$request->keyword}%")
            ->orWhere('foto_kamar','like',"%{$request->keyword}%")
            ->orWhere('harga','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $kamar->appends($request->only('keyword'));
            return view('kamar.kamarIndex',compact('kamar'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kamar = Kamar::all();
        return view('kamar.kamarCreate',['kamar'=>$kamar]);
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
            'id'=> 'required|string|max:10',
            'tipe_kamar' => 'required|string',
            'foto_kamar' => 'required',
            'harga' => 'required',
        ]);

        $kamar = new Kamar();
        $kamar->id = $request->get('id');
        $kamar->tipe_kamar = $request->get('tipe_kamar');
        $kamar->harga = $request->get('harga');

        if ($request->file('foto_kamar')){
            $image_name = $request ->file('foto_kamar')->store('images', 'public');
        }

        $kamar->foto_kamar = $image_name;

        $kamar->save();
        
        Alert::success('Success','Data Kamar Berhasil Ditambahkan');
        return redirect()->route('kamar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kamar = Kamar::find($id);
        return view('kamar.kamarDetail',compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kamar = Kamar::find($id);
        return view('kamar.kamarEdit',compact('kamar'));
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
            'tipe_kamar' => 'required|string',
            'harga' => 'required',
        ]);

        $kamar = Kamar::where('id', $id)->first();
        $image_name = $request->file('foto_kamar')->store('images', 'public');
        $kamar->foto_kamar = $image_name;
        $kamar->harga = $request->get('harga');

        if($request->hasFile('foto_kamar')){
            if($kamar->foto_kamar && file_exists(storage_path('app/public/'. $kamar->foto_kamar))){
                Storage::delete('public/'.$kamar->foto_kamar);
            }
            $image_name = $request->file('foto_kamar')->store('images', 'public');
            $kamar->foto_kamar = $image_name;
        }
        
        $kamar->save();

        return redirect()->route('kamar.index')
        ->with('success', 'Data Kamar Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kamar::find($id)->delete();
        return redirect()->route('kamar.index')
            -> with('success', 'Data Kamar Berhasil Dihapus');
    }
}

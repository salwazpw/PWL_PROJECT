<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $pengunjung = Pengunjung::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('nik','like',"%{$request->keyword}%")
            ->orWhere('nama','like',"%{$request->keyword}%")
            ->orWhere('jenis_kelamin','like',"%{$request->keyword}%")
            ->orWhere('alamat','like',"%{$request->keyword}%")
            ->orWhere('no_telp','like',"%{$request->keyword}%");;
        })->orderBy('id')->paginate($pagination);


            $pengunjung->appends($request->only('keyword'));
            return view('pengunjung.pengunjungIndex',compact('pengunjung'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengunjung = Pengunjung::all();
        return view('pengunjung.pengunjungCreate',['pengunjung'=>$pengunjung]);
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
            'nik' => 'required|max:16',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
        ]);
        $pengunjung = new Pengunjung();
        $pengunjung->id = $request->get('id');
        $pengunjung->nik = $request->get('nik');
        $pengunjung->nama = $request->get('nama');
        $pengunjung->jenis_kelamin = $request->get('jenis_kelamin');
        $pengunjung->alamat = $request->get('alamat');
        $pengunjung->no_telp = $request->get('no_telp');
        $pengunjung->save();
        
        Alert::success('Success','Data pengunjung Berhasil Ditambahkan');
        return redirect()->route('pengunjung.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengunjung = Pengunjung::find($id);
        return view('pengunjung.pengunjungDetail',compact('pengunjung'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengunjung = Pengunjung::find($id);
        return view('pengunjung.pengunjungEdit',compact('pengunjung'));
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
            'id'=> 'required|string|max:10',
            'nik' => 'required|max:16',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
        ]);
        $pengunjung = Pengunjung::where('id', $id)->first();
        $pengunjung->id = $request->get('id');
        $pengunjung->nik = $request->get('nik');
        $pengunjung->nama = $request->get('nama');
        $pengunjung->jenis_kelamin = $request->get('jenis_kelamin');
        $pengunjung->alamat = $request->get('alamat');
        $pengunjung->no_telp = $request->get('no_telp');
        $pengunjung->save();

        return redirect()->route('pengunjung.index')
        ->with('success', 'Data Pengunjung Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengunjung::find($id)->delete();
        return redirect()->route('pengunjung.index')
            -> with('success', 'Pengunjung Berhasil Dihapus');
    }
}

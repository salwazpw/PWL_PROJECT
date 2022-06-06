<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 5;
        $pegawai = Pegawai::when($request->keyword, function($query) use ($request){
            $query
            ->where('nip','like',"%{$request->keyword}%")
            ->orWhere('nama_pegawai','like',"%{$request->keyword}%")
            ->orWhere('foto_pegawai','like',"%{$request->keyword}%")
            ->orWhere('alamat','like',"%{$request->keyword}%")
            ->orWhere('jenis_kelamin','like',"%{$request->keyword}%")
            ->orWhere('tanggal_lahir','like',"%{$request->keyword}%")
            ->orWhere('no_telp','like',"%{$request->keyword}%")
            ->orWhere('jabatan','like',"%{$request->keyword}%")
            ->orWhere('gaji','like',"%{$request->keyword}%");
        })->orderBy('nip')->paginate($pagination);


            $pegawai->appends($request->only('keyword'));
            return view('pegawai.pegawaiIndex',compact('pegawai'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.pegawaiCreate',['pegawai'=>$pegawai]);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nip'=> 'required|string|max:10',
            'nama_pegawai' => 'required|string',
            'foto_pegawai' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telp' => 'required|max:13',
            'jabatan' => 'required',
            'gaji' => 'required',
        ]);
        // Pegawai::create($request->all());
        $pegawai = new Pegawai;
        $pegawai->nip = $request->get('nip');
        $pegawai->nama_pegawai = $request->get('nama_pegawai');
        $pegawai->alamat = $request->get('alamat');
        $pegawai->jenis_kelamin = $request->get('jenis_kelamin');
        $pegawai->tanggal_lahir = $request->get('tanggal_lahir');
        $pegawai->no_telp = $request->get('no_telp');
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->gaji = $request->get('gaji');

        if ($request->file('foto_pegawai')){
            $image_name = $request ->file('foto_pegawai')->store('images', 'public');
        }

        $pegawai->foto_pegawai = $image_name;

        $pegawai->save();
        
        Alert::success('Success','Data Pegawai Berhasil Ditambahkan');
        return redirect()->route('pegawai.index');
    }

    public function show($nip)
    {
        $pegawai = Pegawai::find($nip);
        return view('pegawai.pegawaiDetail',compact('pegawai'));
    }

    public function edit($nip)
    {
        $pegawai = Pegawai::find($nip);
        return view('pegawai.pegawaiEdit',compact('pegawai'));
    }

    public function update(Request $request, $nip)
    {
        $request->validate([
            'nip'=> 'required|string|max:10',
            'nama_pegawai' => 'required|string',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',           
            'no_telp' => 'required|max:13',
            'jabatan' => 'required',
            'gaji' => 'required',
        ]);
        $pegawai = Pegawai::where('nip', $nip)->first();
        $pegawai->nip = $request->get('nip');
        $pegawai->nama_pegawai = $request->get('nama_pegawai');
        $image_name = $request->file('foto_pegawai')->store('images', 'public');
        $pegawai->foto_pegawai = $image_name;
        $pegawai->alamat = $request->get('alamat');
        $pegawai->jenis_kelamin = $request->get('jenis_kelamin');
        $pegawai->tanggal_lahir = $request->get('tanggal_lahir');    
        $pegawai->no_telp = $request->get('no_telp');
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->gaji = $request->get('gaji');

        if($request->hasFile('foto_pegawai')){
            if($pegawai->foto_pegawai && file_exists(storage_path('app/public/'. $pegawai->foto_pegawai))){
                Storage::delete('public/'.$pegawai->foto_pegawai);
            }
            $image_name = $request->file('foto_pegawai')->store('images', 'public');
            $pegawai->foto_pegawai = $image_name;
        }
        $pegawai->save();

        // Pegawai::find($nip)->update($request->all());
        return redirect()->route('pegawai.index')
        ->with('success', 'Data Pegawai Berhasil Diupdate');
    }

    public function destroy($nip)
    {
        Pegawai::find($nip)->delete();
        return redirect()->route('pegawai.index')
            -> with('success', 'Pegawai Berhasil Dihapus');
    }
}

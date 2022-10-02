<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        $data = [
            'siswa' => $siswa
        ];
        return view('siswa/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required'
          ]);

        $siswa = new Siswa;

        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;

        try {
            // Validate the value...
            $siswa->save();
            return redirect('/siswa')->with('success', 'Data Siswa Behasil di Simpan!');
        } catch (Exception $e) {
            return redirect('/siswa/create')->with('error', 'NIS Siswa Sudah Tepakai!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $siswa = DB::table('tbl_siswa')->where('nis', $id)->first();
        $siswa = Siswa::find($id);
        $data = [
            'siswa' => $siswa
        ];
        return view('siswa/edit', $data);
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
        // $validation = $request->validate([
        //     'nis' => 'required',
        //     'nama' => 'required',
        //     'tgl_lahir' => 'required',
        //     'jenis_kelamin' => 'required'
        //   ]);

        $siswa = Siswa::find($id);
        $siswa->update($request->except(['_token','submit']));
        return redirect('/siswa')->with('update', 'Data Siswa Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $siswa = Siswa::where('nis',$id)->first();
        // // $siswa = Siswa::findOrFail($id);
        // $siswa->delete();
        // return redirect('/siswa');

        DB::table('tbl_siswa')->where('nis', $id)->delete();
        return redirect('/siswa')->with('delete', 'Data Siswa Behasil di Hapus!');

    }
}

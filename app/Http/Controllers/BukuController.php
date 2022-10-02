<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Exception;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        $data = [
            'buku' => $buku
        ];
        return view('buku/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku/create');
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
            'id_buku' => 'required',
            'judul' => 'required',
            'isbn' => 'required',
            'pengarang' => 'required',
        ]);

        $buku = new Buku;

        $buku->id_buku = $request->id_buku;
        $buku->judul = $request->judul;
        $buku->isbn = $request->isbn;
        $buku->pengarang = $request->pengarang;

        try {
            $DataBuku = Buku::where('id_buku', $request->id_buku)->first();
            if($DataBuku) :
                return redirect('/buku/create')->with('error', 'ID Buku Sudah Terpakai!');
            else :

                $buku->save();
                return redirect('/buku')->with('success', 'Data Buku Berhasi di Simpan');

            endif;
        } catch (Exception $e) {
            return redirect('/buku/create')->with('error', 'ID Buku Sudah Terpakai!');
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
        $buku = Buku::where('id', $id)->first();
        $data = [
            'buku' => $buku
        ];
        return view('/buku/edit', $data);
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

        $buku = Buku::find($id);
        $buku->update($request->except(['_token','submit']));
        return redirect('/buku')->with('update', 'Data Buku Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::where('id', $id)->delete();
        return redirect('/buku')->with('delete', 'Data Buku Behasil di Hapus!');
    }
}

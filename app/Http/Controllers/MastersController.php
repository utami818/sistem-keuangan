<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Master;
use App\User;
use App\Student;
use DB;

class MastersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['masters'] = DB::table('masters')->get();
        return view('masters.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            // 'kode_cabang.required' => ':attribute jangan diubah!!',
            // 'kode_cabang.unique' => ':attribute sudah terdaftar, :attribute tidak boleh sama!!',
            'nama_cabang.required' => ':attribute jangan diubah!!',
        ];
        $request->validate([
            // 'kode_cabang' => 'required|unique',   
            'nama_cabang' => 'required',   
        ],$messages);
        Master::create([
            'id' => Master::getId($request),
            // 'kode_cabang' => $request->kode_cabang,
            'nama_cabang' => $request->nama_cabang,
        ]);

        return redirect('/masters')->with('status', 'Data Cabang Berhasil Ditambahkan!!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        // $master = DB::table('masters')->get();
        Master::destroy($master->id);

        return redirect('/masters')->with('status', 'Data Berhasil Dihapus!!');
    }
}

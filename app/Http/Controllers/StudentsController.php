<?php

namespace App\Http\Controllers;

use App\Master;
use App\Student;
use App\payment;
use DB;


use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = DB::table('students');
        $id = $data->get('id');          
        $students = DB::table('students')
        ->join('masters','masters.kode_cabang','=','students.kode_cabang')
        // ->select('masters.*', 'students.nis', 'students.nama','students.email', 'students.alamat', 'students.kelas', 'students.jenjang', 'students.biaya', 'students.biaya_daftar')
        ->get();
        $student = $students->where('students.id', $id)->first();
        // $detail = Student::where('nis', $student->nis)->get();
        $total = Student::max('id');
        $totals = Student::sum('biaya_daftar');
        // $students = Student::with(['payments', 'payments.angsuran'])->orderBy('created_at', 'DESC')->get();
        return view('students.index', compact('students', 'total', 'totals', 'student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masters = DB::table('masters')->get();
        return view('students.create', compact('masters'));
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
            'nis.required' => ':attribute jangan diubah!!',
            'kode_cabang.required' => ':attribute jangan diubah!!',
            'nama.required' => ':attribute harus diisi!!',
            'email.required' => ':attribute harus diisi!!',
            'email.unique' => ':attribute sudah terdaftar, :attribute tidak boleh sama!!',
            'kelas.required' => ':attribute harus diisi!!',
            'jenjang.required' => ':attribute harus diisi!!',
            'biaya.required' => ':attribute harus diisi!!',
        ];
        $request->validate([
            'kode_cabang' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:students',
            'kelas' => 'required',
            'jenjang' => 'required',
            'alamat' => 'required',
            'biaya' => 'required',
            'biaya_daftar' => 'required',

        ],$messages);
        Student::create([
            'nis' => Student::getId($request),
            'kode_cabang' => $request->kode_cabang,
            'nama' => $request->nama,
            'email' => $request->email,
            // 'nis' => $request->nis,
            'kelas' => $request->kelas,
            'jenjang' => $request->jenjang,
            'alamat' => $request->alamat,
            'biaya' => $request->biaya,
            'biaya_daftar' => $request->biaya_daftar,
        ]);

        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        // $students = DB::table('students')
        // ->join('payments','payments.nis','=','students.nis')
        // ->get();
        // $data['student'] = $students->where('id', $id)->first();
        // $data['detail'] = payment::where('nis', $data['student']->nis)->get();
        // $data['total'] = payment::where('nis', $data['student']->nis)->sum('angsuran');

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        Student::where('id', $student->id)
        ->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'jenjang' => $request->jenjang,
            'alamat' => $request->alamat,
            'biaya' => $request->biaya,
            'biaya_daftar' => $request->biaya_daftar,
        ]);
        return redirect('/students')->with('status', 'Data Siswa Berhasil Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
    public function search(Request $request)
    {
        $query = $request->get('q');
        $querys = $request->get('search');
        $hasil = Student::where('nis', 'LIKE', '%' . $query . '%')
        ->where('created_at', 'LIKE', '%' . $querys . '%')
        ->paginate(10);
        $total = Student::where('nis', 'LIKE', '%' . $query . '%')
        ->where('created_at', 'LIKE', '%' . $querys . '%')
        ->sum('biaya_daftar');
        
        return view('students.result', compact('hasil', 'query', 'querys', 'total'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Master;
use App\User;
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
        $data['students'] = Student::with('master')
        ->with('user')
        ->get();
        // $data['id'] = $data['user']->student()->master();
        // $data['users'] = User::with('student')
        // // ->where('id', $id)
        // ->get();
        $data['student'] = Student::all();
        $data['total'] = Student::max('id');
        $data['totals'] = Student::sum('biaya_daftar');
        // $students = Student::with(['payments', 'payments.angsuran'])->orderBy('created_at', 'DESC')->get();
        // dd($data);
        return view('students.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masters = DB::table('masters')->get();
        $user = DB::table('users')->get();
        return view('students.create', compact('masters', 'user'));
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
            'master_id.required' => ':attribute jangan diubah!!',
            'user_id.required' => ':attribute jangan diubah!!',
            'nama.required' => ':attribute harus diisi!!',
            'email.required' => ':attribute harus diisi!!',
            'email.unique' => ':attribute sudah terdaftar, :attribute tidak boleh sama!!',
            'kelas.required' => ':attribute harus diisi!!',
            'jenjang.required' => ':attribute harus diisi!!',
            'biaya.required' => ':attribute harus diisi!!',
        ];
        $request->validate([
            'master_id' => 'required',
            // 'user_id' => 'required',
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
            'master_id' => $request->master_id,
            'user_id' => $request->user_id,
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
        // $students = DB::table('students');
        // ->join('payments','payments.nis','=','students.nis')
        // ->get();
        // $data['student'] = $students->where('students.id', $id)->first();
        // $data['detail'] = student::where('students.nis', $data['student']->nis)->get();
        // $data['total'] = student::where('nis', $data['student']->nis)->sum('angsuran');

        return view('students.show', compact('student'));
        // return $student;
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

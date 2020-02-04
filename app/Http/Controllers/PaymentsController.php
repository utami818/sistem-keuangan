<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Student;
use DB;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = DB::table('payments')
        ->join('students','students.nis','=','payments.nis')
        ->select('students.*','payments.biaya','payments.angsuran','payments.saldo', 'payments.created_at')
        ->get();
        $total = DB::table('payments')
        ->join('students','students.nis','=','payments.nis')
        ->select('students.*','payments.biaya','payments.angsuran','payments.saldo', 'payments.created_at')
        ->sum('payments.angsuran');
        $totals = DB::table('payments')
        ->join('students','students.nis','=','payments.nis')
        ->select('students.*','payments.biaya','payments.angsuran','payments.saldo', 'payments.created_at')
        ->sum('students.biaya_daftar');
        // $payments = Payment::all();
        return view('payments.index', compact('payments', 'total', 'totals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Payment $payment)
    {
        return view('payments.create');
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
            'nis.required' => ':attribute harus diisi!!',
            'biaya.required' => ':attribute harus diisi!!',
            'angsuran.required' => ':attribute harus diisi!!',
        ];
        $request->validate([
            'nis' => 'required',
            'biaya' => 'required',
            'angsuran' => 'required',

        ],$messages);
        Payment::create([
            'nis' => $request->nis,
            'biaya' => $request->biaya,
            // 'nis' => Student::getId($request),
            'angsuran' => $request->angsuran,
            'saldo' => Payment::getId($request),
        ]);

        return redirect('/payments')->with('status', 'Pembayaran Mahasiswa Berhasil!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payments = DB::table('payments')
        ->join('students','students.nis','=','payments.nis')
        ->get();
        $data['payment'] = $payments->where('id', $id)->first();
        $data['detail'] = payment::where('nis', $data['payment']->nis)->get();
        $data['total'] = payment::where('nis', $data['payment']->nis)->sum('angsuran');
        // return $data; die;
        return view('payments.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payments = DB::table('payments')
        ->join('students','students.nis','=','payments.nis')
        ->get();
        $data['payment'] = $payments->where('id', $id)->first();
        $data['detail'] = payment::where('nis', $data['payment']->nis)->get();
        $data['total'] = payment::where('nis', $data['payment']->nis)->sum('angsuran');
        return view('payments.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        Payment::where('id', $payment->id)
        ->create([
            'nis' => $request->nis,
            'biaya' => $request->biaya,
            // 'nis' => Student::getId($request),
            'angsuran' => $request->angsuran,
            'saldo' => Payment::getId($request),
        ]);
        return redirect('/payments')->with('status', 'Data Angsuran Berhasil Ditambahkan!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request)
    {
        $query = $request->get('q');
        $querys = $request->get('search');
        $hasil = DB::table('payments')
        ->join('students','students.nis','=','payments.nis')
        ->select('students.*','payments.biaya','payments.angsuran','payments.saldo', 'payments.created_at')
        ->where('students.nis', 'LIKE', '%' . $query . '%')
        ->where('payments.created_at', 'LIKE', '%' . $querys . '%')
        ->paginate(200);
        $total = DB::table('payments')
        ->join('students','students.nis','=','payments.nis')
        ->select('students.*','payments.biaya','payments.angsuran','payments.saldo', 'payments.created_at')
        ->where('students.nis', 'LIKE', '%' . $query . '%')
        ->where('payments.created_at', 'LIKE', '%' . $querys . '%')
        ->sum('payments.angsuran');

        return view('result', compact('hasil', 'query', 'query', 'total'));
    }
}

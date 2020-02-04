<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class Payment extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    protected $primaryKey = 'id';
    protected $fillable = ['nis', 'biaya', 'angsuran', 'saldo'];
    public static function getId($request)
    {
        $biaya = $request->biaya;
        $angsuran = $request->angsuran;
        $hasil_perhitungan = $biaya - $angsuran;

        return $hasil_perhitungan;
    }
}

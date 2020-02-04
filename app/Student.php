<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
use App\Master;

class Student extends Model
{
    public function Master()
    {
        return $this->hasMany(Master::class);
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
    protected $fillable = ['nama', 'email', 'nis', 'kode_cabang', 'kelas', 'jenjang', 'alamat', 'biaya', 'biaya_daftar' ];
    public static function getId($request){  
        $jenjang = $request->jenjang; //nilai jenjang didapat dari parameter
        $digit = 4; //banyaknya digit angka setelah kode yang diinginkan
        $lastNumber = Student::orderBy('id', 'desc')->first() ? Student::orderBy('id', 'desc')->first()->id: 0; // didatat dari database get last id

        switch ($jenjang){
            case 'SD':
            $kode = 1;
            break;
            case 'SMP':
            $kode = 2;
            break;
            case 'SMA':
            $kode = 3;
            break;
            default:
            $kode = 0;
            break;
        }

        $nol = str_repeat("0", $digit); //untuk mengisi digit kosong dengan angka 0
        $hasil =$kode . substr($nol . ++$lastNumber, -$digit); //hasil   akhir

        return $hasil;
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Student;
use App\User;

class Master extends Model
{
    
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    use SoftDeletes;
    
    protected $fillable = ['kode_cabang', 'nama_cabang'];
    public static function getId($request){
        $nama_cabang = $request->nama_cabang;
        $digit = 2;
        $lastNumber = Master::orderBy('id', 'desc')->first() ? Master::orderBy('id', 'desc')->first()->id: 0; // didata dari database get last id
        
        switch($nama_cabang){
            case $nama_cabang:
                $kode = $nama_cabang;
            break;
            default:
            $kode = 0;
        break;
    }
    
    $nol = str_repeat('0', $digit);
    $hasil =  $kode . substr( $nol . ++$lastNumber, -$digit);
    
    return $hasil;
    }
}

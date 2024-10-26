<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    
    protected $fillable = ['code', 'status', 'transaction_id'];
    protected $with = ['transaction'];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public static function generateUniqueCode($length = 6) {
        $code = self::generateCode($length);

        while(self::where('code', $code)->exists()){
            $code = self::generateCode($length);
        }

        return $code;
    }

    public static function generateCode($length){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';
        for($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) -1 )];
        }
        return $code;
    }
}

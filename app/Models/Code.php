<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'status'];
    protected $with = ['transaction'];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
    
}

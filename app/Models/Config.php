<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable=['sales_target'];
    protected $with=['sale'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sales::class,'sales_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    # to get the type of an application
    public function types(){
        return $this->hasMany(Type::class);
    }

    # to get the denomination of an application
    public function denominations(){
        return $this->hasMany(Denomination::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
    public function deno()
    {
        return $this->belongsTo(Denomination::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applicationFees()
    {
        return $this->hasMany(ApplicationFee::class);
    }

    public function dropping()
    {
        return $this->hasOne(Dropping::class);
    }
}

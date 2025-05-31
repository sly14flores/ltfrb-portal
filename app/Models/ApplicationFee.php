<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationFee extends Model
{
    use HasFactory;

    protected $fillable = ['application_id', 'fee_id'];
    public $timestamps = false;

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }
}

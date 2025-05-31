<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationType extends Model
{
    use HasFactory;

    protected $table = ['application_type'];
    public $timestamps = false;
    protected $fillable = ['application_id', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}

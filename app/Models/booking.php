<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(client::class, 'foreign_key', 'userid');
    }
    public function service()
    {
        return $this->belongsTo(service::class, 'foreign_key', 'serviceid');
    }
}

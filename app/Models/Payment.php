<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function responsible()
    {
        return $this->hasOne(Responsible::class);
    }

    public function event()
    {
        return $this->hasOne(Event::class);
    }

    public function assistants()
    {
        return $this->hasMany(Assistants::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at', 'updated_at'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "event_id",
        "responsible_id",
        "total"
    ];

    public function responsible()
    {
        return $this->hasMany(Responsible::class, 'id', 'responsible_id');
    }

    public function event()
    {
        return $this->hasMany(Event::class, 'id', 'event_id');
    }

    public function assistants()
    {
        return $this->hasMany(Assistant::class);
    }
}

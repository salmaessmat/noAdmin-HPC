<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $primaryKey = ('id');
    public $timestamps = false;
    protected $guarded = [];    //allows mass assignment

    public function action()
    {
        return $this->belongsTo(Action::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use \Awobaz\Compoships\Compoships;
    use HasFactory;
    protected $table = 'action';
    protected $primaryKey = ('id');
    public $incrementing = false;

    public function events()
    {
        return $this->hasMany(Event::class);

    }

}

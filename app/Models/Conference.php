<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;
    protected $table = 'conference';
    protected $primaryKey = ('id');
    public $timestamps = false;
    protected $guarded = [];

    public function projects()
    {
        return $this->hasMany(Publication::class);

    }
}

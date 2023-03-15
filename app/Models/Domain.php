<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use \Awobaz\Compoships\Compoships;
    use HasFactory;
    protected $table = 'domain';
    protected $primaryKey = ('id');
    public $incrementing = false;

    public function projects()
    {
        return $this->hasMany(Project::class);

    }
}

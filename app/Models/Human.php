<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    use HasFactory;
    protected $table = 'human';
    protected $primaryKey = ['id','edit'];
    public $incrementing = false;
    use \Awobaz\Compoships\Compoships;

    public function human_email()
    {
        return $this->hasMany(Human_email::class, ['id', 'edit'],['human_id', 'human_edit']);

    }
    public function publication_author()
    {
        return $this->hasMany(Publication_author::class, ['human_id', 'human_edit'], ['id', 'edit']);
    }
}

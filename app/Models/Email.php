<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'email';
    protected $primaryKey = ('id');
    public $incrementing = false;
    use HasFactory;

    public function human_email()
    {
        return $this->hasOne(Human_email::class);
    }

    public function collaborator()
    {
        return $this->hasMany(Collaborator::class);
    }
}

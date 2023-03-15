<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Human_email extends Model
{
    use HasFactory;
    use \Awobaz\Compoships\Compoships;
    protected $table = 'human_email';
    protected $primaryKey = ['human_id','human_edit','email_id'];
    public $incrementing = false;

    public function email()
    {
        return $this->belongsTo(Email::class);
    }

    public function human()
    {
        return $this->belongsTo(Human::class, ['human_id', 'human_edit'], ['id', 'edit']);
    }

}

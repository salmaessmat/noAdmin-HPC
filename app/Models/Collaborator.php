<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    protected $table = 'collaborator';
    protected $primaryKey = ('id');
    public $incrementing = false;
    use HasFactory;
    use \Awobaz\Compoships\Compoships;

    public function project()
    {
        return $this->belongsTo(Project::class, ['project_id', 'project_edit'],['id', 'edit']);
    }

    public function email()
    {
        return $this->belongsTo(Email::class);
    }

}

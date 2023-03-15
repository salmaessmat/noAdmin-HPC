<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{

    protected $table = 'proposal';
    protected $primaryKey = ['id','project_edit'];
    public $incrementing = false;
    use HasFactory;
    use \Awobaz\Compoships\Compoships;

    public function project()
    {
        return $this->belongsTo(Project::class, ['id', 'edit'], ['project_id', 'project_edit']);
    }

}

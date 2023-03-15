<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use \Awobaz\Compoships\Compoships;
    protected $table = 'project';
    protected $primaryKey = ['id','edit'];
    public $incrementing = false;
    use HasFactory;


    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function proposal()
    {
        return $this->hasMany(Proposal::class, ['project_id', 'project_edit'], ['id', 'edit']);

    }

    public function publication()
    {
        return $this->hasMany(Publication::class, ['project_id', 'project_edit'], ['id', 'edit']);

    }
    public function collaborator()
    {
        return $this->hasMany(Collaborator::class, ['project_id', 'project_edit'], ['id', 'edit']);

    }


}

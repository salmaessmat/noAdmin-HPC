<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publication';
    protected $primaryKey = ('id');
    public $timestamps = false;
    protected $guarded = [];   //allows mass assignment
    use HasFactory;
    use \Awobaz\Compoships\Compoships;


    public function project()
    {
        return $this->belongsTo(Project::class, ['project_id', 'project_edit'],['id', 'edit']);
    }

    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }

    public function publication_author()
    {
        return $this->hasMany(Publication_author::class);
    }

//sets created_at with current timestamp
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}

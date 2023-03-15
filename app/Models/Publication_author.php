<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication_author extends Model
{
    use HasFactory;
    use \Awobaz\Compoships\Compoships;
    protected $table = 'publication_author';
    protected $primaryKey = ['publication_id','human_id','human_edit'];
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];

    public function human()
    {
        return $this->belongsTo(Human::class, ['human_id', 'human_edit'], ['id', 'edit']);
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }


}

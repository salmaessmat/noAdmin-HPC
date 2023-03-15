<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_proposal extends Model
{
    use HasFactory;
    use \Awobaz\Compoships\Compoships;
    protected $table = 'event_proposal';
    protected $primaryKey = ['event_id', 'proposal_id', 'project_edit'];
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];     //allows mass assignment

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, ['proposal_id', 'project_edit'], ['id', 'project_edit']);
    }
}

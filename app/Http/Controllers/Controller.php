<?php

namespace App\Http\Controllers;

use App\Models\Human;
use App\Models\Project;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function findProject($id)
    {
        $edit = Project::where('id',$id)->max('edit');
        $project = Project::where('id', $id)->where('edit', $edit)->first();;

        return $project;

    }
    public function findHuman($id)
    {
        $edit = Human::where('id',$id)->max('edit');
        $human = Human::where('id', $id)->where('edit', $edit)->first();;

        return $human;

    }
    public function getLatestProjects()
    {
        //this query returns the projects which have the latest (max) project edit
        $projectsArr = DB::select(DB::raw( 'SELECT a.* FROM project a LEFT OUTER JOIN project b ON a.id = b.id AND a.edit < b.edit WHERE b.id IS NULL;' ));
        return Project::hydrate($projectsArr);    //turns result array into project model instances (collection)
    }


}

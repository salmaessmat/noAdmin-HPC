<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Project;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    public function index()
    {
        $domains = Domain::whereHas('projects')->get();
        if (request('search')) {
            $searchedTitle = request('search');
            //this query returns the projects which have the latest project edit and have the searched title
            $projectsArr = DB::select(DB::raw("SELECT a.* FROM project a LEFT OUTER JOIN project b ON a.id = b.id AND a.edit < b.edit WHERE b.id IS NULL and a.title like '%$searchedTitle%'"));
            $projects = Project::hydrate($projectsArr);
        }

        else {
            $projects = $this->getLatestProjects();
        }
        return view('projects', ['projects' => $projects, 'domains' => $domains]);
    }

    public function show($id)
    {
        $project = $this->findProject($id);
        $proposal = $project->proposal->first();

        return view('project', ['project' => $project],
            ['proposal' => $proposal]);
    }


}

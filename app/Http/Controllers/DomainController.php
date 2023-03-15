<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Project;
use Illuminate\Support\Facades\DB;


class DomainController extends Controller
{
    public function index($id)
    {
        $currentDomain = Domain::where('id', $id)->first();   //returns picked domain for feedback purposes in the view
        $domains = Domain::whereHas('projects')->get();  //returns only domains that have projects
        if (request('search')) {
            $searchedTitle = request('search');
            //this query returns the projects which have the latest project edit and have the searched title
            $projectsArr = DB::select(DB::raw("SELECT a.* FROM project a LEFT OUTER JOIN project b ON a.id = b.id AND a.edit < b.edit WHERE b.id IS NULL and a.title like '%$searchedTitle%'"));
            $projects = Project::hydrate($projectsArr)->where('domain_id', $id);
        }
else {
    $projects = $this->getLatestProjects()->where('domain_id', $id);
}

        return view('domain', ['projects' => $projects, 'domains' => $domains, 'currentDomain' => $currentDomain]);
    }
}

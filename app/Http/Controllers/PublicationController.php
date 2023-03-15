<?php

namespace App\Http\Controllers;


use App\Models\Conference;
use App\Models\Domain;
use App\Models\Event;
use App\Models\Event_proposal;
use App\Models\Publication;
use App\Models\Publication_author;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;



class PublicationController extends Controller
{

    public function index()
    {
        $publications = new Collection;     //to save the filtered publications in

        if (request('domain') or request('year')) {

            if (request('domain') === NULL) {
                $domain_ids = Domain::pluck('id');
            } else {
                $domain_ids = request('domain');     //gets the checked domain filter
            }

            if (request('year') === NULL) {
                $years = Publication::groupBy('year')->orderBy('year', 'desc')->pluck('year');
            } else {
                $years = request('year');     //gets the checked year filter

            }

            foreach ($domain_ids as $domain_id) {
                foreach ($years as $year) {
                    $publication = Publication::whereHas('project', function ($query) use ($domain_id, $year) {  //filters using both domain and year
                        $query->where('domain_id', $domain_id)->where('year', $year);
                    })->get();
                    $publications = $publications->merge($publication);     //returns filtered publications
                }
            }

        } else {
            $publications = Publication::all();    //if no filter is applied
        }

        $domains = Domain::whereHas('projects', function ($query) {   //returns only domains that have publications
            $query->whereHas('publication');
        })->get();

        $years = Publication::orderBy('year', 'desc')->get('year')->unique('year');  //returns only years that publications were made in

        return view('publications', ['publications' => $publications, 'domains' => $domains, 'years' => $years]);

    }

    public function show($id)

    {

        $publication = Publication::where('id', $id)->first();
        $project = $publication->project;
        return view('publication', ['publication' => $publication, 'project' => $project]);

    }

    public function create($id)
    {
        $project = $this->findProject($id);
        $conferences = Conference::where('islisted', 1)->get();      //returns only listed conferences
        return view('addPublication', ['project' => $project, 'conferences' => $conferences]);
    }

    public function store($id, Request $request)
    {

        $conference_id = request('conference');
        $human_ids = request('human_id');   //IDs of publications authors picked in the add publication form checkbox
        $project = $this->findProject($id);

        //form validation
        request()->validate([
            'title' => 'max:255',
            'human_id' => 'required'
        ]);
        if (request('other')) {
            $conference = Conference::create(array(
                'name' => request('other'),
                'islisted' => 0
            ));
            $conference_id = $conference->id;

        }

        //adding the publication to the DB
        $publication = new Publication();
        $publication->project_id = $id;
        $publication->project_edit = $project->edit;
        $publication->conference_id = $conference_id;
        $publication->title = request('title');
        $publication->url = request('url');
        $publication->year = request('year');

        //if image is added
        if ($request->hasFile('image')) {
            $file_img = $request->file('image');
            $extension_img = $file_img->getClientOriginalExtension();  //gets image ext.
            $filename_img = time() . '.' . $extension_img;
            $file_img->move('uploads/publication/', $filename_img);
            $publication->image = $filename_img;

        } else {
            $publication->image = '';
        }

        //if pdf is added
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();  //gets file ext. (.pdf)
            $filename = time() . '.' . $extension;
            $file->move('uploads/publication/', $filename);
            $publication->file = $filename;

        } else {
            $publication->file = '';
        }

        $publication->save();
        $publication_id = $publication->id;    //stores publication ID for later use


        //connecting the publication with their publication authors via publication_authors table
        foreach ($human_ids as $human_id) {
            $human = $this->findHuman($human_id);
            Publication_author::create(array(
                'publication_id' => $publication_id,
                'human_id' => $human->id,
                'human_edit' => $human->edit
            ));
        }

        //adding a new event from the action = publication_add (where id = 1/ currently only one action)
        $action_id = 1;
        $event = new Event();
        $event->action_id = $action_id;
        $event->save();
        $eventID = $event->id;

        //connecting the event with the proposal and the project via Event_proposal
        $proposal = $project->proposal->first();
        Event_proposal::create(array(
            'event_id' => $eventID,
            'proposal_id' => $proposal->id,
            'project_edit' => $proposal->project_edit
        ));

        //to IMPLEMENT: after a new event is added, admin should be sent an email notifying them. (EXTRA)

        session()->flash('success', 'Your publication has been added!');
        return view('publication', ['publication' => $publication, 'project' => $project]);


    }

    public function download($file)
    {
        return response()->download(public_path('uploads/publication/' . $file));
    }

    public function view($file)
    {
        return response()->file(public_path('uploads/publication/' . $file));
    }


}

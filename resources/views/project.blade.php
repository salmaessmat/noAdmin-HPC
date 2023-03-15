<x-layout>
    <title>BA-HPC Projects</title>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto gap-x-10">
                <div class="col-span-2  lg:pt-1 mb-10">

                    <h1 class="font-bold text-3xl lg:text-4xl mb-5">
                        {{$project->title}}
                    </h1>
                    <p class="text-gray-400 text-xs">
                        Created
                        <time>{{$project->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="float-left mt-3">
                        <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                        <lord-icon
                            src="https://cdn.lordicon.com/dqxvvqzi.json"
                            trigger="morph"
                            colors="outline:#121331,primary:#ffc738,secondary:#848484"
                            stroke="30"
                            state="morph-group"
                            style="width:32px;height:32px">
                        </lord-icon>
                    </div>
                    <div class="flex text-sm mt-4">
                        @foreach($project->collaborator as $collaborator)
                            <h5 class="font-bold px-3 py-1 border border-yellow-300 rounded-full text-black-300 text-xs  font-semibold ml-0 mx-1"
                                style="display:inline;float:right;">
                                {{$collaborator->email->human_email->human->first_name}}
                                {{$collaborator->email->human_email->human->last_name}} </h5>
                            </h5>
                        @endforeach

                    </div>
                    <div class="float-right">
                        <a 
                           class="px-3 py-1 border border-yellow-400 rounded-full text-yellow-400 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{$project->domain->name}}</a>

                    </div>

                </div>

                <div class="col-span-8">

                    <div class="space-y-4 lg:text-lg leading-loose">
                        <details>
                            <summary class="font-bold text-lg">Summary</summary>
                            <p>{{$project->summary}}</p>
                        </details>
                        <details>
                            <summary class="font-bold text-lg">Scientific Case</summary>
                            <p>{{$project->scientific_case}}</p>
                        </details>
                        <details>
                            <summary class="font-bold text-lg">Duration</summary>
                            <p>{{$proposal->duration}}</p>
                        </details>
                        <details>
                            <summary class="font-bold text-lg">Publications ({{$project->publication->count()}})
                            </summary>
                            <br>
                            @foreach($project->publication as $publication)

                                <h5 class="px-3 py-1 border border-yellow-400 rounded-full text-yellow-400 text-xs uppercase font-semibold mb-5"
                                    style="display:inline;"> {{$publication->conference->name}}</h5><br>
                                <div class="mt-4">
                                    <a href='{{$publication->url}}'>{{$publication->title}} ({{$publication->year}})</a>

                                </div>
                                <div class="mt-3"><b style=" font-size: medium; color: #6b7280; font-weight: normal;">
                                        Published by</b>
                                    @foreach($publication->publication_author as $publicationAuthor)
                                        <h5 class=" px-3 py-1  border border-gray-600 rounded-full text-black-300 text-xs ml-1 "
                                            style="display:inline;"> {{$publicationAuthor->human->first_name}} {{$publicationAuthor->human->last_name}}</h5>

                                    @endforeach
                                </div>

                                <br>
                                <hr style="border-width: 0.1px; margin-top: 11px; margin-bottom: 15px;">
                            @endforeach
                        </details>
                        <br>
                        <div>
                            <a href='/addPublication/{{$project->id}}'>
                                <button type="submit"
                                        class="transition-colors duration-300 bg-black hover:bg-yellow-400 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                                    Add a Publication
                                </button>
                            </a>
                        </div>
                    </div>
            </article>
        </main>
    </section>
</x-layout>

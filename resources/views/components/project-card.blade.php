@props(['project'])
<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a
                       class="px-3 py-1 border border-gray-400 rounded-full text-black-400 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{$project->domain->name}}</a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/projects/{{$project->id}}">
                            {{$project->title}}
                        </a>
                    </h1>
                    <span class="mt-2 block text-gray-400 text-xs">
                        Created <time>{{$project->created_at->diffForHumans()}}</time>
                    </span>
                </div>
            </header>


            <footer class="flex justify-between items-center mt-8">

                <div class="flex items-center text-sm">
                    <div class="float-left mt-0 mr-1">
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
                    <div class="ml-0 ">
                        @foreach($project->collaborator as $collaborator)

                            <h5 class=" px-3 py-1 border border-yellow-300 rounded-full text-black-300 text-xs  font-semibold ml-0 mx-1"
                                style="display:inline;float:right;">
                                {{$collaborator->email->human_email->human->first_name}}
                                {{$collaborator->email->human_email->human->last_name}} </h5>
                        @endforeach
                    </div>
                </div>


                <div class="hidden lg:block">
                    <a href="/projects/{{$project->id}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>

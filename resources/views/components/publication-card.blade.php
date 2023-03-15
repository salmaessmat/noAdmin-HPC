@props(['publication'])
<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div>
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a
                       class="px-3 py-1 border border-gray-400 rounded-full text-black-400 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{$publication->project->domain->name}}</a>
                </div>

                <div class="mt-4">
                    <h1 class="text-2xl">
                        <a href="/publications/{{$publication->id}}">
                            {{$publication->title}} ({{$publication->year}})
                        </a>
                    </h1>
                    <span class="mt-2 block text-gray-400 text-xs">
                        Created <time>{{ \Carbon\Carbon::parse($publication->created_at)->diffForHumans() }}</time>
                    </span>
                </div>
            </header>


            <footer class="flex justify-between items-center mt-8">

<form method="GET">
                <div class="hidden lg:block">
                    <a href="/publications/{{$publication->id}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
</form>
            </footer>
        </div>
    </div>
</article>

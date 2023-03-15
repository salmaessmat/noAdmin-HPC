<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        THE <span class="text-yellow-400">BIBLIOTHECA ALEXANDRINA</span> SUPERCOMPUTING FACILITY
    </h1>
    <h1 class="text-lg text-gray-500 mt-0 text-uppercase">BA-HPC Projects</h1>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">

        <!--  Domain -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl ">
            <div>
                <x-dropdown>
                    <x-slot name="trigger">
                        <button style="display: inline-flex" class="py-2 pl-3 pr-9 text-sm font-semibold w-full">
                            {{isset($currentDomain) ? $currentDomain->name : 'Domains'}} &nbsp;&nbsp;&nbsp;&nbsp;
                            <x-down-arrow/>
                        </button>
                    </x-slot>

                    <a href="/projects"
                       class="block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300 hover:text-black">All</a>
                    @foreach($domains as $domain)

                        <a href="/domain/{{$domain->id}}"
                           class=" block text-left px-3 text-sm leading-6 hover:bg-yellow-300 focus:bg-yellow-300 hover:text-white
                                   {{isset($currentDomain) && ($currentDomain->id == $domain->id) ? 'bg-yellow-300 text-white' : ''}} ">
                            {{$domain->name}} ({{$domain->projects->unique('id')->count()}})</a>

                    @endforeach
                </x-dropdown>
            </div>
        </div>

        <!-- Search title-->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Search title.."
                       class="bg-transparent placeholder-black font-semibold text-sm"
                       value="{{ request('search')}}">
            </form>
        </div>
    </div>
</header>

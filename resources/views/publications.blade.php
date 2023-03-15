<x-layout>
    <title>BA-HPC Publications</title>
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            THE <span class="text-yellow-400">BIBLIOTHECA ALEXANDRINA</span> SUPERCOMPUTING FACILITY
        </h1>
        <h1 class="text-lg text-gray-500 mt-0">BA-HPC Publications</h1>
    </header>
    <div class="lg:grid lg:grid-cols-4 ">
        <form method="GET" action="/publications"
              class="ml-5 lg:mt-20 space-y-6 border border-gray-100 rounded-xl py-3 px-5 lg:flex mr-20 mb-0 bg-gray-50 bg-opacity-75"
              style="grid-column: span 1;">
            @csrf
            <div class="form-check ">
              <h1 class=" font-semibold text-md mb-4 text-black px-3 py-1 bg-white border rounded-xl mx-1 relative flex lg:inline-flex items-center ">
                  Filters
              </h1>
                <details>
                    <summary>
                <label class=" text-lg mb-6 text-gray-500 ">Domain</label> </summary>
                @foreach($domains as $domain)
                <?php $publicationsCount = 0; ?>
                    @foreach($domain->projects as $project)
                        <?php $publicationsCount =  $publicationsCount + $project->publication->count(); ?>
                    @endforeach
                    <div class="mb-2 text-md ">
                        <input class="form-check-input" type="checkbox" value="{{$domain->id}}" id="domain[]" name="domain[]">
                        <label class="form-check-label" for="domain[]">
                            {{$domain->name}} ({{$publicationsCount}})
                        </label>
                    </div>
                @endforeach
                </details>
                <br>
                <details>
                    <summary>
                <label class="text-lg text-gray-500">Publication Year</label></summary>
                @foreach($years as $year)
                <?php  $publicationsCountByYear = \App\Models\Publication::where('year',$year->year)->count();?>
                    <div class=" mb-2 text-md ">
                        <input class="form-check-input" type="checkbox" value="{{$year->year}}" id="year[]" name="year[]">
                        <label class="form-check-label" for="year[]">
                            {{$year->year}} ({{$publicationsCountByYear}})
                        </label>
                        <br>
                    </div>
                @endforeach
                </details>
                <button type="submit"
                        class="text-sm text-semibold mt-10 bg-yellow-400 text-white rounded py-2 px-6 hover:bg-yellow-300 h-10 mr-2 ml-6"  >
                    Apply
                </button>
                <button type="submit" action = "/publications"
                        class="text-sm text-semibold mt-10 bg-gray-900 text-white rounded py-2 px-6 hover:bg-gray-700 h-10 float-right"  >
                    Reset
                </button>
            </div>




        </form>
        <div class=" mx-auto mt-6 lg:mt-20 space-y-6 ml-0 " style="grid-column: span 3">
            @if($publications->count())
                @foreach($publications as $publication)
                    <x-publication-card :publication="$publication"/>
                @endforeach
            @else
                <p class="text-center">No Available Publications.</p>
            @endif
        </div>
    </div>
</x-layout>

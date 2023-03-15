<x-layout>
    <title>BA-HPC Projects</title>
    @include('_projects-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($projects->count())
        @foreach($projects as $project)
        <x-project-card  :project="$project"/>
        @endforeach
        @else
        <p class = "text-center">No Available Projects.</p>
        @endif
    </main>
</x-layout>

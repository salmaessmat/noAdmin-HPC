<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<x-layout>

    <title>BA-HPC Publications</title>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto gap-x-10">
                <div class="col-span-2  lg:pt-1 mb-10">

                    <a href="{{$publication->url}}"><h1 class="font-bold text-3xl lg:text-4xl mb-4">
                            {{$publication->title}}&nbsp;({{$publication->year}})
                        </h1></a>
                    <p class="text-gray-400 text-xs">
                        Published
                        <time>{{ \Carbon\Carbon::parse($publication->created_at)->diffForHumans() }}</time>
                    </p>
                    <div class="float-left mt-4">
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

                        @foreach($publication->publication_author as $publicationAuthor)
                            <h5 class="font-bold px-3 py-1 border border-yellow-300 rounded-full text-black-300 text-xs  font-semibold ml-0 mx-1"
                                style="display:inline;float:right;">
                                {{$publicationAuthor->human->first_name}}
                                {{$publicationAuthor->human->last_name}} </h5>
                            </h5>
                        @endforeach

                    </div>
                    <div class="mb-3">
                        <a
                            class="border-warning px-3 py-1 border rounded-full text-xs uppercase font-semibold float-right"
                            style="font-size: 10px">{{$project->domain->name}}</a>
                    </div>
                </div>

                <div
                    class=" mt-10 bg-gray-50 bg-opacity-50 transition-colors duration-300 hover:bg-gray-50 border border border-gray-700 border-opacity-50 hover:border-opacity-5 rounded-tr-xl  px-6 pt-1 pb-6 mt-3">

                    <div class="space-y-4 lg:text-lg leading-loose w-full mt-4">
                        <h1 class="font-semibold text-s text-black w-full mt-2">
                            Project
                        </h1>
                        <p class="text-gray-500">{{$project->title}}</p>
                    </div>

                    <div class="space-y-4 lg:text-lg leading-loose w-full">
                        <h1 class="font-semibold text-s text-black w-full mt-5">
                            Conference
                        </h1>
                        <p class="text-gray-500">{{$publication->conference->name}}</p>
                    </div>
                    @if($publication->image)
                        <button type="button"
                                class="btn btn-warning text-white mt-4"
                                data-toggle="modal"
                                data-target="#exampleModal">
                            Show image
                        </button>
                        <div class="modal fade"
                             id="exampleModal"
                             tabindex="-1"
                             role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!-- Add image inside the body of modal -->
                                    <div class="modal-body">
                                        <img id="image" src="{{asset('uploads/publication/'.$publication->image)}}"
                                             alt="Click on button">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button"
                                                class="btn btn-secondary"
                                                data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($publication->file)
                        <div class="float-right mt-5">
                            <a class="text-secondary" href="/download/{{$publication->file}}"> &nbsp;Download PDF</a>
                        </div>
                        <div class="float-right mt-5">
                            <a class="text-secondary" href="/view/{{$publication->file}}">View </a>/
                        </div>

                    @endif
                </div>
            </article>
        </main>
    </section>

{{--    pop-up publication added alert--}}
    @if(session()->has('success'))
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <div x-data="{ show: true }"
             x-init="setTimeout(() => show = false, 3000)"
             x-show="show"
             class="fixed bg-gray-800 text-white py-2 px-4 rounded-xl bottom-100 right-3 text-sm">
            <p>{{session('success')}}</p>
        </div>
    @endif
</x-layout>


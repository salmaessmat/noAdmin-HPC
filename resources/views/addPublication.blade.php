<title>BA-HPC New Publication</title>
<script>
    function yesnoCheck(that) {
        if (that.value == "other") {
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }
</script>
<style>
    .menu {
        cursor: pointer;
        background: white;
        font-size: medium;
        border: 1px grey solid;
        border-radius: 0.5em;
        text-align: left;
        opacity: 0;
        display: block;
    }

    input[type="file"]::file-selector-button {
        border: 2px solid #111827;
        padding: 0.2em 0.4em;
        border-radius: 0.2em;
        background-color: #1f2937;
        transition: 1s;
        color: white;
    }

    input[type="file"]::file-selector-button:hover {
        border: 2px solid #eab308;
        background-color: #facc15;

    }

    /* The container */
    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 16px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        transition: 0.3s;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked ~ .checkmark {
        background-color: gold;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>
<x-layout>
    <header class="max-w-4xl mx-auto gap-x-10 mt-20 py-10 ">
        <div class="lg:pt-1 flex space-x-2">
            <h1 class="font-bold text-3xl lg:text-4xl ">
                {{$project->title}}
            </h1>
            <div class="">
                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/alzqexpi.json"
                    trigger="hover"
                    colors="primary:#121331,secondary:#646e78,tertiary:#ffc738,quaternary:#f9c9c0,quinary:#ebe6ef"
                    state="hover-1"
                    style="width:50px;height:50px">
                </lord-icon>
            </div>
        </div>
    </header>

    <section class="px-6 ">
        <main class="max-w-6xl mx-auto mt-5 lg:mt-2 space-y-6 ">
            <form method="POST" action="/publications/{{$project->id}}" class="max-w-4xl mx-auto gap-x-10"
                  enctype="multipart/form-data">
                @csrf
                {{--------------------------Insert title------------------------------------}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-s text-black " for="title">
                        Publication Title
                    </label>

                    <input class="border border-gray-400 p-2 w-full" placeholder="Publication Title *"
                           type="text"
                           required
                           name="title"
                           id="title"
                           value= {{old('title')}}
                    >

                    @error('title')
                    <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                {{--------------------------Insert url------------------------------------}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-s text-black " for="url">
                        Publication URL
                    </label>
                    <input class="border border-gray-400 p-2 w-full" placeholder="Publication URL"
                           type="url"
                           name="url"
                           id="url"
                           value= {{old('url')}}
                    >
                </div>

                {{--------------------------Insert year------------------------------------}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-s text-black " for="year">
                        Publication Year
                    </label>
                    <input class="date-own form-control border border-gray-400 p-2 w-40" placeholder="{{now()->year}}"
                           type="number"
                           name="year"
                           id="year"
                           min="2000"
                           max="{{now()->year}}"
                           value={{old('year')}}
                           required
                    >
                </div>

                {{--------------------------Insert PDF------------------------------------}}
                <div class="lg:grid lg:grid-cols-2 ">
                    <div>
                        <label for="file" class="form-label block mb-2 uppercase font-bold text-s text-black ">Publication
                            PDF</label>
                        {{--        <input class="form-control" type="file" id="formFile">--}}
                        <input type="file" name="file"
                               class="form-control" accept=".pdf"
                        />
                    </div>

                    {{----------------------------Insert Image--------------------}}
                    <div>
                        <label for="userImage" class="form-label block mb-2 uppercase font-bold text-s text-black ">Image</label>
                        <input type="file" name="image"/>
                    </div>
                </div>
                {{--------------------------------Conference----------------}}

                <div class="mb-6 mt-7">
                    <select name="conference" onchange="yesnoCheck(this);"
                            style=" background: white;display: flex;justify-content: space-between;align-items: center;border: 1px grey solid;border-radius: 0.5em;width: 70%; padding: 1em;cursor: pointer; transition: background 0.3s;">
                        <div class="menu">
                            <option class="menu" disabled selected>Conference</option>
                            @foreach($conferences as $conference)
                                <option value="{{$conference->id}}" class="menu">{{$conference->name}}</option>
                            @endforeach
                            <option class="menu" value="other">Other</option>
                        </div>
                    </select>

                    <div id="ifYes" style="display: none;">
                        <input class="border border-gray-400 mt-3 py-2 px-2 " placeholder=" New Conference"
                               type="text"
                               name="other"
                               id="other"
                        >
                    </div>
                </div>


                {{--                --------PUBLICATION AUTHORS Checkbox---------------}}

                <div class="mb-6 border border-gray-400 mt-3 py-2">
                    <label class="block mb-3 mx-2 uppercase font-bold text-s text-black " for="year">
                        Publication Authors
                    </label>
                    @foreach($project->collaborator as $collaborator)
                        <div class="mx-2">
                            <label class="container">
                                {{$collaborator->email->human_email->human->first_name}}
                                {{$collaborator->email->human_email->human->last_name}}
                                <input type="checkbox" value="{{$collaborator->email->human_email->human->id}}"
                                       id=human_id[]" name="human_id[]">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endforeach
                    @error('human_id')
                    <p class="text-red-600 text-xs mt-1 ml-5">* {{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <button type="submit"
                            class=" bg-black text-white rounded py-2 px-6 hover:bg-yellow-400 float-right mb-5 ">
                        Submit
                    </button>
                </div>
                <br>
                <br>
                </div>
            </form>
        </main>
    </section>
</x-layout>

<!doctype html>

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/BALogo.png" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0">
            <a href="/" class="text-xs font-bold uppercase">Home</a>&nbsp &nbsp
            <a href="/projects" class="text-xs font-bold uppercase">Projects</a>&nbsp &nbsp
            <a href="/publications"
               class="bg-yellow-400 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Publications
            </a>
        </div>
    </nav>

    {{$slot}}

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">

        <h5 class="text-3xl">Stay in touch with the latest projects!</h5>

        <div class="mt-10">
            <a href="http://bibalex.org/en/default" class="text-yellow-400" style=" margin-top: 100px;">
                &copy; Bibliotheca Alexandrina</a>
        </div>

    </footer>

</section>



</body>


@extends('layouts.page')
@section('content')
    <!-- Home Page Content -->
    <div id="homePageContent" class="flex flex-col w-full h-fit">
        <!-- Carousel -->
        <section id="carousel" class="flex w-full h-64 sm:h-128 overflow-hidden">
            <!-- Display the first carousel image -->
            @if($carouselImage)
                <img src="{{ url($carouselImage->image_url) }}" alt="carouselImage" class="w-full object-cover">
            @endif
        </section>

        <!-- Identity -->
        <section id="identity" class="flex flex-col w-full h-auto bg-red-600 px-4 sm:px-24 py-12">
            <div id="identityBox" class="flex flex-col h-32 sm:flex-row bg-white w-full -mt-10 sm:-mt-24 p-4 sm:p-8 shadow-lg">
                @foreach($identityCards as $identity)
                    <div class="flex flex-col items-center p-4">
                        <img src="{{ url($identity->icon_url) }}" alt="icon" class="w-12 h-12 mb-2">
                        <h3 class="font-semibold">{{ $identity->title }}</h3>
                        <p>{{ $identity->description }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Article Section -->
        <section id="article" class="flex flex-col w-full h-auto bg-white px-4 sm:px-24 py-10">
            <div id="articleSectionTitle" class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <h1 class="font-bold text-xl sm:text-4xl">Berita Terbaru</h1>
                <a class="bg-slate-700 text-white px-4 py-2 rounded-lg font-bold text-sm sm:text-base hover:bg-slate-600">
                    Selengkapnya
                </a>
            </div>
            <div id="articleSectionCard" class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
                @foreach($articles as $article)
                    <div class="bg-gray-100 h-32 rounded-lg shadow-md p-4">
                        <h2 class="font-semibold">{{ $article->title }}</h2>
                        <p class="text-sm">{{ Str::limit($article->content, 100) }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    <script type="text/javascript" src="{{url('/script/homePage/script.js')}}"></script>
@endsection
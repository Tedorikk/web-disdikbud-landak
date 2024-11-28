<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>
    <x-header/>

    <!-- Home Page Content -->
    <div id="homePageContent" class="flex flex-col w-full h-fit">
        <!-- Carousel -->
        <section id="carousel" class="flex w-full h-64 sm:h-128 overflow-hidden">
            <img src="{{url('/images/homePage/carouselImages/slide1.jpg')}}" alt="carouselImage" class="w-full object-cover">
        </section>

        <!-- Identity -->
        <section id="identity" class="flex flex-col w-full h-auto bg-red-600 px-4 sm:px-24 py-12">
            <div id="identityBox" class="flex flex-col h-32 sm:flex-row bg-white w-full -mt-10 sm:-mt-24 p-4 sm:p-8 shadow-lg">
                <p>Tambahkan konten di sini</p>
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
                <div class="bg-gray-100 h-32 rounded-lg shadow-md">Card 1</div>
                <div class="bg-gray-100 h-32 rounded-lg shadow-md">Card 2</div>
                <div class="bg-gray-100 h-32 rounded-lg shadow-md">Card 3</div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <x-footer />
    <script type="text/javascript" src="{{url('/script/homePage/script.js')}}"></script>
</body>
</html>

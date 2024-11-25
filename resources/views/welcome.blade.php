<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet"> <!--Memanggil font manrope dari google fonts-->
    @vite('resources/css/app.css')
</head>
<body class="font-manrope"> <!--Membuat semua text dalam dokumen HTML menggunakan font manrope-->
    <!--Mendefinisikan bagian fixed (tidak mengikuti scroll) untuk bagian paling atas halaman-->
    <div id="fixedPart" class="top-0 sticky w-full z-20">
        <!--Section untuk bagian informasi di paling atas halaman-->
        <section id="headerInformations" class="flex w-full h-16 bg-slate-800 items-center justify-between px-24 text-white">
            <!--Bagian informasi contact person-->
            <div id="contactPerson" class="flex flex-row gap-5">
                <!--Menampilkan ikon telepon-->
                <x-feathericon-phone />
                <!--Menampilkan teks Contact-Person-->
                <span>
                    Contact Person: 
                    <!--Menampilkan teks nomor whatsapp yang dapat di tekan untuk mengarahkan ke aplikasi WhatsApp-->
                    <a href="https://wa.me/89694488847" class="underline underline-offset-2">+62 896 9448 8847</a>
                </span>
            </div>
            <!--Menampilkan teks Informasi Tambahan-->
            <div id="additionalInformation">
                <!--Menampilkan teks Jam Buka Kantor-->
                <span>
                    Buka Jam: 09.00 - 15.00
                </span>
            </div>
        </section>
        <!--Section untuk menampilkan navigation bar-->
        <section id="navigationBar" class="flex items-center justify-between px-24 border-b-2 border-slate-200 w-full h-32 bg-white/75 backdrop-blur-sm">
            <!--Menampilkan Logo dan nama Dinas Pendidikan dan Kebudayaan Kabupaten Landak-->
            <a href="{{url('/')}}" id="NavigationBarLogo" class="flex flex-row gap-10 items-center"> <!--menggunakan tag <a>, saat logo atau nama dinas penddiikan dan kebudayaan dipencet, maka akan mengarahkan pada home page-->
                <!--Menampilkan gambar logo dinas pendidikan dan kebudayaan kabupaten landak-->
                <div id="logoNav" class="flex h-24">
                    <img src="{{url('/images/navigationBar/logo-640.png')}}" alt="LambangKabupatenLandak">
                </div>
                <div id="logoTypoGraphNav" class="font-bold text-xl">
                    <!--Menampilkan teks nama dinas pendidikan dan kebudayaan kabupaten landak-->
                    <span>
                        Dinas Pendidikan dan Kebudayaan <br>
                        Kabupaten Landak
                    </span>
                </div>
            </a>
            <!--Bagian tombol navbar untuk berpindah halaman-->
            <div id="navigationBarButton" class="flex flex-row items-center gap-10">
                <a href="#">Beranda</a>
                <a href="#">Layanan</a>
                <a href="#">Profil</a>
                <a href="#">Publikasi</a>
                <!--Bagian search bar ###BELUM DIBERI ALGORITMA PENCARIAN###-->
                <input type="text" name="cari" placeholder="Cari di Website..." value="" class="border-slate-400 rounded-xl py-4 w-64 focus:border-4 focus:border-slate-200">
            </div>
        </section>
    </div>
    <div id="homePageContent" class="flex flex-col w-full h-fit">
        <section id="carousel" class="flex w-full h-128 overflow-hidden">
            <img src="{{url('/images/homePage/carouselImages/slide1.jpg')}}" alt="carouselImage" class="w-full object-cover">
        </section>
        <section id="identity" class="flex w-full h-80 flex-row bg-red-600 px-24">
            <div id="identityBox" class="flex flex-row bg-white h-80 w-full -mt-24 z-10">
                
            </div>
        </section>
        <section id="article" class="flex flex-col w-full h-fit bg-white pt-10 px-24">
            <div id="articleSectionTitle" class="flex flex-row justify-between items-center">
                <h1 class="font-bold text-4xl">Berita Terbaru</h1>
                <a class="bg-slate-700 text-white border-8 border-slate-700 rounded-lg py-2 px-8 font-bold">
                Selengkapnya 
                </a>
            </div>
            <div id="articleSectionCard" class="h-128">
                d
            </div>
        </section>
    </div>
    <footer class="w-full bg-teal-700 text-white py-10 mt-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col sm:flex-row justify-between items-center text-center sm:text-left">
                <div class="mb-6 sm:mb-0">
                    <h2 class="text-2xl font-semibold mb-2">Dinas Pendidikan dan Kebudayaan Kabupaten Landak</h2>
                    <p class="text-sm">Jl. ngabang</p>
                    <p class="text-sm"></p>
                </div>
                <div class="mb-6 sm:mb-0">
                    <h3 class="text-xl font-semibold mb-2">Contact</h3>
                    <p class="text-sm"><a href="mailto:tedrik@example.com" class="hover:underline">tedrikex@gmail.com</a></p>
                    <p class="text-sm">Phone: +62 896-9448-8847</p>
                </div>
                <div class="mb-6 sm:mb-0">
                    <h3 class="text-xl font-semibold mb-2">Social</h3>
                    <p class="text-sm"><a href="https://www.linkedin.com/in/tedrik-stepanus" class="hover:underline">LinkedIn</a></p>
                    <p class="text-sm"><a href="https://github.com/tedrik" class="hover:underline">GitHub</a></p>
                </div>
            </div>
        <div class="border-t border-white mt-6 pt-6 text-sm text-center">
            <p>&copy; 2024 Tedrik Stepanus. All Rights Reserved.</p>
        </div>
        </div>
    </footer>
    <script type="text/javascript" src="{{url('/script/homePage/script.js')}}">
    </script>
</body>
</html>
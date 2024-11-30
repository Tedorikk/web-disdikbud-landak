<head>
    <title>Buat Artikel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
</head>

<x-app-layout class="bg-white text-black">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Artikel') }}
        </h2>
    </x-slot>
    <div class="flex flex-col gap-10 my-10 mx-4 lg:mx-80 bg-white border-2 p-5 lg:p-10 border-slate-200 rounded-md font-manrope text-black">
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title Input -->
            <div class="form-group">
                <label for="title" class="block text-sm font-medium">Judul</label>
                <input type="text" id="title" name="title" class="form-control border-slate-400 mt-2 mb-6 rounded-md w-full" required>
            </div>

            <!-- Image Upload -->
            <div class="form-group mb-6">
                <label for="image" class="block text-sm font-medium">Unggah Gambar</label>
                <input type="file" id="image" name="image" class="form-control-file mt-2" accept="image/*">
            </div>

            <!-- Trix Editor for Content -->
            <div class="form-group mb-6">
                <label for="content" class="block text-sm font-medium mb-2">Konten</label>
                <input id="content" type="hidden" name="content">
                <trix-editor input="content" class="border-slate-400"></trix-editor>
            </div>

            <!-- Author Selection -->
            <div class="form-group mb-6">
                <label for="author" class="block text-sm font-medium">Penulis</label>
                <select id="author" name="author" class="form-control border-slate-400 mt-2 rounded-md w-full" required>
                    <option value="">Pilih Penulis</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Category Selection -->
            <div class="form-group mb-6">
                <label for="category" class="block text-sm font-medium">Kategori</label>
                <select id="category" name="category" class="form-control border-slate-400 mt-2 rounded-md w-full" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tags Input -->
            <div class="form-group mb-6">
                <label for="tags" class="block text-sm font-medium">Tagar</label>
                <input type="text" id="tags" name="tags" class="form-control border-slate-400 mt-2 rounded-md w-full" placeholder="Enter tags separated by commas">
            </div>

            <!-- Post Status -->
            <div x-data="{ postStatus: '', open: false }">
                <!-- Post Status Dropdown -->
                <div class="form-group mb-6">
                    <label for="post_status" class="block text-sm font-medium">Status Post</label>
                    <select 
                        id="post_status" 
                        name="post_status" 
                        x-model="postStatus" 
                        @change="open = (postStatus === 'SCHEDULED')" 
                        class="form-control border-slate-400 mt-2 rounded-md w-full" 
                        required>
                        <option value="">Pilih Status Post</option>
                        <option value="PUBLISHED">Publikasi</option>
                        <option value="PENDING">Pending</option>
                        <option value="SCHEDULED">Jadwalkan</option>
                    </select>
                </div>

                <!-- Conditional Tanggal Publish Input -->
                <div class="form-group mb-6" x-show="open" x-transition>
                    <label for="date" class="block text-sm font-medium">Tanggal Publish</label>
                    <input 
                        type="text" 
                        id="date" 
                        name="date" 
                        class="form-control border-slate-400 mt-2 rounded-md w-full">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary bg-blue-600 text-white px-4 py-2 rounded-md w-full lg:w-auto">
                Buat Artikel
            </button>
        </form>
    </div>

    <script>
        flatpickr("#date", {
            dateFormat: "Y-m-d", // Format: YYYY-MM-DD
            minDate: "today", // Disable dates before today
            enableTime: true, // Enable time picker
            time_24hr: true // Use 24-hour time format
        });
    </script>
</x-app-layout>

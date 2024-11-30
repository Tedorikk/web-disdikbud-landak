<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article {{ $article->title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>
    <body class="font-manrope bg-white text-black">
    <x-header />
    <!--page-->
    <div class="flex flex-row mx-80 my-8">
        <div class="flex flex-col w-3/5">
            <h1 class="text-4xl font-bold text-center">{{ $article->title }}</h1>
            <p class="pt-4 text-base text-gray-500 text-center">{{ $article->author->name }} - {{ $article->post_date }}</p>
            <img src="{{ asset($article->image_path) }}" alt="{{ $article->title }}" class="mt-4">

            <div class="article-content">
                {!! $article->content !!}
            </div>
            <div class="mt-4">
                <h2 class="text-xl font-semibold">Tags:</h2>
                <ul class="list-disc list-inside">
                    @foreach($article->tags as $tag)
                        <li>{{ $tag->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <x-footer />
</body>
</html>
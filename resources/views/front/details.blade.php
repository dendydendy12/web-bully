<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('output.css') }}" rel="stylesheet" />
    <link href="{{ asset('main.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
</head>

<body class="font-[Poppins]">
    <nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center mt-[30px]">
        <div class="logo-container flex gap-[30px] items-center">
            <a href="{{ route('front.index') }}" class="flex shrink-0">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="logo" />
            </a>
            <div class="h-12 border border-[#E8EBF4]"></div>
            {{-- <form action="searchPage.html"
                class="w-[450px] flex items-center rounded-full border border-[#E8EBF4] p-[12px_20px] gap-[10px] focus-within:ring-2 focus-within:ring-[#FF6B18] transition-all duration-300">
                <button type="submit" class="w-5 h-5 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/search-normal.svg') }}" alt="icon" />
                </button>
                <input type="text" name="" id=""
                    class="appearance-none outline-none w-full font-semibold placeholder:font-normal placeholder:text-[#A3A6AE]"
                    placeholder="Search hot trendy news today..." />
            </form> --}}
        </div>
        <div class="flex items-center gap-3">
            <a href=""
                class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0B2F9F]">Upgrade
                Pro</a>
            <a href="{{ route('front.about') }}"
                class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0B2F9F]">About
                Us</a>
            <a href="{{route('front.report')}}"
                class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0B2F9F]">Lapor
                Bullying</a>
            <a href=""
                class="rounded-full p-[12px_22px] flex gap-[10px] font-bold transition-all duration-300 bg-[#FF6B18] text-white hover:shadow-[0_10px_20px_0_#0B2F9F]">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/whatsapp.svg') }}" alt="icon" />
                </div>
                <span>Konsultasi</span>
            </a>
        </div>
    </nav>
    <nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">
        @foreach ($categories as $category)
            <a href="{{ route('front.category', $category->slug) }}"
                class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ Storage::url($category->icon) }}" />
                </div>
                <span>{{ $category->name }}</span>
        @endforeach
    </nav>
    <header class="flex flex-col items-center gap-[50px] mt-[70px]">
        <div id="Headline" class="max-w-[1130px] mx-auto flex flex-col gap-4 items-center">
            <div>
                <p class="text-[#A3A6AE]" style="text-align: center;"> </p>

                <h1 id="Title" class="font-bold text-[46px] leading-[60px] text-center two-lines">
                    {{ $article->name }}
                </h1>
            </div>

            <div class="flex items-center justify-center gap-[70px]">
                <a id="Author" href="#" class="w-fit h-fit">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full overflow-hidden">
                            <img src="{{ Storage::url($article->author->avatar) }}" class="object-cover w-full h-full"
                                alt="avatar">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-sm leading-[21px]">{{ $article->author->name }}</p>
                            <p class="text-xs leading-[18px] text-[#A3A6AE]">{{ $article->author->occupation }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="w-full h-[500px] flex shrink-0 overflow-hidden">
            <img src="{{ Storage::url($article->thumbnail) }}" class="object-cover w-full h-full"
                alt="cover thumbnail">
        </div>
    </header>
    <section id="Article-container" class="max-w-[1130px] mx-auto flex gap-20 mt-[50px]">
        <article id="Content-wrapper">
            {!! $article->content !!}
        </article>

        {{-- <figure>
            <img src="{{ Storage::url($article->thumbnail) }}" alt="image">
            <figcaption></figcaption>
        </figure> --}}
        <div class="side-bar flex flex-col w-[300px] shrink-0 gap-10">
            <div class="ads flex flex-col gap-3 w-full">
                <a href="">

                    {{-- <img src="{{ Storage::url($bannerads->thumbnail->banner) }}" class="object-contain w-full h-full"
                        alt="ads" /> --}}
                </a>
                {{-- <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
                    Our Advertisement <a href="" class="w-[18px] h-[18px]"><img
                            src="{{ Storage::url($bannerads->thumbnail->square) }}" alt="icon" /></a> --}}
                </p>
            </div>
            <div id="More-from-author" class="flex flex-col gap-4">
                <p class="font-bold">More From Author</p>
                <a href="">
                    <div
                        class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[14px] flex gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden rounded-2xl">
                            <img src="{{ Storage::url($article->thumbnail) }}">
                        </div>
                        <div class="flex flex-col gap-[6px]">
                            <p class="line-clamp-2 font-bold">{{ $article->name }}</p>
                            <p class=" text-xs leading-[18px] text-[#A3A6AE]">
                                {{ $article->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="ads flex flex-col gap-3 w-full">
                {{-- <a href="">
                    <img src="assets/images/iklans/banner1.png" class="object-contain w-full h-full"
                        alt="ads" />
                </a>
                <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
                    Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
                            src="assets/images/icons/message-question.svg" alt="icon" /></a> --}}
                </p>
            </div>
        </div>
    </section>
    {{-- <section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
        <div class="flex flex-col gap-3 shrink-0 w-fit">
            <a href="#">
                <div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
                    <img src="assets/images/iklans/bannerWide.png" class="object-cover w-full h-full"
                        alt="ads" />
                </div>
            </a>
            <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
                Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
                        src="assets/images/icons/message-question.svg" alt="icon" /></a>
            </p>
        </div>
    </section> --}}
 

    <script src="js/two-lines-text.js"></script>
</body>

</html>

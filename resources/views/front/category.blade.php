<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('/output.css') }}" rel="stylesheet" />
    <link href="{{ asset('/main.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
</head>

<body class="font-[Poppins] pb-[83px]">
    <nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center mt-[30px]">
        <div class="logo-container flex gap-[30px] items-center">
            <a href="{{ route('front.index') }}" class="flex shrink-0">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="logo" />
            </a>
            <div class="h-12 border border-[#E8EBF4]"></div>
            {{-- <form action="searchPage.html" class="w-[450px] flex items-center rounded-full border border-[#E8EBF4] p-[12px_20px] gap-[10px] focus-within:ring-2 focus-within:ring-[#FF6B18] transition-all duration-300">
                <button type="submit" class="w-5 h-5 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/search-normal.svg') }}" alt="icon" />
                </button>
                <input type="text" name="" id="" class="appearance-none outline-none w-full font-semibold placeholder:font-normal placeholder:text-[#A3A6AE]" placeholder="Search hot trendy news today..." />
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
        @foreach ($categories as $categori)
            <a href="{{ route('front.category', $categori->slug) }}"
                class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ Storage::url($categori->icon) }}" />
                </div>
                <span>{{ $categori->name }}</span>
            </a>
        @endforeach
    </nav>
    <article>
        <section id="Category-result" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
            <h1 class="text-4xl leading-[45px] font-bold text-center">
                Jelajahi Persoalan <br />
                {{ $category->name }}
            </h1>
            @if ($category->slug == 'video')
                <div id="search-cards" class="grid grid-cols-3 gap-[30px]">
                    @forelse($videos as $video)
                        <div style="display: flex; flex-wrap:wrap;">
                            <div style="width: 32vw; ">
                                <iframe width="100%" height="315" src="{{ $video->url }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                        {{-- <img src="{{ Storage::url($article->thumbnail) }}" alt="thumbnail photo" class="w-full h-full object-cover" /> --}
                        </div>
                    {{-- </div> --}}
                    @empty
                        <p>belum ada informasi</p>
                    @endforelse
                </div>
            @else
                <div id="search-cards" class="grid grid-cols-3 gap-[30px]">
                    @forelse($category->article as $article)
                        <a href="{{ route('front.details', $article->slug) }}" class="card">
                            <div
                                class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
                                <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
                                    <div
                                        class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
                                        <p class="text-xs leading-[18px] font-bold">{{ $article->category->name }}</p>
                                    </div>
                                    <img src="{{ Storage::url($article->thumbnail) }}" alt="thumbnail photo" class="w-full h-full object-cover" />
                                </div>
                                <div class="flex flex-col gap-[6px]">
                                    <h3 class="text-lg leading-[27px] font-bold">
                                        {{ substr($article->name, 0, 50) }}{{ strlen($article->name) > 50 ? '....' : '' }}
                                    </h3>
                                    <p class="text-sm leading-[21px] text-[#A3A6AE]"></p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p>belum ada informasi</p>
                    @endforelse
                </div>
            @endif
        </section>
    </article>
    <!-- New Video Section -->
    {{-- <section id="Video" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
        <h1 class="text-4xl leading-[45px] font-bold text-center">Featured Videos</h1>
        <div id="video-cards" class="grid grid-cols-3 gap-[30px]">
            @foreach ($videos as $video)
                <a href="{{ $video->url }}" class="card">
                    <div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
                        <div class="video-thumbnail h-[200px] relative rounded-[20px] overflow-hidden">
                            <img src="{{ Storage::url($video->thumbnail) }}" alt="video thumbnail" class="w-full h-full object-cover" />
                            <div class="play-button absolute inset-0 flex items-center justify-center">
                                <img src="{{ asset('assets/images/icons/play-button.svg') }}" alt="Play Button" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-[6px]">
                            <h3 class="text-lg leading-[27px] font-bold">{{ $video->title }}</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $video->published_at->format('d M, Y') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section> --}}
    {{-- <section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
        <div class="flex flex-col gap-3 shrink-0 w-fit">
            {{-- <a href="{{ $bannerads->link }}"> --}}
    {{-- <div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
                    <img src="{{ Storage::url($bannerads->thumbnail) }}" class="object-cover w-full h-full" alt="ads" />
                </div>
            </a>
            <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
                <img src="{{ Storage::url($bannerads->thumbnail) }}" alt="Icon" />
            </p>
        </div> 
    </section> --}}
</body>

</html>

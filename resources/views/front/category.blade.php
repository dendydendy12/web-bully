<x-front.layout>
    <nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">
        @foreach ($categories as $categori)
            <a href="{{ route('front.category', $categori->slug) }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
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
                Jelajahi beragam konten <br/>yang menarik dan relevan. <br />
                {{ $category->name }}
            </h1>
            @if ($category->slug == 'video')
                <div id="search-cards" class="grid grid-cols-3 gap-[30px]">
                    @forelse($videos as $video)
                        <div style="display: flex; flex-wrap:wrap;">
                            <div style="width: 32vw; ">
                                <iframe width="100%" height="315" src="{{ $video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
                            <div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
                                <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
                                    <div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
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
    </x-front>

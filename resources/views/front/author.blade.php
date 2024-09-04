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
    <section id="author" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
        <div id="title" class="flex items-center gap-[30px]" style="flex-wrap: wrap; margin-left: 1rem; margin-right: 1rem;">
            <h1 class="text-4xl leading-[45px] font-bold">Author News</h1>
            <h1 class="text-4xl leading-[45px] font-bold">/</h1>
            <div class="flex gap-3 items-center">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-full overflow-hidden">
                    <img src="{{ Storage::url($author->avatar) }}" alt="profile photo" />
                </div>
                <div class="flex flex-col">
                    <p class="text-lg leading-[27px] font-semibold">{{ $author->name }}</p>
                    <span class="text-[#A3A6AE]">{{ $author->occupation }}</span>
                </div>
            </div>
        </div>
        @if (!is_null($author->article) && count($author->article) > 0)
            <div id="search-cards" class="grid grid-cols-3 gap-[30px]">
                @forelse ($author->article as $article)
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
                    <p>Belum memiliki Artikel</p>
                @endforelse
            </div>
        @else
            <p>Belum memiliki Artikel</p>
        @endif
    </section>
</x-front.layout>

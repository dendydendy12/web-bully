<style>
    .authors-section {
        display: grid;
    }
</style>
<x-front.layout>
    <nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">

        @foreach ($categories as $category)
            <a href="{{ route('front.category', $category->slug) }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ Storage::url($category->icon) }}" />
                </div>
                <span>{{ $category->name }}</span>
            </a>
        @endforeach
    </nav>

    <section id="Featured" class="mt-[30px]">
        <div class="main-carousel w-full">
            @forelse($featured_articles as $article)
                <div class="featured-news-card relative w-full h-[550px] flex shrink-0 overflow-hidden">
                    <img src="{{ Storage::url($article->thumbnail) }}" class="thumbnail absolute w-full h-full object-cover" alt="icon" />
                    <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                    </div>
                    <div class="card-detail mx-auto flex items-end justify-between pb-10 relative z-20" style="margin: 0 1rem;">
                        <div class="flex flex-col gap-[10px]">
                            <p class="text-white">Featured</p>
                            <a href="{{ route('front.details', $article->slug) }}" class="font-bold text-4xl leading-[45px] text-white two-lines hover:underline transition-all duration-300">
                                {{ $article->name }}
                            </a>

                            @if ($article->category)
                                <p class="text-white">{{ $article->category->name }}></p>
                            @else
                                <p class="text-white">Kategori tidak tersedia</p>
                            @endif

                        </div>
                        <div class="prevNextButtons flex items-center gap-4 mb-[60px]">
                            <button class="button--previous appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                                <img src="assets/images/icons/arrow.svg" alt="arrow" />
                            </button>
                            <button class="button--next appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 rotate-180">
                                <img src="assets/images/icons/arrow.svg" alt="arrow" />
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <p>belum ada data terbaru</p>
            @endforelse

        </div>
    </section>
    <section id="Up-to-date" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]" style="margin-left: 1rem; margin-right: 1rem;">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[26px] leading-[39px]">
                Stop <br />
                Bullying
            </h2>
            <p class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">
                UP TO DATE</p>
        </div>
        <div class="grid grid-cols-3 gap-[30px]">
            @forelse ($articles as $article)
                <a href="{{ route('front.details', $article->slug) }}" class="card-news">
                    <div class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
                        <div class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
                            @if ($article->category)
                                <p class="badge-white absolute top-5 left-5 rounded-full p-[8px 18px] bg-white font-bold text-xs leading-[18px]">
                                    {{ $article->category->name }}</p>
                            @else
                                <p class="badge-white absolute top-5 left-5 rounded-full p-[8px 18px] bg-white font-bold text-xs leading-[18px]">
                                    Kategori tidak ditemukan</p>
                            @endif
                            <img src="{{ Storage::url($article->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail" />
                        </div>
                        <div class="card-info flex flex-col gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">{{ $article->name }}</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                {{ $article->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <p>belum ada data baru
                <p>
            @endforelse
    </section>

    <section id="bullying" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]" style="margin-left: 1rem; margin-right: 1rem;">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[26px] leading-[39px]">
                Tentang<br />
                Bullying
            </h2>
            <a href="{{ route('front.details', $article->slug) }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Explore
                All</a>
        </div>
        <div class="flex justify-between items-center h-fit">
            <div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
                @if ($bullying_featured_articles)
                    <img src="{{ Storage::url($bullying_featured_articles->thumbnail) }}" class="thumbnail absolute w-full h-full object-cover" alt="icon" />
                @else
                    <!-- Optional: Display a placeholder image if the article doesn't exist or doesn't have a thumbnail -->
                    <img src="{{ asset('path/to/placeholder.jpg') }}" class="thumbnail absolute w-full h-full object-cover" alt="placeholder icon" />
                @endif
                <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                </div>
                <div class="card-detail w-full flex items-end p-[30px] relative z-20">
                    <div class="flex flex-col gap-[10px]">
                        <p class="text-white">Featured</p>
                        @if ($bullying_featured_articles)
                            <p class="text-white">Featured</p>
                            <a href="{{ route('front.details', $article->slug) }}" class="font-bold text-[30px] leading-[54px] text-white">
                                {{ $bullying_featured_articles->name }}
                            </a>
                        @else
                            <!-- Optional: Tampilkan pesan atau placeholder jika artikel tidak ditemukan -->
                            <p>No featured article available.</p>
                        @endif
                        <p class="text-white"> {{ $article->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
                <div class="w-[455px] flex flex-col gap-5 shrink-0">
                    @forelse($bullying_articles as $articles)
                        <a href="{{ route('front.details', $article->slug) }}" class="card py-[2px]">
                            <div class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                                <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                                    <img src="{{ Storage::url($article->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail" />
                                </div>
                                <div class="flex flex-col justify-center-center gap-[6px]">
                                    <h3 class="font-bold text-lg leading-[27px]">
                                        {{ Str::limit($article->name, 50, '....') }}
                                    </h3>
                                    <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                        {{ $article->created_at->format('M d, Y') }}
                                    </p>

                                </div>
                            </div>
                        </a>
                    @empty
                        <p>Belum ada artikel terbaru</p>
                    @endforelse
                </div>
                <div class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]">
                </div>
            </div>
        </div>
    </section>
    <section id="Best-authors" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]" style="margin-left: 1rem; margin-right: 1rem;">
        <div class="flex flex-col text-center gap-[14px] items-center">
            <p class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">
                AUTHORS</p>
            <h2 class="font-bold text-[26px] leading-[39px]" style="color: blue">
                Lawan<span style="color: orange">Bullying</span> <br />

            </h2>
        </div>
        <div class="grid-cols-6 gap-[30px] authors-section">

            @forelse($authors as $author)
                <a href="{{ route('front.author', $author->slug) }}" class="card-authors">
                    <div class="rounded-[20px] border border-[#EEF0F7] p-[26px_20px] flex flex-col items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[70px] h-[70px] flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{ Storage::url($author->avatar) }}" class="object-cover w-full h-full" alt="avatar" />
                        </div>
                        <div class="flex flex-col gap-1 text-center">
                            <p class="font-semibold">{{ $author->name }}</p>
                            @if ($author && $author->article)
                                {{ $author->article->count() }}<p>article</p>
                            @else
                                <p>Belum ada data</p>
                            @endif

                        </div>
                    </div>
                @empty
                    <p>belum ada data</p>
            @endforelse

    </section>

    <script src="{{ asset('customjs/two-lines-text.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('customjs/carousel.js') }}"></script>
    </x-front>

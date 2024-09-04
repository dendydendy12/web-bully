<style>
    #Content-wrapper {
        width: 70%;
        margin: 0 auto;
        padding: 0 3rem;
    }

    .other-articles {
        width: 28%;
        margin: 0 auto;
        padding: 0 3rem;
    }

    /* responsive */
    @media screen and (max-width: 1100px) {
        #Content-wrapper {
            width: 100%;
            padding: 0 1rem;
        }

        .other-articles {
            margin-top: 2rem;
            width: 100%;
            padding: 0 1rem;
        }
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
                            <img src="{{ Storage::url($article->author->avatar) }}" class="object-cover w-full h-full" alt="avatar">
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
            <img src="{{ Storage::url($article->thumbnail) }}" class="object-cover w-full h-full" alt="cover thumbnail">
        </div>
    </header>
    <section id="Article-container" style="display: flex; flex-wrap: wrap; margin: 0 3rem; margin-top: 2rem;">
        <article id="Content-wrapper">
            {!! $article->content !!}
        </article>

        <div class="other-articles">
            <div id="More-from-author" class="flex flex-col gap-4">
                <p class="font-bold">More From Author</p>
                <a href="">
                    <div class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[14px] flex gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
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
        </div>
    </section>

    <script src="js/two-lines-text.js"></script>
    </x-front>

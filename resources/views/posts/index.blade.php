<x-layout>
    @include('posts._header')
    @section('title', 'Home')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <h2 class="text-center text-4xl" id="post-header">Latest Posts</h2>
            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4 text-center">
                <!--  Category -->
                <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
                    <x-category-dropdown />
                </div>
                
                <!-- Search -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                    <form method="GET" action="/">
                        @if(request('category'))
                            <input type="hidden" name="category" value={{request('category')}}>
                        @endif
                        <input type="text" name="search" placeholder="Find something"
                            class="bg-transparent placeholder-black font-semibold text-sm"
                                value={{request('search')}}>
                    </form>
                </div>
            </div>  
            <x-post-grid :posts="$posts"/>
            {{$posts->links()}}
        @else
            <p class="text-center">No blog posts yet please check back later!</p>
        @endif
    </main>
</x-layout>

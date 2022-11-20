<x-layout>
    @include('posts._header')
    @section('title', 'Home')
    <!-- @section('styles')
        <link href="{{asset('../resources/css/app.css')}}" rel="stylesheet">
    @stop -->
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-post-grid :posts="$posts"/>
            {{$posts->links()}}
        @else
            <p class="text-center">No blog posts yet please check back later!</p>
        @endif
    </main>
</x-layout>

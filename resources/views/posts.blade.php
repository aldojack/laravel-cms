<x-layout>
    @foreach($posts as $post)
        <article class="hover:bg-gray-300 mb-4 px-2 py-4">
            <h1 class="font-bold text-lg">{{$post->title}}</h1>
            <p>By<a href="/authors/{{$post->author->username}}" class="text-blue-600 underline"> {{$post->author->name}}</a></p>
            <a class="border-2 inline-block px-4 py-1 rounded-full text-sm" href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            <p class="my-2">{{$post->excerpt}}</p>
            <a class= "bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5" href="/posts/{{$post->slug}}">Read More </a>
        </article>
    @endforeach
</x-layout>

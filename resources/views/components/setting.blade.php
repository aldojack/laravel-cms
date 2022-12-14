@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{$heading}}
    </h1>
    <div class="flex">
        @admin
        <aside class="min-w-max shrink-0 mr-4">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/admin/posts" class="{{request()->is('admin/posts') ? 'text-blue-500 font-bold underline' : ''}}">All Posts</a>
                </li>
                <li>
                    <a href="/admin/users" class="{{request()->is('admin/users') ? 'text-blue-500 font-bold underline' : ''}}">All Users</a>
                </li>
                <li>
                    <a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-blue-500 font-bold underline' : ''}}">New Post</a>
                </li>
            </ul>
        </aside>
        @endadmin
        <main class="flex-1">
            @admin
            @if(request()->is('admin/posts'))
                <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 focus:bg-blue-600"><a href="/admin/api/posts">View in JSON</a></button>
            @elseif(request()->is('admin/users'))
                <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 focus:bg-blue-600"><a href="/admin/api/users">View in JSON</a></button>
            @endif
            @endadmin
            <x-panel>
                {{$slot}}
            </x-panel>
        </main>
    </div>
</section>

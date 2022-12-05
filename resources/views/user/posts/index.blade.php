<x-layout>
    @section('title', 'Post Dashboard')
    <x-setting heading="Manage Posts">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    @if($posts->count())
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th colspan="2"
                                        class="px-5 py-3 border-b-2 text-center border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="/posts/{{ $post->slug }}">
                                                    {{ $post->title }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <p class="text-xs rounded p-2 {{$post->isLive ? 'text-black bg-white border-2 border-dotted border-red-400 ' : 'text-black bg-gray-200' }}">{{$post->isLive ? 'Live' : 'Pending' }}</p>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/dashboard/posts/{{$post->id}}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/dashboard/posts/{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-xs text-white bg-red-500 rounded p-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                        <p class="mb-4">You have no posts to show, go speak up and come back!</p>
                        <a href="/dashboard/posts/create" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 focus:bg-blue-600">Create Post</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>

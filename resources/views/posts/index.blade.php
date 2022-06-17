
@extends('layouts.base')

@section('content')
    <h1 class="font-bold text-lg">Posts</h1>
    <hr>

<div class="container mx-auto px-4">
   <div class="grid grid-cols-3 my-10">
        @foreach ($posts as $post)
             <div class="col-span-1">
                <div class="bg-white hover:bg-blue-100 border-2 border-gray-200 rounded-lg shadow-lg p-5">
                 <p class="text-gray-700 font-bold text-xl mb-2">{{ $post->title }}</p>
                 <p class="text-gray-700 text-base">{{ $post->body }}</p>
                 <p class="text-gray-700 text-base">
                    {{ $post->content_limit }}
                 </p>
                 <p class="text-gray-700 text-right">
                    {{ $post->created_at }}
                 </p>
                </div>
             </div>
        @endforeach
        <div class="my-10">
            {{ $posts->links() }}
        </div>
   </div>
</div>

@endsection


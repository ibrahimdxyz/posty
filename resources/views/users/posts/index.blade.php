@extends('_layouts.app')

@section('contents')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6 ml-6 mt-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p> - Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}</p>
                <p> - Received {{ $user->receivedLikes()->count() }} {{ Str::plural('like', $posts->count()) }}</p>

            </div>

            <div class="bg-white p-6 m-7 rounded-lg">
                @if($posts->count()) 
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach
                    {{-- displays a tailwind's stylized paginator  --}}
                    {{ $posts->links() }}
                @else
                    <div class="text-xl p-6">
                        <p><span class="font-bold">{{ $user->name}}</span> does not have any posts.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
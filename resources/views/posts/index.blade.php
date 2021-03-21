@extends('_layouts.app')

@section('contents')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 m-7 rounded-lg">
            <form action="{{ route('posts') }}" method="POST" class="mb-4">
                @csrf
                <div>
                    <label for="body"></label>
                    <textarea name="body" id="body" cols="30" rows="5" class="bg-gray-100 border-2 p-4 rounded-lg w-full
                    @error('body') border-red-500 border-3 @enderror" placeholder="Write a post.."></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-small">
                            {{ $message }}
                        </div>    
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 mt-4 rounded font-medium">
                        Post
                    </button>
                </div>
            </form>

            @if($posts->count()) 
                @foreach ($posts as $post)
                <div class="mb-4 ">
                    <div class="flex text-center items-center">
                        <a href="" class="font-bold pr-2">{{ $post->user->name }}</a>
                        {{-- displays full date if time difference between post data and now is greater than a YEAR   --}}
                        @if ($post->created_at->diff(new DateTime())->y >= 1) 
                            <span class="text-gray-600 text-sm">{{ $post->created_at->toDateString() }}</span>
                        @else
                        {{-- else, date gets displayed in a short, humanly readable form (in text)   --}}
                            <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        @endif
                    </div>                
                    <p class="mb-2 pl-2">{{ $post->body }}</p>
                </div>                    
                @endforeach
                
                {{-- displays a tailwind's stylized paginator  --}}
                {{ $posts->links() }}
            @else
                <p>There are no posts.</p>
            @endif
            <div>

            </div>
        </div>
    </div>
@endsection
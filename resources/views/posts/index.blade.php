@extends('_layouts.app')

@section('contents')
    <div class="flex justify-center">
        <div class="w-10/12 flex-col m-7 pb-6">
            <form action="{{ route('posts') }}" method="POST" class="p-6 bg-gray-200 rounded-xl border border-gray-300">
                @csrf
                <div>
                    <label for="body"></label>
                    <textarea name="body" id="body" cols="30" rows="5" class="border-2 p-4 rounded-lg w-full
                    @error('body') border-red-500 border-3 @enderror" placeholder="Write a post.."></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-small">
                            {{ $message }}
                        </div>    
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-12 py-2 mt-4 rounded font-medium hover:bg-opacity-75">
                        Post
                    </button>
                </div>
            </form>


            <div class="flex justify-center">
                <div class="w-8/12 flex-col bg-white py-6">
                @if($posts->count()) 
                    @foreach ($posts as $post)
                        <x-post :post="$post"></x-post>
                    @endforeach
                    
                    {{-- displays a tailwind's stylized paginator  --}}
                    {{ $posts->links() }}
                @else
                <div class="text-xl p-6">
                    <p>There are no posts to show. Post something!</p>
                </div>
                @endif


                </div>
            </div>

        </div>
    </div>
@endsection
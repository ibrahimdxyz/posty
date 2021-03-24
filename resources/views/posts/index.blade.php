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
                        <div class="mb-2 py-2 px-6 w-full hover:bg-gray-50">
                            <div class="flex justify-between">
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
                                
                                @can('delete', $post)                                    
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method("DELETE")

                                        <button class="bg-red-500 text-white rounded-lg px-3 py-1 hover:bg-opacity-75">
                                        Delete                      
                                        </button>
                                    </form>                            
                                @endcan


                            </div>   


                            <p class="pl-2">{{ $post->body }}</p>
                            
                            
                            <div class="flex items-center pl-2 pt-2">
                            
                                @auth                            
                                    @if (!$post->isLikedBy(Auth::user()))

                                        <form action="{{ route('posts.likes', $post->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-blue-700 pr-3">Like 👍</button>
                                        </form>
                                    @else
                                    <form action="{{ route('posts.likes', $post->id) }}" method="POST">
                                        @csrf
                                        {{-- method spoofing --}}
                                        @method("DELETE") 
                                        <button type="submit" class="text-blue-700 pr-3">Unlike 👎</button>
                                    </form>
                                    @endif
                                @endauth
                                <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }} </span>
                            </div>
                        </div>                       
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
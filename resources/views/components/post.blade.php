@props(['post' => $post])

<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius --> 
    {{-- :)) --}}
    <div class="mb-2 py-2 px-6 w-full hover:bg-gray-50">
        <div class="flex justify-between">
            <div class="flex text-center items-center">
                <a href="{{ route('users.posts', $post->user) }}" class="font-bold pr-2">{{ $post->user->name }}</a>
                {{-- displays full date if time difference between post data and now is greater than a YEAR   --}}
                @if ($post->created_at->diff(new DateTime())->y >= 1) 
                    <span class="text-gray-600 text-sm">{{ $post->created_at->toDateString() }}</span>
                @else
                {{-- else, date gets displayed in a short, humanly readable form (in text)   --}}
                <a href="{{ route('post.show', $post) }}">
                    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                </a>
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

</div>
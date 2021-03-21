@extends('_layouts.app')

@section('contents')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 m-7 rounded-lg">
            <form action="{{ route('posts') }}" method="POST">
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
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@extends('_layouts.app')

@section('contents')
<div class="flex justify-center">
    <div class="w-5/12 bg-white p-6 m-7 rounded-lg">
        <div class="text-3xl text-bold flex pb-2 mb-4">
            <h1>Sign in</h1>
        </div>
        <div class="justify-self-center p-2 flex-col justify-center">
            @if(session()->has('status'))
                <div class="bg-red-500 p-4 mb-2 rounded-lg w-full text-white text-small">
                    {{  session('status')  }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST" class="w-full flex-col justify-between">
                @csrf            
                <div class="mb-3">
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" name="email" type="email" class="bg-gray-100 border-2 p-4 rounded-lg w-full
                    @error('email') border-red-500 border-3 @enderror" placeholder="Your email" value="{{ old('email') }}"> 
                   
                    @error('email')
                        <div class="text-red-500 mb-4 mt-2 text-small">
                            {{ $message }}
                        </div>    
                    @enderror                        
                </div>
                <div class="mb-3">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" class="bg-gray-100 border-2 p-4 rounded-lg w-full
                    @error('password') border-red-500 border-3 @enderror" placeholder="Choose a password" value="">   
                    
                    @error('password')
                        <div class="text-red-500 mb-4 mt-2 text-small">
                            {{ $message }}
                        </div>    
                    @enderror                     
                </div>


                <div class="mb-3">
                    <input id="remember" name="remember" type="checkbox" class="ml-4 mr-2 mt-3">            
                    <label for="remember">Remember me</label>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 mt-4 rounded font-medium w-full">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
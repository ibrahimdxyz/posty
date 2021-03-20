@extends('_layouts.app')

@section('contents')
<div class="flex justify-center">
    <div class="w-6/12 bg-white p-6 m-7 rounded-lg">
        <div class="text-3xl text-bold flex pb-2 mb-4">
            <h1>Make a new account</h1>
        </div>
        <div class="justify-self-center p-2 flex justify-center">
            <form action="{{ route('register') }}" method="POST" class="w-full flex-col justify-between">
                @csrf
                <div class="mb-3">
                    <label for="name" class="sr-only"></label>
                    <input id="name" name="name" type="text" class="bg-gray-100 border-2 p-4 rounded-lg w-full
                    @error('name') border-red-500 border-3 @enderror" placeholder="Your name" value="{{ old('name') }}"> 
                    
                    @error('name')
                        <div class="text-red-500 mb-4 mt-2 text-small">
                            {{ $message }}
                        </div>    
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="sr-only"></label>
                    <input id="username" name="username" type="text" class="bg-gray-100 border-2 p-4 rounded-lg w-full
                    @error('username') border-red-500 border-3 @enderror" placeholder="Your username" value="{{ old('username') }}">      
                    
                    @error('username')
                        <div class="text-red-500 mb-4 mt-2 text-small">
                            {{ $message }}
                        </div>    
                    @enderror              
                </div class="mb-3">
            
                <div class="mb-3">
                    <label for="email" class="sr-only"></label>
                    <input id="email" name="email" type="email" class="bg-gray-100 border-2 p-4 rounded-lg w-full
                    @error('email') border-red-500 border-3 @enderror" placeholder="Your email" value="{{ old('email') }}"> 
                   
                    @error('email')
                        <div class="text-red-500 mb-4 mt-2 text-small">
                            {{ $message }}
                        </div>    
                    @enderror                        
                </div>
                <div class="mb-3">
                    <label for="password" class="sr-only"></label>
                    <input id="password" name="password" type="password" class="bg-gray-100 border-2 p-4 rounded-lg w-full
                    @error('password') border-red-500 border-3 @enderror" placeholder="Choose a password" value="">   
                    
                    @error('password')
                        <div class="text-red-500 mb-4 mt-2 text-small">
                            {{ $message }}
                        </div>    
                    @enderror                     
                </div>
                <div class="mb-3">
                    <label for="password-confirmation" class="sr-only"></label>
                    <input id="password-confirmation" name="password_confirmation" type="password" class="bg-gray-100 border-2              
                    p-4 rounded-lg w-full @error('password') border-red-500 border-3 @enderror" placeholder="Password again" value="">
                    
                    @error('password_confirmation')
                    <div class="text-red-500 mb-4 mt-2 text-small">
                        {{ $message }}
                    </div>    
                    @enderror      
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 mt-4 rounded font-medium w-full">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
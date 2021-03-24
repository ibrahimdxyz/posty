@extends('_layouts.app')
{{-- @props(['post' => $post]) --}}


@section('contents')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 m-7 rounded-lg">
            <x-post :post="$post"></x-post>
        </div>
    </div>
@endsection
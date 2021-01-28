@extends('layouts.main')
@section('content')
<div class="container image-fullview">
    <div style="display: flex; flex-direction:column;">
        <div class="image-list">
            @foreach ($images as $image)
                <x-image :image="$image"></x-image>
            @endforeach
            
        </div>
    
        <div class="d-flex justify-content-center mt-3">
            {{$images->links()}}
        </div>
    </div>

</div>
@endsection
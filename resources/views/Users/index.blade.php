@extends('Layouts.main')

@section('content')
    <div class="row mt-5" style="min-height: 150">
        <div class="col portrait_large">
            <img src="{{auth()->user()->get_avatar_url()}}" alt="" class="img-thumbnail">
       </div>
       <div>
            <div class="col">
                <h1 class="display-3">{{auth()->user()->username}}</h1>

                <div class="row">
                    <div class="col-md-auto dash-left"><span> Likes 0 </span></div>
                    <div class=" col-md-auto dash-left"><span> Views 0 </span></div>
                    <div class=" col-md-auto"><span> Posts 0 </span></div>
                </div>
            </div>

       </div>
    </div>
@endsection
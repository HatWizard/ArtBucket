@extends('Layouts.main')

@section('content')
<div class="card mx-auto mt-3" style="width: 40%">
    <div class="card-body">
        <form method="POST" action="{{ route('user.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="avatar">avatar</label>
                <input id="avatar" 
                       class="form-control" 
                       type="file" 
                       name="avatar"
                       accept="image/*">
            </div>

            <div class="float-right"><button class="btn btn-primary" type="submit">Save</button><div>
        </form>
    </div>
</div>   
@endsection
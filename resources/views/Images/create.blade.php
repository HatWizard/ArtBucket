@extends('Layouts.main')

@section('content')
    <div class="card mx-auto mt-3 bg-dark" style="width: 40%">
        <div class="card-body">
            <form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="image">Image</label>
                    <input 
                           class="form-control"
                           type="file"
                           id="image"
                           name="image"

                           accept="image/*"
                           >
                </div>

                @error('image')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror


                <div class="form-group">
                    <label for="title">Title</label>
                    <input 
                           class="form-control"
                           id="title"
                           name="title"
                           >
                </div>

                
                @error('title')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror


                <div class="form-group">
                    <label for="author_name">Author</label>
                    <input 
                           class="form-control"
                           id="author_name"
                           name="author_name"
                           >
                </div>

                
                @error('author_name')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror


           


                <div class="form-group">
                    <label for="source_url">Source url</label>
                    <input 
                           class="form-control"
                           id="source_url"
                           name="source_url"
                           >
                </div>

                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea 
                           class="form-control"
                           id="body"
                           name="body"
                           >
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="tags">Tags</label>
                    <input 
                           class="form-control"
                           id="tags"
                           name="tags"
                           placeholder="Add tags to your image (comma separated)"
                           >
                </div>



                
                
                <button class="btn btn-primary" type="submit">Load</button>
            </form>
        </div>
    </div>
@endsection
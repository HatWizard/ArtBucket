@extends('layouts.main')
@section('content')
    <div class="container-fluid" style="padding: 0px;">
        <div class="image-layout">
            <div class="image-place">
                <div class="image-canvas">
                    <img class="image-format-large shadow-drop-under" src="{{asset("storage/".$image->path)}}"  alt="">
                </div>
            </div>
            <div class="left-block left-block-responsive"></div>
        </div>
        <div class="container">
            <div class="d-flex-centered">
                <div class="image-body">
                                            <!-- IMAGE TITLE AND STATS -->
                    <div class="d-flex justify-content-between">

                        <div>
                            <div>
                                <div class="under-title"><span class="title-large">{{$image->title}}</span></div>
                                <div> 
                                    <span class="text-secondary">
                                        by
                                    </span>  
                                    
                                    <span class="text-decoration-underline">
                                        <u>{{$image->author_name}}</u>
                                    </span>
                                </div>
                            </div>
                            
                        </div>

                        <div class="d-flex justify-content-around">
                            <div class="ml-1">
                                    @if ($image->likedBy(auth()->user()))
                                        <form action="{{route("images.like", ["image"=>$image])}}"  method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="button-link" type="submit">
                                                <img class="svg-icon-micro" src="{{asset("assets/images/like/like-active.svg")}}"
                                                alt="" 
                                                style="margin-bottom:4px">     
                                            </button>
                                            <span class="counter-text">{{$image->likes()->count()}}</span> 
                                        </form>
                                    @else
                                    <form action="{{route("images.like", ["image"=>$image])}}"  method="POST">
                                        @csrf
                                        <button class="button-link" type="submit">
                                            <img class="svg-icon-micro" src="{{asset("assets/images/like/like-unactive.svg")}}"
                                            alt="" 
                                            style="margin-bottom:4px">     
                                        </button>
                                        <span class="counter-text">{{$image->likes()->count()}}</span> 
                                    </form>
                                    @endif

                            </div>

                            <div class="ml-1">
                                
                                <img class="svg-icon-micro"
                                @if($image->commentedBy(auth()->user()))
                                    src="{{asset("assets/images/comment/comment-active.svg")}}"
                                @else
                                    src="{{asset("assets/images/comment/comment-unactive.svg")}}"
                                @endif
                                alt="" 
                                style="margin-bottom:4px">
                                <span class="counter-text">{{$image->comments->count()}}</span> 
                            </div>

                            <div class="ml-1">

                                <form action="{{route("images.download", ["image"=>$image])}}"  method="POST">
                                    @csrf
                                    <button class="button-link" type="submit">
                                        <img class="svg-icon-micro" 
                                        @if ($image->downloadedBy(auth()->user()))
                                            src="{{asset("assets/images/download/download-active.svg")}}"
                                        @else
                                            src="{{asset("assets/images/download/download-unactive.svg")}}"
                                        @endif
                                        
                                        alt="" 
                                        style="margin-bottom:4px">     
                                    </button>
                                    <span class="counter-text">{{$image->downloads()->count()}}</span> 
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- Author and load time -->
                    <div class="d-flex justify-content-between">
                        <div><span class="font-weight-bold">loaded at: </span><span>{{$image->created_at->format('M d Y')}}</span></div>
                        <div><span class="font-weight-bold">Original: </span><a>{{$image->source_url}}</a></div>
                    </div>

                    <div class="d-flex text-wrap text-break pt-2">
                       {{$image->body}}
                    </div>

                    
                    <!-- Tags section -->
                    <div class="d-flex flex-wrap flex-row mt-3">
                        <div><span class="font-title" style="font-size: 1.4em;">Tags:</span></div>
                        @foreach ($tags as $tag)
                        <div class="tag align-self-center">
                            <a href="{{route("mainhome", ['tags'=>$tag]) }}" class="text-decoration-none text-white" href="#">{{$tag}}</a>  
                          </div>
                        @endforeach
                    </div>
         

                    <div class="comment-section p-3">
                        <!-- Comment form-->
                        @auth
                        <div class="p-3 bg-basic">
                            <form action="{{route('images.comment', ['image'=>$image])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="body">Comment</label>
                                    <textarea id="body" 
                                           class="form-control" 
                                           name="body"
                                           placeholder="Enter your comment"
                                           style="resize: none"></textarea>
                                </div>
    
                                <button class="btn btn-primary" type="submit">Send</button>
                            </form>
                        </div>
                        @endauth

                        <div class="comment-list">
         
                            @foreach ($comments as $comment)
                                <x-comment :comment="$comment"></x-comment>
                            @endforeach
                        </div>

                       
                        <div class="d-flex justify-content-center mt-3">
                            {{$comments->links()}}
                        </div>
                    </div>
                </div>
                <!-- Image description -->
                <div>

                </div>
            </div>
        </div>

    </div>
@endsection

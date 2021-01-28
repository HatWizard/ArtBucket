<div class="row">

    <div class="comment-item bg-basic">
        <div class="d-flex mb-2">
            <div class="title-micro font-weight-bold">
                {{$comment->user->username}}
            </div>

            <div class="text-secondary font-weight-light ml-2 ">
                {{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}
            </div>
        </div>
        <div>
            {{$comment->body}}
        </div>

        <div>
            <div class="m-1">
                <div class="float-right">
                    @if ($comment->likedBy(auth()->user()))
                        <form action="{{route("comments.like", ["comment"=>$comment])}}"  method="POST">
                            @csrf
                            @method('delete')
                            <button class="button-link" type="submit">
                                <img class="svg-icon-micro" src="{{asset("assets/images/like/like-active.svg")}}"
                                alt="" 
                                style="margin-bottom:4px">     
                            </button>
                            <span class="counter-text">{{$comment->likes()->count()}}</span> 
                        </form>
                    @else
                    <div class="float-right">
                        <form action="{{route("comments.like", ["comment"=>$comment])}}"  method="POST">
                            @csrf
                            <button class="button-link" type="submit">
                                <img class="svg-icon-micro" src="{{asset("assets/images/like/like-unactive.svg")}}"
                                alt="" 
                                style="margin-bottom:4px">     
                            </button>
                            <span class="counter-text">{{$comment->likes()->count()}}</span> 
                        </form>


                    @endif
                 </div>

        </div>
        </div>
    </div>
    

</div>
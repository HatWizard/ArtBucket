
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger -->
<div class="image-item">
    <img class="image-format-item" src="{{asset("storage/".$image->path)}}" alt=""> 
    <a href="{{route("image.show", ["id"=>$image->id])}}">
        <div class="image-item-overlay">
            <div class="image-item-title">
                <div style="margin-bottom:2px"><span class="title-micro">{{$image->title}}</span></div>
                <div class="d-flex justify-content-between">
                    <div>
                        {{$image->user->username}}
                    </div>

                    <div class="ml-2 text-secondary text-weight-light">
                        {{Carbon\Carbon::parse($image->created_at)->diffForHumans()}}
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between" style="width:100%">
                <div></div>
                <div class="d-flex p-1">
                    <div class="mr-1">
                        <img class="svg-icon-micro" src="{{asset("assets/images/like/like-unactive.svg")}}"
                                                alt="" 
                                                style="margin-bottom:4px">
                        <span class="counter-text">{{$image->likes()->count()}}</span>                      
                    </div>

                    <div  class="mr-1">
                        <img class="svg-icon-micro" src="{{asset("assets/images/download/download-unactive.svg")}}"
                                                alt="" 
                                                style="margin-bottom:4px">
                        <span class="counter-text">{{$image->downloads()->count()}}</span>  
                    </div>

                    <div  class="mr-1">
                        <img class="svg-icon-micro" src="{{asset("assets/images/comment/comment-unactive.svg")}}"
                                                alt="" 
                                                style="margin-bottom:4px">
                        <span class="counter-text">{{$image->comments()->count()}}</span>  
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
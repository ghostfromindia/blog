<article>
    @isset($item->banner_image)
        <img class="blog-thumbnail-image" loading="lazy" src="{{$item->banner_image->file_path}}" alt="Business">
    @else
        <img class="blog-thumbnail-image" loading="lazy" src="https://placehold.co/1000x600" alt="Business">
    @endif
    <div class="w-100">
        <div class="row blog-info">
            <div class="col-4 my-2"><span class="time">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</div>
            <div class="col-4 category-area  my-2">
                @isset($item->category)
                    <a href="{{url('/topic/'.$item->category->slug)}}"><span class="badge category">{{$item->category->title}}</span></a>
                @endif
            </div>
            <div class="col-4 author-area  my-2"><span class="author"> @isset($item->category->author){{$item->category->author->title}}@endif</span></div>

            <div class="col-12">
                <h2 class="title"><a href="{{url($item->slug)}}">{{$item->title}}</a></h2>
            </div>

        </div>
    </div>
</article>


{{-- pass with comments via paginate--}}
<div class="row mt-4 ">
    <div class="col-md-10  border rounded p-4">
        <h3>Recent comments</h3>
        @foreach($comments as $comment)
        <div class="row mt-4 ">
            <div class="col-md-11 m-auto border rounded p-4">
                <h5>User: {{$comment->user->name}}</h5>
                <p>Said: {{ \Illuminate\Support\Str::limit($comment->comment, 255, '...')}}</p>
                <div class="row align-items-center">
                   
                    <span class="text-muted col-7">{{date('j F, Y, G:i ', strtotime($comment->updated_at))}}</span>
                    <div class="row col-5 justify-content-between">
                    
                    {{-- diff method? --}}

                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" class=" mt-2 col-5 me-2">
                        <input type="submit" value="Delete comment" class="btn btn-danger ">
                        @csrf
                       {{ method_field('DELETE') }}
                    </form>

                    <a href="{{ route('blog.single', $comment->post->slug) }}" class="btn btn-primary col-5 mt-2 ms-2">Go to post</a>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        <div class="mt-4">
        {!! $comments->links(); !!}
    </div>
    </div>
</div>
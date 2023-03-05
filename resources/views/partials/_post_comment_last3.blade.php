{{-- pass with comments via paginate--}}
<div class="row mt-4 ">
    <div class="col-md-10  border rounded p-4 m-auto">
        <h3>Recent comments:</h3>
        @foreach($post_comments = $post->comments()->paginate(3) as $comment)
        <div class="row mt-4 ">
            <div class="col-md-11 m-auto border rounded p-4">
                <h5>User: {{$comment->user->name}}</h5>
                <p>Said: {{ \Illuminate\Support\Str::limit($comment->comment, 255, '...')}}</p>
                <div class="row align-items-center">
                   
                    <span class="text-muted col-3">{{date('j F, Y, G:i ', strtotime($comment->updated_at))}}</span>
                    <div class="row col-9 justify-content-end">
                    
                    {{-- diff method? --}}

                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" class=" col-6 ">
                        <input type="submit" value="Delete comment" class="btn btn-danger w-100">
                        @csrf
                       {{ method_field('DELETE') }}
                    </form>

                    <a href="{{ route('blog.single', $comment->post->slug) }}" class="btn btn-primary col-4">Go to post</a>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        <div class="mt-4">
        {!! $post_comments->links(); !!}
    </div>
    </div>
</div>
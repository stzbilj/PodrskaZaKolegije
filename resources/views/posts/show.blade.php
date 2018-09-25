<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title}}</h2>
    <p class="blog-post-meta"><strong>{{ $post->user->name}} {{ $post->user->surname}}</strong>, {{ $post->updated_at->format('d.m.Y H:i')}}</p>
    <p>{{ $post->note }}</p>
    @if ( ( Auth::check() && Auth::user()->isAdmin( $course ) ) )
    <button id="edit-item" class="btn btn-info" data-title="{{$post->title}}" data-note="{{$post->note}}" 
    data-postid={{$post->id}} data-action="{{route('posts.update', ['course' => $course->id, 'post'=> $post->id])}}">Uredi</button>
    <button id="delete-item" class="btn btn-danger" data-action="{{route('posts.destroy', ['course' => $course->id, 'post'=> $post->id])}}">Obriši</button>
    @endif
</div>
<hr>
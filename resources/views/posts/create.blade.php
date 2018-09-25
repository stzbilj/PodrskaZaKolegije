<h2 class="blog-post-title">Nova obavijest</h2>
<form method="POST" action="{{ route('posts.store', ['course' => $course->id]) }}">
    @csrf

    <div class="form-group row">
        <div class="col-sm-6">
            <input id="title" type="text" class="form-control" name="title" placeholder="Ovdje upišite naslov" required>
        </div>
    </div>
    <div class="form-group">
        <textarea id="note" class="form-control" rows="5" name="note" placeholder="Ovdje upišite tekst obavijesti" required></textarea>
    </div>
    <div class="form-group row">
        <div class = "col-sm-2">
            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Objavi') }}
            </button>
        </div>
    </div>
</form>
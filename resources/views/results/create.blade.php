<h2 class="blog-post-title">Novi rezultati</h2>
<p class="blog-post-meta"><strong>Uputstva:</strong> Rezultate je potrebno učitati u CSV formatu.U prvom redu se nalaze imena stupaca.
    Prvi stupac se mora zvati JMBAG i u njemu se nalaze JMBAG-ovi studenata.
    U ostalim se nalaze zadaci s pripadajućim bodovima i slični potrebni rezultati.<br />
    Primjer:<br />
    JMBAG; 1.zad; 2.zad; Ukupno; Ocjena<br />
    0123456789; 10; 10; 20; 5 </p>
<form method="POST" action="{{ route('results.store', ['course' => $course->id]) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for=>Vrsta kolokvija</label>
        <div>
            @foreach ($course->examsTypes as $type)
            <div class="form-check form-check-inline radios">  
                <input class="form-check-input" type="radio" name="exam_id" id="inlineRadio{{ $type->id}}"
                        value={{ $type->id}} @if ($loop->first) checked @endif>
                <label class="form-check-label" for="inlineRadio{{ $type->id}}">{{ $type->name}}</label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="resultsFile" name="resultsFile" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])" required>
            <label class="custom-file-label" for="resultsFile">Rezultati (u .csv formatu)</label>
        </div>
    </div>
    <div class="form-group">
        <label for="note">Dodatni komentar</label>
        <textarea id="note" class="form-control" rows="3" name="note"></textarea>
    </div>
    <div class="form-group row">
        <div class = "col-sm-2">
            <button type="submit" class="btn btn-primary btn-block">Objavi</button>
        </div>
    </div>
</form>
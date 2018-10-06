<h2 class="blog-post-title">Objavljeni rezultati</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Vrsta kolokvija</th>
            <th scope="col">Komentar</th>
            <th scope="col">Datum Objave</th>
            <th scope="col">Uredi/Obriši</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results_infos as $results_info)
        <tr>
            <td><a href="{{ route('results.show', ['course' => $course->id, 'result' => $results_info->id ]) }}">{{ $results_info->examType->name}}</a></td>
            <td>{{ $results_info->comment }}</td>
            <td>{{ $results_info->created_at->format('d.m.Y') }}</td>
            <td>
                <button id="edit-result" class="btn btn-info" data-types="{{ $course->examsTypes->toJson() }}" data-type-id={{ $results_info->type_id}} data-note="{{$results_info->comment}}"
                    data-action="{{route('results.update', ['course' => $course->id, 'result'=> $results_info->id])}}">Uredi</button>
                <button id="delete-item" class="btn btn-danger" data-text="Jeste li sigurni da želite pobrisati rezulate?" data-action="{{route('results.destroy', ['course' => $course->id, 'result'=> $results_info->id])}}">Obriši</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $results_infos->links('vendor.pagination.bootstrap-4')}}

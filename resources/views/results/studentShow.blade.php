@foreach ($results as $result)
<table class="table">
    <thead>
        <tr>
            <th scope="col"></th>
            @foreach (json_decode( $result->header) as $header)
            <th scope="col">{{ $header}} </th>
            @endforeach
            <th scope="col">Datum objave</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $result->info->examType->name }}</th>
            @foreach (json_decode( $result->data) as $item)
            <td>{{ $item }}</td>
            @endforeach
            <td>{{ $result->info->created_at->format('d.m.Y') }}</td>
        </tr>
    </tbody>
</table>
@if ($result->info->comment)
<p><strong>Komentar: </strong> {{ $result->info->comment }}</p>
@endif
<hr />
@endforeach
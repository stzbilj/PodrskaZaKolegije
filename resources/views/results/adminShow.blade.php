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
            <td>Link</td>
            <td>{{ $results_info->comment }}</td>
            <td>{{ $results_info->created_at->format('d.m.Y') }}</td>
            <td>Buttons</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $results_infos->links('vendor.pagination.bootstrap-4')}}

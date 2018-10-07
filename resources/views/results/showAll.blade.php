@extends ('layouts.app')

@section('content')
<main class="py-4">
    @include('layouts.flashMessage')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Moji rezultati</h1>
                <div class="col-sm-12 blog-main">
                    <p>
                        Ovdje se nalaze svi vaši rezultati.
                    </p>
                    @if ($results->count() === 0)
                        <p>Trenutno nema rezultata za prikaz.</p>
                    @else
                    @foreach ($results as $result)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ $result->info->course->name }}</th>
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
                    {{ $results->links('vendor.pagination.bootstrap-4')}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
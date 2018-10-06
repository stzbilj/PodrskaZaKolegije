@extends ('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1>Rezultati</h1>
    
            <div class="col-sm-12 blog-main">
                <h2 class="blog-post-title">{{ $results_info->examType->name }}</h2>  
                <p class="blog-post-meta">Datum objave: {{ $results_info->created_at->format('d.m.Y H:i') }}</p>
                <a href="{{ url()->previous() }}" class="btn btn-primary" role="button">Natrag</a>
                <p><strong>Komentar:</strong> {{ $results_info->comment }}</p> 
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">JMBAG</th>
                            @foreach ( $results_info->header as $head)
                            <th scope="col">{{ $head }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                        <tr>
                            <th scope="row">{{ $result->user_id }}</th>
                            @foreach (json_decode($result->data) as $item)
                            <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection

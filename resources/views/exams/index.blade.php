@extends ('layouts.app')

@section('header-scripts')

<script type="text/javascript" src="{{ asset('/plugins/DataTables/datatables.min.js')}}" defer></script>

<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/DataTables/datatables.min.css')}}"/>
 

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1>Zadaci</h1>

            <h4>Kolkoviji</h4>
            <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Row 1 Data 1</td>
                            <td>Row 1 Data 2</td>
                        </tr>
                        <tr>
                            <td>Row 2 Data 1</td>
                            <td>Row 2 Data 2</td>
                        </tr>
                    </tbody>
                </table>
            <h4>Domaće zadaće</h4>
            <h4>Dodatni zadaci</h4>
            
    
            {{--<div class="col-sm-12 blog-main">
                @if ( ( Auth::check() && Auth::user()->isAdmin( $course->id ) ) )
                @include('posts.create')
                @endif
                @foreach ($posts as $post)
                @include('posts.show')
                @endforeach
                {{ $posts->links('vendor.pagination.bootstrap-4')}}
            </div>
            @if ( ( Auth::check() && Auth::user()->isAdmin( $course ) ) )
                @include('posts.editModal')
                @include('posts.deleteModal')
            @endif --}}
        </main>
    </div>
</div>
@endsection

@section('footer-scripts')
<script src="{{ asset('js/datatables.js') }}" defer></script>
@endsection
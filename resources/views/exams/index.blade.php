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
            @if ( ( Auth::check() && Auth::user()->isAdmin( $course ) ) )
                <button id="create-exam" class="btn btn-primary" data-types=""
                    data-action="{{route('exam.store', ['course' => $course->id])}}">Novi kolokvij</button>
            @endif
            <table class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Akademska godina</th>
                        <th>Kolkokvij</th>
                        <th>Objavljeno</th>
                        @if (Auth::check() && Auth::user()->isAdmin($course))
                        <th>Brisanje</th>                            
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                    <tr>
                        <td>{{ $exam->year }}</td>
                        <td><a target="_blank" rel="noopener noreferrer" href="{{ $exam->path }}">{{ $exam->type->name }}</a></td>
                        <td>{{ $exam->created_at->format('d.m.Y')}}</td>
                        @if (Auth::check() && Auth::user()->isAdmin($course_id))
                        <td>
                            <button id="delete-exam" class="btn btn-danger" data-action="{{route('exam.destroy', ['course' => $course->id, 'exam'=> $exam->id])}}">Obriši</button>                            
                        </td>                            
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Domaće zadaće</h4>
            @if ( ( Auth::check() && Auth::user()->isAdmin( $course ) ) )
                <button id="create-assignment" class="btn btn-info" data-action="{{route('posts.update', ['course' => $course->id, 'post'=> $post->id])}}">Novi zadatak</button>
            @endif
            <table class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Zadatak</th>
                        <th>Datum objave</th>
                        @if (Auth::check() && Auth::user()->isAdmin($course_id))
                        <th>Brisanje</th>                            
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assignments as $assignment)
                    <tr>
                        <td><a target="_blank" rel="noopener noreferrer" href="{{ $assignment->path }}">{{ $assignment->link_text }}</a></td>
                        <td>{{ $assignment->created_at->format('d.m.Y')}}</td>
                        @if (Auth::check() && Auth::user()->isAdmin($course_id))
                        <td>
                            <button id="delete-assignment" class="btn btn-danger" data-action="{{route('assigment.destroy', ['course' => $course->id, 'assignment'=> $assignment->id])}}">Obriši</button>
                        </td>                            
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Dodatni zadaci</h4>
            <table class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Zadatak</th>
                        <th>Datum objave</th>
                        @if (Auth::check() && Auth::user()->isAdmin($course_id))
                        <th>Brisanje</th>                            
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($additionals as $additional)
                    <tr>
                        <td><a target="_blank" rel="noopener noreferrer" href="{{ $additional->path }}">{{ $additional->link_text }}</a></td>
                        <td>{{ $additional->created_at->format('d.m.Y')}}</td>
                        @if (Auth::check() && Auth::user()->isAdmin($course_id))
                        <td>
                            <button id="delete-assignment" class="btn btn-danger" data-action="{{route('assigment.destroy', ['course' => $course->id, 'additional'=> $additional->id])}}">Obriši</button>
                        </td>                            
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>
</div>
@endsection

@section('footer-scripts')
<script src="{{ asset('js/datatables.js') }}" defer></script>
@endsection
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

            <h4>Kolokviji</h4>
            @if ( ( Auth::check() && Auth::user()->isAdmin( $course ) ) )
            <div class="btn-group btn-margin">
                <button id="create-exam" class="btn btn-primary" data-types="{{ $course->examsTypes->toJson() }}"
                    data-action="{{route('exams.store', ['course' => $course->id])}}">Novi kolokvij</button>
            </div>
            @endif
            <table class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Akademska godina</th>
                        <th>Kolokvij</th>
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
                        <td><a target="_blank" rel="noopener noreferrer" href="{{ Storage::url($exam->path) }}">{{ $exam->type->name }}</a></td>
                        <td>{{ $exam->created_at->format('d.m.Y')}}</td>
                        @if (Auth::check() && Auth::user()->isAdmin($course->id))
                        <td>
                            <button id="delete-item" class="btn btn-danger" data-text="Jeste li sigurni da želite pobrisati zadatak?" data-action="{{route('exams.destroy', ['course' => $course->id, 'exam'=> $exam->id])}}">Obriši</button>
                        </td>                            
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Domaće zadaće</h4>
            @if ( ( Auth::check() && Auth::user()->isAdmin( $course ) ) )
            <div class="btn-group btn-margin">
                <button id="create-assignment" class="btn btn-info" data-action="{{route('assignments.store', ['course' => $course->id])}}">Novi zadatak</button>
            </div>
            @endif
            <div class="row"></div>
            <table class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Zadatak</th>
                        <th>Datum objave</th>
                        @if (Auth::check() && Auth::user()->isAdmin( $course ))
                        <th>Brisanje</th>                            
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assignments as $assignment)
                    <tr>
                        <td><a target="_blank" rel="noopener noreferrer" href="{{ Storage::url($assignment->path ) }}">{{ $assignment->link_text }}</a></td>
                        <td>{{ $assignment->created_at->format('d.m.Y')}}</td>
                        @if (Auth::check() && Auth::user()->isAdmin($course))
                        <td>
                            <button id="delete-item" class="btn btn-danger" data-text="Jeste li sigurni da želite pobrisati zadatak?" data-action="{{route('assignments.destroy', ['course' => $course->id, 'assignment'=> $assignment->id])}}">Obriši</button>
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
                        @if (Auth::check() && Auth::user()->isAdmin($course))
                        <th>Brisanje</th>                            
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($additionals as $additional)
                    <tr>
                        <td><a target="_blank" rel="noopener noreferrer" href="{{ Storage::url($additional->path) }}">{{ $additional->link_text }}</a></td>
                        <td>{{ $additional->created_at->format('d.m.Y')}}</td>
                        @if (Auth::check() && Auth::user()->isAdmin($course))
                        <td>
                            <button id="delete-item" class="btn btn-danger" data-text="Jeste li sigurni da želite pobrisati zadatak?" data-action="{{route('assignments.destroy', ['course' => $course->id, 'assignment'=> $additional->id])}}">Obriši</button>
                        </td>                            
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if (Auth::check() && Auth::user()->isAdmin($course))
                @include('exams.createExamModal')
                @include('exams.createAssignmentModal')
                @include('layouts.deleteModal')
            @endif
        </main>
    </div>
</div>
@endsection

@section('footer-scripts')
<script src="{{ asset('js/datatables.js') }}" defer></script>
<script src="{{ asset('js/modalDelete.js') }}" defer></script>
<script src="{{ asset('js/modalExams.js') }}" defer></script>
@endsection
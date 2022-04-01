@extends('DI.note.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Project name') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('notes.create') }}"> {{ __('Create new note') }}</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nr</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Text') }}</th>
            <th width="280px">{{ __('Action') }}</th>
        </tr>
        @foreach ($notes as $note)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $note->note_name }}</td>
            <td>{{ $note->note_text }}</td>
            <td>
                <form action="{{ route('notes.destroy',$note->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('notes.show',$note->id) }}">{{ __('Show') }}</a>

                    <a class="btn btn-success" href="{{ route('notes.edit',$note->id) }}">{{ __('Edit') }}</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection 
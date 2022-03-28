@extends('DI.layouts.default')
@section('index')
<div class="container">
   <div class="row">
      <p class="">

         i am the tasks page
         <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New task</a>
         <br>
         <br>
      </p>

   </div>
   <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                
            </div>
        </div>
    </div>
   <div class="row">
   <table class="table table-bordered">
        <tr>
            <th>Nr</th>
            <th>name</th>
            <th>details</th>
            <th>priority</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $task->task_name }}</td>
            <td>{{ $task->task_details }}</td>
            <td>{{ $task->task_priority }}</td>
            <td>
                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">

                  <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">Show</a>

                  <a class="btn btn-success" href="{{ route('tasks.edit',$task->id) }}">Edit</a>

                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                
            </td>
        </tr>
        @endforeach
    </table>
   </div>
</div>
@stop
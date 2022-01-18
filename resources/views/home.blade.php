@extends('layouts.main_layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <h3>TODO LIST</h3>
                <hr>
                <div class="my-2">
                    <a href="{{route('new_task')}}" class="btn btn-primary">Create task...</a>
                </div>
                <hr>
                @if ($tasks->count() === 0)
                    <p>No tasks available</p>
                @else
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Task</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td style='width:70%'>{{$task->task}}</td>
                                    <td>
                                        {{-- change to finished / pending --}}
                                        @if ($task->done == null)
                                            <a href=""  class="btn btn-primary btn-sm" title='change to done'><i class="fa fa-check"></i></a>
                                        @else
                                            <a href="" class="btn btn-success btn-sm" title='change to pending' style='width:32px'><i class="fa fa-times"></i></a>
                                        @endif

                                        {{-- edit --}}
                                        <a href="" class="btn btn-danger btn-sm" title='edit' style='width:32px'><i class="fas fa-edit"></i></a>

                                        {{-- make visible / invisible --}}
                                        @if ($task->visible ==1)
                                            <a href="" class="btn btn-secondary btn-sm" title='make invisible' style='width:32px'><i class="fas fa-eye-slash"></i></a>
                                        @else
                                            <a href="" class="btn btn-secondary btn-sm" title='make visible' style='width:32px'><i class="fas fa-eye"></i></a>  
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div>
                        <p class='text-center fw-bold'>Total: {{$tasks->count()}}</p>
                    </div>
                @endif



            </div>{{-- col --}}
        </div>{{-- row --}}
    </div>{{-- container-fluid --}}
@endsection
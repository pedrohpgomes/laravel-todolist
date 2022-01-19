@extends('layouts.main_layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <h3>TODO LIST</h3>
                <hr>
                <h3 class='text-center mb-5'>EDIT TASK</h3>

                <form action="{{route('edit_task_submit')}}" method="post" id="edit_task">
                    @csrf
                    <input type='hidden' name='id_task' id='id_task' value="{{$task->id}}" />
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">

                            <div class="form-group mb-3">
                                <label for="text_edit_task">Edit Task:</label>
                                <input type="text" name="text_edit_task" id="text_edit_task" class="form-control"  maxlength='250' value="{{$task->task}}" />
                            </div>
                            <div class="form-group">
                                <a href="{{route('home')}}" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Edit" class="btn btn-primary" form='edit_task' />
                            </div>

                        </div>
                    </div>
                </form>

            </div>{{-- col --}}
        </div>{{-- row --}}
    </div>{{-- container-fluid --}}
@endsection
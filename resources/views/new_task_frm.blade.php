@extends('layouts.main_layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <h3>TODO LIST</h3>
                <hr>
                <h3 class='text-center mb-5'>NEW TASK</h3>

                <form action="{{route('new_task_submit')}}" method="post" id="new_task">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">

                            <div class="form-group mb-3">
                                <label for="text_new_task">New Task:</label>
                                <input type="text" name="text_new_task" id="text_new_task" class="form-control" />
                            </div>
                            <div class="form-group">
                                <a href="{{route('home')}}" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Salvar" class="btn btn-primary" form='new_task' />
                            </div>

                        </div>
                    </div>
                </form>

            </div>{{-- col --}}
        </div>{{-- row --}}
    </div>{{-- container-fluid --}}
@endsection
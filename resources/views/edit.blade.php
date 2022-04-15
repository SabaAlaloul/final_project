@extends ('layouts.app')
@section ('content')

<div class="col-sm-offset-2 col-sm-8">
@if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    <!-- New Task Form -->
                    <form action="\update\id" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name"  class="form-control" value="{{$task->name}}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                  
                                    <tr>
                                        <td class="table-text"><div>{{$task->name}}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="\delete\id" method="POST">
                                            @csrf
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                               
                                            </form>
                                            <td>
                                            <form action="" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                                
                                                <button type="submit"class="btn btn-primary btn-sm">
                                                    <i class="fa fa-btn fa-trash"></i>Edit
                                                </button>
                                            </form>
                                            </td>
                                        </td>
                                       
                                    </tr>
                                    @endforeach
                                      
                                       

                                        
                                       
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>


        @endsection 

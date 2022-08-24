@extends('layout.master')
@section('title', 'Student list')
@section('content')
<div class="container">
  <h3>Student List</h3>

  <a href="{{ url('addstudent') }}">
  <button type="button" class="btn btn-primary">Add Student</button>
  </a>
  <br>
  @if(Session::has('message'))
    <div class="alert alert-success fade in alert-dismissible" role="alert">
        <strong>Success</strong> {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
  </div>
   @endif


  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Reporting Teacher </th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $student)
    @php
    $gender = $student->gender;
    @endphp
    <tr>
      <th scope="row">{{ $student->id}}</th>
      <td>{{ $student->fullname}}</td>
      <td>{{ $student->age}}</td>
      <td>
      @if($gender == 'm')
      M
      @else
      F
      @endif
      </td>
      <td>{{ $student->teachers->fullname}}</td>
      <td>
        <a href="{{ URL::to('editstudent/'.$student->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        <a href="{{ URL::to('delstudent/'.$student->id) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
@stop


@extends('layout.master')
@section('title', 'Student list')
@section('content')
<div class="container">
  <h3>Marks List</h3>

  <a href="{{ url('addmarks') }}">
  <button type="button" class="btn btn-primary">Add Marks</button>
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
      <th scope="col">Maths</th>
      <th scope="col">Science</th>
      <th scope="col">History</th>
      <th scope="col">Term</th>
      <th scope="col">Total Marks</th>
      <th scope="col">Created On</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($marks as $mark)
    @php
    $maths = $mark->mathsmark;
    $science = $mark->sciencemark;
    $history = $mark->historymark;

    $total = $maths  +  $science + $history;
    $timestamp = $mark->created_at;
    $split_timestamp = explode(' ',$timestamp);
    
    $date = $split_timestamp[0]; 
    $time = $split_timestamp[1];

    $splitdate = explode('-',$date); 
    $monthname = $mark->created_at->format('M');
    $datenumber = $splitdate[1];
    $year = $splitdate[0];
    $dateObject = new DateTime($timestamp);
    $timeformated = $dateObject->format('h:i A');

    $created = $monthname.' '.$datenumber.','.$year.' '.$timeformated

    @endphp
    <tr>
      <th scope="row">{{ $mark->id }}</th>
      <td>{{ $mark->studentlist->fullname }}</td>
      <td>{{ $mark->mathsmark }}</td>
      <td>{{ $mark->sciencemark }}</td>
      <td>{{ $mark->historymark }}</td>
      <td>{{ $mark->terms->termname }}</td>
      <td>{{ $total }}</td>
      <td>{{ $created }}</td>
      <td>
        <a href="{{ URL::to('editmarks/'.$mark->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        <a href="{{ URL::to('delmarks/'.$mark->id) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
@stop


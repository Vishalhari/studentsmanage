@extends('layout.master')
@section('title', 'Add Student')
@section('content')
<div class="container">
  <h3>Add Marks</h3>

  @if(Session::has('message'))
    <div class="alert alert-success fade in alert-dismissible" role="alert">
        <strong>Success</strong> {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
  </div>
   @endif

  @if ($errors->any())
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger fade in alert-dismissible" role="alert">
			<strong>Error</strong> {{$error}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endforeach
   @endif
  <form action="{{ URL::to('storemarks') }}" method="post">
  {{ csrf_field() }} 
  <div class="form-group">
    <label for="exampleSelect">Student</label>
    <select class="form-control" name="studentid">
      <option value="">select</option>
      @foreach($students as $stud)
      <option value="{{ $stud->id }}">{{ $stud->fullname }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleSelect">Term</label>
    <select class="form-control" name="termid">
      <option value="">select</option>
      @foreach($terms as $term)
      <option value="{{ $term->id }}">{{ $term->termname }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="email">Maths Mark:</label>
    <input type="text" class="form-control" name="mathsmark">
  </div>
  <div class="form-group">
    <label for="pwd">Science mark:</label>
    <input type="number" class="form-control" name="sciencemark">
  </div>
  <div class="form-group">
    <label for="pwd">History Mark:</label>
    <input type="number" class="form-control" name="historymark">
  </div>

  
  <button type="submit" class="btn btn-primary">Add</button>
</form>

  
</div>
@stop


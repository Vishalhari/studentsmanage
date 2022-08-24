@extends('layout.master')
@section('title', 'Add Student')
@section('content')
<div class="container">
  <h3>Add Student</h3>

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
  <form action="{{ URL::to('createstudent') }}" method="post">
  {{ csrf_field() }} 
  <div class="form-group">
    <label for="email">Full Name:</label>
    <input type="text" class="form-control" name="fullname">
  </div>
  <div class="form-group">
    <label for="pwd">Age:</label>
    <input type="number" class="form-control" name="age">
  </div>

  <div class="form-group row">
    <label class="col-sm-2">Gender: </label>
    <div class="col-sm-10">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="m">
            <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="f">
            <label class="form-check-label" for="inlineRadio2">female</label>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="exampleSelect">Reporting teacher</label>
    <select class="form-control" name="teacherid" id="exampleSelect">
      <option value="">select</option>
      @foreach($teachers as $teacher)
      <option value="{{ $teacher->id }}">{{ $teacher->fullname }}</option>
      @endforeach
    </select>
</div>
  
  <button type="submit" class="btn btn-primary">Add</button>
</form>

  
</div>
@stop


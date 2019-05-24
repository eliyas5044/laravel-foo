@extends('layouts.app')

@section('content')
	<div class="container">
		@if(session()->has('error'))
		<div class="alert alert-danger alert-dismissible fade show">
			{{session('error')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
		</div>
		@endif

		@if($errors->has('foo'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  @foreach($errors->all() as $message)
		  	{{$message}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  @endforeach
		</div>
		@endif

		<div>
			<form action="{{url('set-foo')}}" method="post">
				@csrf
				<div class="form-group">
				    <label for="foo">Set Foo Variable</label>
				    <input type="text" name="foo" class="form-control" id="foo" placeholder="Please enter something">
				 </div>
				 <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@endsection
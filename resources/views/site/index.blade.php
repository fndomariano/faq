@extends('layouts.app')

@section('content')
	<div class="container">
		<form action="{{ route('site_search') }}" method="POST">   
			@csrf     
			<div class="form-group">			
				<input type="text" name="search" id="search" class="form-control" placeholder="Search by Reference, Question or Solution...">  				
			</div>					
					
			<button type="submit" class="btn btn-success float-right">Search</button>
		</form>
	</div>
@stop
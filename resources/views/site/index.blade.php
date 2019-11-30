@extends('layouts.app')

@section('content')
	<div class="container">
		<form action="{{ route('site_search') }}" method="get">   
			
			<div class="form-group">			
				<input type="text" name="q" id="q" class="form-control" placeholder="Search by Reference, Question or Solution...">  				
			</div>					
					
			<button type="submit" class="btn btn-success float-right">Search</button>
		</form>
	</div>
@stop
@extends('layouts.app')

@section('content')
    <div class="container">
		<h2>
			New FAQ
		</h2>
		
		<form action="{{ route('faq.store') }}" method="POST">   
			@csrf     
			<div class="form-group">
				<label for="reference">Reference</label>
				<input type="text" name="reference" id="reference" class="form-control">  
				<span class="text-danger">{{ $errors->first('reference') }}</span>          
			</div>

			<div class="form-group">
				<label for="question">Question</label>
				<textarea name="question" id="question" cols="30" rows="5" class="form-control"></textarea>
				<span class="text-danger">{{ $errors->first('question') }}</span>          
			</div>

			<div class="form-group">
				<label for="name">Answer</label>
				<textarea name="answer" id="answer" cols="30" rows="5" class="form-control"></textarea>
				<span class="text-danger">{{ $errors->first('answer') }}</span>          				     
			</div>
						
			
			<a href="{{ route('faq.index') }}" class="btn btn-danger">Back</a>
			<button type="submit" class="btn btn-success">Save</button>

		</form>
	</div>
@stop
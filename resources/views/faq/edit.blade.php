@extends('layouts.app')

@section('content')
    <div class="container">
		<h2>
			Edit FAQ
		</h2>
		
		<form action="{{ route('faq.update', $faq->id) }}" method="POST">   
			@csrf     
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label for="reference">Reference</label>
				<input type="text" name="reference" id="reference" class="form-control" value="{{ $faq->reference }}">  
				<span class="text-danger">{{ $errors->first('reference') }}</span>          
			</div>

			<div class="form-group">
				<label for="question">Question</label>
				<textarea name="question" id="question" cols="30" rows="5" class="form-control">{{ $faq->question }}</textarea>
				<span class="text-danger">{{ $errors->first('question') }}</span>          
			</div>

			<div class="form-group">
				<label for="name">Answer</label>
				<textarea name="answer" id="answer" cols="30" rows="5" class="form-control">{{ $faq->answer }}</textarea>
				<span class="text-danger">{{ $errors->first('answer') }}</span>          				     
			</div>
						
			
			<a href="{{ route('faq.index') }}" class="btn btn-danger">Back</a>
			<button type="submit" class="btn btn-success">Save</button>

		</form>
	</div>
@stop
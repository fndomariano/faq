@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>
			{{ $faq->question }}
		</h2>
		<div>
			<small><b>Created by:</b> {{ $faq->username }}</small> | 
			<small><b>Useful:</b> <span class='vote-useful'>{{ $faq->useful }}</span></small> |
			<small><b>Useless:</b> <span class='vote-useless'>{{ $faq->useless }}</span></small> |
			<small><b>Created At:</b> {{ $faq->created_at->format('d/m/Y') }}</small> |
			<small><b>Updated At:</b> {{ $faq->updated_at->format('d/m/Y') }}</small>
		</div>
		<hr>
		<p>
			{{ $faq->answer }}
		</p>
		
		<div>			
			<i>Was this article useful?</i>
			<br>
			<a href="#" class="btn btn-success vote vote-yes">
				Yes	
			</a>
			<a href="#" class="btn btn-info vote vote-no">
				No
			</a>
		</div>
		<hr>						
		<a href="{{ route('site_index') }}" class="btn btn-danger">Back</a>
	</div>

	@include('partials.vote-modal')
@stop
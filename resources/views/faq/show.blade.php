@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>
			Show FAQ
			<a href="{{ route('faq.index') }}" class="btn btn-success pull-right">Back</a>
		</h2>
		<table class="table table-condensed table-bordered">
			<tr>
				<th>Question</th>
				<td>{{ $faq->question }}</td>
			</tr>
			<tr>
				<th>Answer</th>
				<td>{{ $faq->answer }}</td>
			</tr>
			<tr>
				<th>Reference</th>
				<td>{{ $faq->reference }}</td>
			</tr>
			<tr>
				<th>Useful</th>
				<td>{{ $faq->useful }}</td>
			</tr>
			<tr>
				<th>Useless</th>
				<td>{{ $faq->useless }}</td>
			</tr>
			<tr>
				<th>Created At</th>
				<td>{{ $faq->created_at->format('d/m/Y H:i:s') }}</td>
			</tr>
			<tr>
				<th width="10%">Updated At</th>
				<td>{{ $faq->updated_at->format('d/m/Y H:i:s') }}</td>
			</tr>
		</table>		
	</div>
@stop
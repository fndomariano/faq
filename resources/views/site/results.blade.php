@extends('layouts.app')

@section('content')
	<div class="container">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Reference</th>
					<th>Question</th>
					<th>Action</th>			
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($faqs as $faq)
				<tr>
					<td>{{ $faq->reference }}</td>
					<td>{{ $faq->question }}</td>
					<td>{{ $faq->username }}</td>
					<td>
						<a href="{{ route('site_show', $faq->id) }}">Show</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop
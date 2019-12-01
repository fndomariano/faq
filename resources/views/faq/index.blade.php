@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>
            FAQs
			<a href="{{ route('faq.create') }}" class="btn btn-success float-right">Add</a>
		</h2>

        @include('partials.feedback')
        
        @if ($faqs)
            <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
						<th>Reference</th>
						<th>Useful</th>
						<th>Useless</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                        <tr>
                            <td>{{ $faq->id }}</td>
                            <td>
                                <a href="{{ route('faq.show', $faq->id) }}">
                                    {{ $faq->reference }}
                                </a>
                            </td>
                            <td>{{ $faq->useful }}</td>
                            <td>{{ $faq->useless }}</td>
                            <td>{{ $faq->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>{{ $faq->updated_at->format('d/m/Y H:i:s') }}</td>
                            <td width="1%" nowrap>
                                <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-info">
                                    Edit
								</a>
								<a href="#" class="btn btn-danger delete form-delete-{{ $faq->id }}">Remove</a>
                                <form action="{{ route('faq.destroy', $faq->id) }}" method="post" class="form-delete-{{ $faq->id }}" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">                                    
                                </form> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $faqs->links() }}
        @else
            <div class="alert alert-info">
                There are no FAQs registered yet!
            </div>
        @endif

    </div>
    
    @include('partials.confirm')

@stop
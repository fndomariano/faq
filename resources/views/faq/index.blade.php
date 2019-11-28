@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>
            FAQs
            <a href="#" class="btn btn-success pull-right">Add</a>
        </h2>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        
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
                                <a href="#" class="btn btn-info">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <a href="#" class="btn btn-info">
									<i class="glyphicon glyphicon-remove"></i>
                                </a>
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
    
    {{-- @include('partials.confirm') --}}

@stop
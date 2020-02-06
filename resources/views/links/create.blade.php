@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create Links</h3>
            </div>
            <meta name="_token" content="{{ csrf_token() }}" /> 
			{{ method_field('post') }}
			{!! Form::open(['autocomplete'=> 'of','method' => 'POST','route' => ['storelink'], 'files'=> 'true','role' => 'form', 'data-toggle' => 'validator', 'novalidate' => 'true', 'enctype' => 'multipart/form-data'])  !!}
			    {{ csrf_field() }}
				@include('links.form')
			{!! Form::close() !!}
        </div>
    </div>
</div>
@stop
@push('scripts')
@endpush

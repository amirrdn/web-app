@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Detail {{ $links->link_name }}</div>
            <div class="card-body">
                <div class="form-group">
                    <label class="control-label col-md-2">Name</label>
                    <label class="control-label col-md-8">: {{ $links->link_name }}</label>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Links</label>
                    <label class="control-label col-md-8">: <a target="_blank" href="{{ $links->link }}">{{ $links->link }}</a></label>
                </div>
              <a href="{{ url('/') }}" class="btn btn-primary">List Link</a>
            </div>
        </div>
        
    </div>
</div>
@stop
@push('scripts')
@endpush
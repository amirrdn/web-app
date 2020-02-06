@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <a href="{{ route('createlink') }}" class="btn btn-primary btn-sm float-right CreateLinks">Add Links</a>
        </div>
        <div style="clear: both;margin: 10px;padding: 1px;"></div>
        <table class="table table-bordered" id="role-table">
            <thead>
                <tr>
                    <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                    <th>No.</th>
                    <th>Link Name</th>
                    <th>Link</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
            <button class="btn btn-danger btn-sm delete_all">Delete Checked</button>
        </div>
    </div>
</div>
@include('links.edit')
@stop
@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="http://crm.kurniasafety.com/css/jquery.loading.min.css">
<script src="http://crm.kurniasafety.com/js/jquery.loading.min.js"></script>
@include('includes.jquery')
@endpush
<div class="card text-white bg-primary">
    <div class="card-header">Detail {{ $links->link_name }}</div>
    <div class="card-body">
        <div class="form-group row">
            <label class="control-label col-md-4">Name</label>
            <label class="control-label col-md-8">: {{ $links->link_name }}</label>
        </div>
        <div style="clear;both;"></div>
        <div class="form-group row">
            <label class="control-label col-md-4">Links</label>
            <label class="control-label col-md-8">: <a target="_blank" style="color: #fff;" href="{{ $links->link }}">{{ $links->link }}</a></label>
        </div>
    </div>
</div>
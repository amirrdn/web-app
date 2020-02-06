<div class="form-group">
    <label>Title</label>
    {!! Form::text('link_name', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Enter link name','class' => 'form-control', 'autocomplate' => 'off')) !!}
</div>
<div class="form-group">
    <label>Links</label>
    {!! Form::text('link', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Enter links','class' => 'form-control', 'autocomplate' => 'off')) !!}
</div>
<button type="submit" class="btn btn-primary">Submit</button>
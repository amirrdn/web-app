{!! Form::model($links, ['files'=> 'true','method' => 'POST','route' => ['updatelink', $links->id], 'role' => 'form', 'data-toggle' => 'validator', 'novalidate' => 'true', 'name' => 'contentform', 'id' => 'demoForm', 'enctype' => 'multipart/form-data'])  !!}
    @csrf
    @include('links.form')
{!! Form::close() !!}
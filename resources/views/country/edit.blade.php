

@extends('layouts.app')
@section('main')

<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="h3">Edit Country</h1>
            </div>
            <div class="col text-end">
                <a href="{{ route('country') }}" class="btn btn-sm btn-dark">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">

        {!! display_bootstrap_alerts() !!}
        
        {!! Form::open(['route' => ['country.update', $item->id], 'method' => 'post']) !!}
        @csrf @method('PUT')

            <div class="form-group mb-3">
                {!! Form::label('name', 'Name', array('class' => 'form-label'))  !!}
                {!! Form::text('name', $item->name ?? old('name'), 
                        [
                            'class' => 'form-control', 
                            'placeholder' => 'country name'
                        ]
                    ) 
                !!}
                <small class="text-muted fst-italic">
                    <code>United States</code>
                </small>
            </div> <!-- form-group end -->

            <div class="form-group mb-3">
                {!! Form::label('flag', 'Flag Url', array('class' => 'form-label'))  !!}
                {!! Form::text('flag',  $item->flag ?? old('flag'), 
                        [
                            'class' => 'form-control', 
                            'placeholder' => 'country flag url'
                        ]
                    ) 
                !!}
                <small class="text-muted fst-italic">
                    <small class="d-block">Example for testing:</small>
                    <code class="text-secondary">https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg</code>
                </small>
            </div> <!-- form-group end -->

            <div class="form-group mb-3">
                {!! Form::submit('submit', array( 'class' => 'btn btn-dark' )) !!}
                {!! Form::reset('reset', array( 'class' => 'btn btn-outline-dark' )) !!}
            </div>

        {!! Form::close() !!}
        
    </div>
</div>

@stop

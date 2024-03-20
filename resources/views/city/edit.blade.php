

@extends('layouts.app')
@section('main')

<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="h3">Edit City</h1>
            </div>
            <div class="col text-end">
                <a href="{{ route('city') }}" class="btn btn-sm btn-dark">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">

        {!! display_bootstrap_alerts() !!}
        
        {!! Form::open(['route' => ['city.update', $item->id], 'method' => 'post']) !!}
        @csrf @method('PUT')

            <div class="form-group mb-3">
                {!! Form::label('name', 'Country', array('class' => 'form-label'))  !!}
                {!! Form::select('country_id', App\Models\Country::orderBy('name')->pluck('name', 'id'), $item->country_id, 
                        [
                            'class' => 'form-control', 
                            'placeholder' => 'Select a country'
                        ]
                    ) 
                !!}

            </div> <!-- form-group end -->

            <div class="form-group mb-3">
                {!! Form::label('name', 'Name', array('class' => 'form-label'))  !!}
                {!! Form::text('name', $item->name ?? old('name'), 
                        [
                            'class' => 'form-control', 
                            'placeholder' => 'city name'
                        ]
                    ) 
                !!}
                <small class="text-muted fst-italic">
                    <small class="d-block">Example for testing:</small>
                    <code class="text-secondary">Hollandia</code>
                </small>
            </div> <!-- form-group end -->

            <div class="form-group mb-3">
                {!! Form::label('coordinates', 'Coordinates', array('class' => 'form-label'))  !!}
                {!! Form::text('coordinates', $item->coordinates ?? old('coordinates'), 
                          [
                            'class' => 'form-control', 
                            'placeholder' => 'city coordinates'
                          ]) 
                !!}
                <small class="text-muted fst-italic">
                    <code>-9.513,147.211</code>
                </small>
            </div> <!-- form-group end -->

            <div class="form-group mb-3">
                {!! Form::label('coordinatesUrl', 'Coordinates Url', array('class' => 'form-label'))  !!}
                {!! Form::text('coordinatesUrl', $item->coordinatesUrl ?? old('coordinatesUrl'), 
                          [
                            'class' => 'form-control', 
                            'placeholder' => 'city coordinatesUrl'
                          ]) 
                !!}
                <small class="text-muted fst-italic">
                    <code>https://www.openstreetmap.org/node/7992304469#map=15/-8.7734/160.7001</code>
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

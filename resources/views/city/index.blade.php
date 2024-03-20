

@extends('layouts.app')
@section('main')

<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="h3">Cities</h1>
            </div>
            <div class="col">
                Total : {{  $collection->count() }}
            </div>
            <div class="col text-end">
                <a href="{{ route('city.create') }}" class="btn btn-sm btn-dark">Create</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">

            {!! display_bootstrap_alerts() !!}
            
            <thead>
                <tr>
                    <th>no</th>
                    <th>name</th>
                    <th>coordinates</th>
                    <th>country</th>
                    <th>shops</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collection as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>🏙️ {{ $item->name }}</td>
                    <td><a href="{{ $item->coordinatesUrl }}" target="_blank">{{ $item->coordinates }}</a></td>
                    <td><img src="{{ $item->country->flag }}" alt="flag picture" class="img-fluid" width="34px"> {{ $item->country->name }}</td>
                    <td>{{ $item->shops->count() }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#showModal{{$item->id}}" role="button">show</a>
                        <a href="{{ route('city.edit', $item->id) }}" class="btn btn-sm btn-outline-dark">edit</a>
                        <a href="#" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}" role="button">delete</a>
                    </td>
                </tr>

                @include('city.modals.delete')
                @include('city.modals.show')

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop



@extends('layouts.app')
@section('main')

<div class="card mb-4">
    <div class="card-header">
        <h1 class="h3">Countries</h1>
        <div class="row">
            <div class="col">
                Total : {{  $collection->count() }}
            </div>
        </div>
    </div>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>no</th>
                    <th>name</th>
                    <th>cities</th>
                    <th>shops</th>
                    <th>updated_at</th>
                    <th>created_at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collection as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><img src="{{ $item->flag }}" alt="flag picture" class="img-fluid" width="34px"> {{ $item->name }}</td>
                    <td>{{ $item->cities->count() }}</td>
                    <td>{{ $item->shops->count() }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('country.show', $item->id) }}" class="btn btn-sm btn-outline-dark">show</a>
                        <a href="{{ route('country.edit', $item->id) }}" class="btn btn-sm btn-outline-dark">edit</a>
                        <a href="{{ route('country.delete', $item->id) }}" class="btn btn-sm btn-outline-dark">delete</a>
                    </td>
                </tr>                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

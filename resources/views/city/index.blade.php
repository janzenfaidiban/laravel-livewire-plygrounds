

@extends('layouts.app')
@section('main')

<div class="card mb-4">
    <div class="card-header">
        <h1 class="h3">Cities</h1>
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
                    <th>country</th>
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
                    <td>🏙️ {{ $item->name }}</td>
                    <td>🗺️ {{ $item->country->name }}</td>
                    <td>{{ $item->shops->count() }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-outline-dark">show</a>
                        <a href="" class="btn btn-sm btn-outline-dark">edit</a>
                        <a href="" class="btn btn-sm btn-outline-dark">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

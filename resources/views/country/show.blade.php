

@extends('layouts.app')
@section('main')

<div class="card mb-4">
    <div class="card-header">
        <h1 class="h3">Show Country</h1>
    </div>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>no</th>
                    <th>name</th>
                    <th>slug</th>
                    <th>cities</th>
                    <th>shops</th>
                    <th>updated_at</th>
                    <th>created_at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <input type="text" value="{{ $item->name }}" class="form-control" disabled>
                    </td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->cities->count() }}</td>
                    <td>{{ $item->shops->count() }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-outline-dark">edit</a>
                        <a href="" class="btn btn-sm btn-outline-dark">delete</a>
                    </td>
                </tr>        
            </tbody>
        </table>
    </div>
</div>

@stop

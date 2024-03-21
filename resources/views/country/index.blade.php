@extends('layouts.app')
@section('main')

    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1 class="h3">Countries</h1>
                </div>
                <div class="col">
                    Total : {{  $collection->count() }}
                </div>
                <div class="col text-end">
                    <a href="{{ route('country.create') }}" class="btn btn-sm btn-dark">Create</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            {!! display_bootstrap_alerts() !!}

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
                        <td><img src="@empty($item->flag) https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Indonesia.svg/800px-Flag_of_Indonesia.svg.png @else {{ $item->flag }} @endempty" alt="flag picture" class="img-fluid" width="34px"> {{ $item->name }}</td>
                        <td>{{ $item->cities->count() }}</td>
                        <td>{{ $item->shops->count() }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td class="d-flex gap-2">
                            <a href="#" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#showModal{{$item->id}}" role="button">show</a>
                            <a href="{{ route('country.edit', $item->id) }}" class="btn btn-sm btn-outline-dark">edit</a>
                            <a href="#" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}" role="button">delete</a>
                        </td>
                    </tr>

                    @include('country.modals.delete')
                    @include('country.modals.show')

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

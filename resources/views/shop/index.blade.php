

@extends('layouts.app')
@section('main')

<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="h3">Shops</h1>
            </div>
            <div class="col">
                Total : {{  $collection->count() }}
            </div>
            <div class="col text-end">
                <a href="{{ route('shop.create') }}" class="btn btn-sm btn-dark">Create</a>
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
                    <th>city</th>
                    <th>country</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collection as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>🛍️ {{ $item->name }}</td>
                    <td>🏙️ {{ $item->city->name }}</td>
                    <td><img src="{{ $item->city->country->flag }}" alt="flag picture" class="img-fluid" width="34px"> {{ $item->city->country->name }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#showModal{{$item->id}}" role="button">show</a>
                        <a href="{{ route('shop.edit', $item->id) }}" class="btn btn-sm btn-outline-dark">edit</a>
                        <a href="#" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}" role="button">delete</a>
                    </td>
                </tr>

                @include('shop.modals.delete')
                @include('shop.modals.show')
                
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@stop

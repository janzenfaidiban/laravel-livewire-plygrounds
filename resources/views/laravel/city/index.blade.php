

@extends('layouts.app')
@section('main')
<form class="">
    <div class="row d-flex justify-content-end">
        <div class="col-6">
            <div class="input-group mb-3">
                <input type="text"  value="{{$request->s ?? ''}}" class="form-control icon" name="s" placeholder="Search city" >
            </div>
        </div>
    </div>
</form>
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
                <a href="{{ route('cities.create') }}" class="btn btn-sm btn-dark">Create</a>
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
                @forelse ($collection as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>🏙️ {{ $item->name }}</td>
                        <td><a href="{{ $item->coordinatesUrl }}" target="_blank">{{ $item->coordinates }}</a></td>
                        <td><img src="{{ $item->country->flag }}" alt="flag picture" class="img-fluid" width="34px"> {{ $item->country->name }}</td>
                        <td>{{ $item->shops->count() }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#showModal{{$item->id}}" role="button">show</a>
                            <a href="{{ route('cities.edit', $item->id) }}" class="btn btn-sm btn-outline-dark">edit</a>
                            <a href="#" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}" role="button">delete</a>
                        </td>

                        @include('laravel.city.modals.delete')
                        @include('laravel.city.modals.show')
                    </tr>

                @empty
                <tr>
                    <td colspan="7" class="text-center">
                        <div class="flex justify-content-center">
                            <img width="20%" src="{{asset('assets/undraw_no_data.svg')}}" alt="">
                            <p>No data</p>
                        </div>
                    </td>
                </tr>

                @endforelse

            </tbody>
        </table>
    </div>
</div>
@stop

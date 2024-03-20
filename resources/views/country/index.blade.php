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
                            <a href="#" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#showModal" role="button">show</a>
                            <a href="{{ route('country.edit', $item->id) }}" class="btn btn-sm btn-outline-dark">edit</a>
                            <a href="#" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteModal" role="button">delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ $item->flag }}" alt="flag picture" class="img-fluid" width="34px"> {{ $item->name }}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">no, don't do it</button>
            {!! Form::open(['route' => ['country.delete', $item->id]]) !!} 
                @csrf @method('DELETE') 
                {!! Form::submit('yes, delete!', array('class' => 'btn btn-sm btn-outline-danger' )) !!}
            {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>

    <!-- Modal Show -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="showModalLabel">Show</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td>Flag</td>
                        <td><img src="@empty($item->flag) https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Indonesia.svg/800px-Flag_of_Indonesia.svg.png @else {{ $item->flag }} @endempty" alt="flag picture" class="img-fluid" width="54px"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td class="fw-bold">{{ $item->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Created at</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated at</td>
                        <td>{{ $item->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
    </div>

@stop

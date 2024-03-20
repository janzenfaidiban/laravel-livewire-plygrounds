<div class="card mb-4" x-data="{openModalEdit: false, openModalCreate: false}">
    <div class="card-header">
        <h1 class="h3">Countries</h1>
        <div class="row">
            <div class="col">
                Total : {{  $collection->count() }}
            </div>
            <div class="col text-end">
                <button wire:click="clear"  x-on:click="openModalCreate = true" class="btn btn-sm btn-dark">Create</button>
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
                        <button
                            x-on:click="
                                openModalEdit = true
                                $wire.dispatch('edit-country', { data: {{json_encode($item)}} })
                            "
                            class="btn btn-sm btn-outline-dark"
                        >
                            edit
                        </button>
                        <button wire:click.prevent="delete({{$item->id}})" class="btn btn-sm btn-outline-dark">delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Edit -->
    <x-modalAlpine modalName="openModalEdit" title="Edit">

        <form wire:submit="edit" class="max-w-sm mx-auto">
            <div class="mb-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input wire:model="name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required />
            </div>
            <div class="mb-3">
                <label for="flag" class="block mb-2 text-sm font-medium text-gray-900">Flag</label>
                <input wire:model="flag" type="text" id="flag" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required />
            </div>
            <button type="submit" x-on:click="openModalEdit=false" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </x-modalAlpine>

    <!-- Modal Create -->
    <x-modalAlpine modalName="openModalCreate" title="Add New Country">
        <form wire:submit="create" class="max-w-sm mx-auto">
            <div class="mb-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input wire:model="name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required />
            </div>
            <div class="mb-3">
                <label for="flag" class="block mb-2 text-sm font-medium text-gray-900">Flag</label>
                <input wire:model="flag" type="text" id="flag" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required />
            </div>
            <button type="submit" x-on:click="openModalCreate=false" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </x-modalAlpine>
</div>

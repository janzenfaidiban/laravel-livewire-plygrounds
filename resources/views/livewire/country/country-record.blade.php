<div>
    <form class="max-w-md ml-auto mb-4">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input wire:model.live="search" type="search" id="default-search" class="block w-full py-2 px-6 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search country..." required />
        </div>
    </form>

    <div class="card mb-4" x-data="{openModalView: false, openModalDelete: false}">
        <div class="card-header flex justify-between items-center">
            <h1 class="h3">Countries</h1>
            <div>
                Total : {{  $collection->count() }}
            </div>
            <div>
                <button wire:click="dispatch('action', { value: {{json_encode(true)}}, type: 'Create' })" class="btn btn-sm btn-dark">Create</button>
            </div>
        </div>
        <div class="card-body">

            @if(session()->has('alert-message'))
                @php
                    $type = session('alert-message')['type'];
                    $class = $type == 'danger' ? '!text-red-800 !border-red-300 !bg-red-50' : '';
                @endphp
                <x-alert message="{{ session('alert-message')['message'] }}" class="{{$class}}" />
            @endif

                @if($collection->count() > 0)
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
                                    <td>
                                        <div class="flex gap-2">
                                            <img src="{{ $item->flag }}" alt="flag picture" class="img-fluid" width="34px"> {{ $item->name }}
                                        </div>
                                    </td>
                                    <td>{{ $item->cities->count() }}</td>
                                    <td>{{ $item->shops->count() }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <button
                                            @click="openModalView = true"
                                            wire:click="dispatch('modal', { data:{{json_encode($item)}} })" class="btn btn-sm btn-outline-dark"
                                        >
                                            show
                                        </button>
                                        <button
                                            wire:click="dispatch('action', { value: {{json_encode(true)}}, type: 'Edit', data:{{json_encode($item)}} })"
                                            class="btn btn-sm btn-outline-dark"
                                        >
                                            edit
                                        </button>
                                        <button
                                            class="btn btn-sm btn-outline-dark"
                                            @click="openModalDelete = true"
                                            wire:click="dispatch('modal', { data:{{json_encode($item)}} })"
                                        >
                                            delete
                                        </button>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="flex justify-center">
                        <img class="w-56" src="{{asset('assets/undraw_no_data.svg')}}" alt="">
                    </div>
                @endif
        </div>

        <!-- Modal View -->
        <x-modalAlpine modalName="openModalView" title="Show">
            <div class="px-2 mt-4 mb-4">
                <img class="max-w-52" src="{{$country['flag'] ?? ''}}" alt="">
                <div class="mt-3">
                    <p>Name: {{$country['name'] ?? ''}}</p>
                    <p>Created at: {{isset($country['created_at']) ? \Carbon\Carbon::parse($country['created_at'])->diffForHumans() : ''}}</p>
                    <p>Updated at: {{isset($country['created_at']) ? \Carbon\Carbon::parse($country['created_at'])->diffForHumans() : ''}}</p>
                </div>
            </div>
        </x-modalAlpine>

        <!-- Modal Delete -->
        <x-modalAlpine modalName="openModalDelete" title="Are you sure?">
            <div class="flex gap-1 items-center mb-4 px-2 mt-4">
                <img class="max-w-12" src="{{$country['flag'] ?? ''}}" alt="">
                <p>{{$country['name'] ?? ''}}</p>
            </div>

            <hr>
            <div class="mt-3 flex justify-end gap-2 px-2 mb-4">
                <button @click="openModalDelete=false" class="bg-gray-500 text-white rounded-md py-1 px-2 text-sm">no, don't do it</button>
                <button @click="openModalDelete=false" wire:click.prevent="delete({{$country['id'] ?? null}})" class="bg-white text-red-500 hover:!bg-red-500 hover:text-white border-1 border-red-500 rounded-md py-1 px-2 text-sm">yes, delete!</button>
            </div>
        </x-modalAlpine>
    </div>
</div>

<div>

    <div x-data="{openModalView: false, openModalDelete: false}">
        <div class="card g-base-100 shadow-xl">
            <div class="card-body">
                <div class="flex justify-between">
                    <!-- card-title -->
                    <h2 class="card-title text-6xl font-bold">Cities</h2>
                    
                    <div class="flex justify-end gap-9">
                        <!-- create button -->
                        <div>
                            <button wire:click="dispatch('action', { value: {{json_encode(true)}}, type: 'Create' })" class="btn btn-neutral"><i class="fa-regular fa-plus"></i> Create</button>
                        </div>
                        
                        <!-- search input -->
                        <div>
                            <label class="input input-bordered flex items-center gap-2">
                                <input type="text" class="grow" placeholder="Search" wire:model.live="search" />
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
                            </label>
                        </div>
                    </div> <!-- flex end -->

                </div> <!-- flex end -->

                @if(session()->has('alert-message'))
                    @php
                        $type = session('alert-message')['type'];
                        $class = $type == 'danger' ? '!text-red-800 !border-red-300 !bg-red-50' : '';
                    @endphp
                    <x-alert message="{{ session('alert-message')['message'] }}" class="{{$class}}" />
                @endif

                {{-- @if($collection->count() > 0) --}}
                @if($collection->items() > 0)

                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Shops</th>
                                <th>Country</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>🛍️ {{ $item->name }}</td>
                                    <td>🏙️ {{ $item->shops->count() }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <img src="{{ $item->country->flag }}" alt="flag picture" class="" width="34px"> {{ $item->country->name }}
                                        </div>
                                    </td>
                                    <td class="flex justify-end gap-2">
                                        <button
                                            @click="openModalView = true"
                                            wire:click="dispatch('modal', { data:{{json_encode($item)}} })" class="btn btn-sm btn-neutral"
                                        >
                                            <i class="fa-solid fa-file-lines"></i>
                                        </button>
                                        <button
                                            wire:click="dispatch('action', { value: {{json_encode(true)}}, type: 'Edit', data:{{json_encode($item)}} })"
                                            class="btn btn-sm btn-outline"
                                        >
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button
                                            class="btn btn-sm btn-outline"
                                            @click="openModalDelete = true"
                                            wire:click="dispatch('modal', { data:{{json_encode($item)}} })"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                @else
                    <div class="flex justify-center">
                        <img class="w-56" src="{{ asset('assets/undraw_no_data.svg') }} " alt="undraw_no_data.svg">
                    </div>
                @endif

                {{ $collection->links() }}

            </div> <!-- card-body end -->
        </div> <!-- card end -->

        <!-- Modal Show -->
        <x-modalAlpine modalName="openModalView" title="Show detail data">
            <div class="flex flex-row gap-2">
                <div class="basis-1/4"><img src="{{$country['flag'] ?? ''}}" class="w-full" /></div>
                <div class="basis-1/8">
                    <ul>
                        <li>
                            City Name : <span class="font-bold">{{ $city['name'] ?? ''}}</span>
                        </li>
                        <li>
                            Country : <span class="font-bold">{{ $city['country']['name'] ?? ''}}</span>
                        </li>
                        <li>
                            Shops : <span class="font-bold">{{ $city['shop']['count'] ?? ''}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </x-modalAlpine>

        <!-- Modal Delete -->
        <x-modalAlpine modalName="openModalDelete" title="Delete?">
            <div class="p-4 text-center">
                <svg class="mx-auto mb-4 text-gray-700 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-700">Are you sure you want to delete this item?</h3>
                <button @click="openModalDelete=false" wire:click.prevent="delete({{$city['id'] ?? null}})" data-modal-hide="popup-modal" type="button" class="btn btn-neutral">
                    Yes, I'm sure
                </button>
                <button @click="openModalDelete=false" data-modal-hide="popup-modal" type="button" class="btn btn-error">No, cancel</button>
            </div>
        </x-modalAlpine>
    </div>
</div>

<x-app-layout>

    <div class="card g-base-100 shadow-xl">
        <div class="card-body">
            <div class="flex justify-between">
                <!-- card-title -->
                <h2 class="card-title text-6xl font-bold">Shops</h2>

                <div class="flex justify-end gap-9">
                    <!-- create button -->
                    <div>
                        <a href="{{ route('shops.create') }}" class="btn btn-neutral"><i class="fa-regular fa-plus"></i> Create</a>
                    </div>

                    <!-- search input -->
                    <form>
                        <label class="input input-bordered flex items-center gap-2">
                            <input type="text" class="grow" placeholder="Search" value="{{$request->s ?? ''}}" name="s"/>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
                        </label>
                    </form>
                </div> <!-- flex end -->

            </div> <!-- flex end -->

            {!! display_bootstrap_alerts() !!}

            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>name</th>
                            <th>Shop Tags</th>
                            <th>city</th>
                            <th>country</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($collection as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>🛍️ {{ $item->name }}</td>
                        <td class="flex gap-2">

                            @php
                                $item->tags()->each(function ($tag){
                                    echo '<a href="" class="btn btn-sm">'.$tag->name.'</a>';
                                });
                            @endphp

                        </td>
                        <td>🏙️ {{ $item->city->name }}</td>
                        <td><img src="{{ $item->city->country->flag }}" alt="flag picture" class="img-fluid" width="34px"> {{ $item->city->country->name }}</td>
                            <td class="flex justify-end gap-2">
                                <a href="#"  class="btn btn-sm btn-neutral" data-bs-toggle="modal" data-bs-target="#showModal{{$item->id}}" role="button"><i class="fa-solid fa-file-lines"></i></a>
                                <a href="{{ route('shops.edit', $item->id) }}" class="btn btn-sm btn-outline"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#deleteModal{{$item->id}}" class="btn btn-sm btn-ghost" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}" role="button"><i class="fa-solid fa-trash"></i></a>
                        </td>

                        @include('laravel.shop.modals.delete')
                        @include('laravel.shop.modals.show')
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

            {{ $collection->links() }}

        </div>
    </div>

</x-app-layout>

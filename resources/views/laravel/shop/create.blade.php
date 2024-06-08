
{{-- <x-app-layout>
<div class="card mb-4">
    <div class="card g-base-100 shadow-xl">
        <div class="card g-base-100 shadow-xl">
            <div class="card-body">

                <div class="flex justify-between mb-9">
                    <h2 class="card-title text-6xl font-bold">Create Shop</h2>
                    <div>
                        <a href="{{ route('laravel.shops') }}" class="btn btn-outline"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                    </div>
                </div>

        {!! display_bootstrap_alerts() !!}

        {!! Form::open(['route' => 'shops.store', 'method' => 'post']) !!}

            <div class="form-group mb-3">
                {!! Form::label('name', 'Name', array('class' => 'form-label'))  !!}
                {!! Form::text('name', old('name' ?? ''),
                        [
                            'class' => 'form-control',
                            'placeholder' => 'shop name'
                        ]
                    )
                !!}
                <small class="text-muted fst-italic">
                    <code>Papua Mart</code>
                </small>
            </div> <!-- form-group end -->

            <div class="form-group mb-3">
                {!! Form::submit('submit', array( 'class' => 'btn btn-dark' )) !!}
                {!! Form::reset('reset', array( 'class' => 'btn btn-outline-dark' )) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>

</x-app-layout> --}}

<x-app-layout>
    <div class="card g-base-100 shadow-xl">
        <div class="card g-base-100 shadow-xl">
            <div class="card-body">

                <div class="flex justify-between mb-9">
                    <h2 class="card-title text-6xl font-bold">Create Shop</h2>
                    <div>
                        <a href="{{ route('laravel.shops') }}" class="btn btn-outline"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                    </div>
                </div>

                {!! display_bootstrap_alerts() !!}

                {!! Form::open(['route' => 'shops.store', 'method' => 'post']) !!}

                <label class="input input-bordered flex items-center gap-2">
                    Shop Name :
                    {!! Form::text('name', old('name' ?? ''),
                            [
                                'class' => 'grow',
                                'placeholder' => 'shop name',
                                'wire:model' => 'name'

                            ]
                        )
                    !!}
                </label> <!-- form-group end -->
                <small class="text-muted fst-italic block">
                    <i>
                        <code>Papua Mart</code>
                    </i>
                </small>

                <label class="form-control w-full mt-4">
                    {!! Form::select('city_id', App\Models\City::orderBy('name')->pluck('name', 'id'), null,
                            [
                                'class' => 'select select-bordered',
                                'placeholder' => 'Select a city',
                                'wire:model' => 'city_id'


                            ]
                        )
                    !!}
                </label>

                <div class="form-control mt-4">
                    <x-input-tags :tags="$tags" />
                </div>

                <div class="mt-4">
                    {{ Form::button('<i class="fa-solid fa-floppy-disk"></i> Save', ['type' => 'submit', 'class' => 'btn btn-neutral'] )  }}
                    {{ Form::button('<i class="fa-solid fa-rotate"></i> Reset', ['type' => 'reset', 'class' => 'btn btn-outline'] )  }}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</x-app-layout>


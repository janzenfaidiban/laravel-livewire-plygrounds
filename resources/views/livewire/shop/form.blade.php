<div>
    <div class="card g-base-100 shadow-xl">
        <div class="card-body">

            <div class="flex justify-between mb-9">
                <h2 class="card-title text-6xl font-bold">{{$formType}} Shop</h2>
                <div>
                    <button wire:click="dispatch('clear')" class="btn btn-outline"><i class="fa-solid fa-arrow-left-long"></i> Back</button>
                </div>
            </div>

            {!! display_bootstrap_alerts() !!}

            {!! Form::open(['wire:submit' => $formType === 'Create' ? 'save' : 'edit']) !!}

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
                    <x-input-tags :tags="$tags" event="tagsAdded" />
                </div>

                <div class="mt-4">
                    {{ Form::button('<i class="fa-solid fa-floppy-disk"></i> Save', ['type' => 'submit', 'class' => 'btn btn-neutral'] )  }}
                    {{ Form::button('<i class="fa-solid fa-rotate"></i> Reset', ['type' => 'reset', 'class' => 'btn btn-outline'] )  }}
                </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>

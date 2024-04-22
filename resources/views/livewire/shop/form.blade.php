<div>
    <div class="card g-base-100 shadow-xl">
        <div class="card-body">

            <div class="flex justify-between mb-9">
                <h2 class="card-title text-6xl font-bold">{{$formType}} Shop</h2>
                <div>
                    <button wire:click="dispatch('clear')" class="btn btn-outline"><i class="fa-solid fa-arrow-left-long"></i> Back</button>
                </div>
            </div>

            {!! Form::open(['wire:submit' => $formType === 'Create' ? 'save' : 'edit']) !!}


                <div
                    x-data=" {selectOpen: false, search:'', selectedId: '', selectedName: @entangle('selectedCountry'), data: @entangle('countries'), result: []}"
                    @click.away="selectOpen = false"
                >
                    <x-select-search :name="'country'" event="countryId" label="Country"/>
                </div>
                <span class="text-red-500">@error('country') {{ $message }} @enderror</span>

                @if(count($cities) > 0)
                    <div
                        x-data=" {selectOpen: false, search:'', selectedId: '', selectedName: @entangle('selectedCity'), data: @entangle('cities'), result: []}"
                        @click.away="selectOpen = false"
                        class="mt-2"
                    >
                        <x-select-search :name="'cityId'" event="cityId" :data="$cities" label="City" />
                    </div>
                    <span class="text-red-500">@error('cityId') {{ $message }} @enderror</span>
                @endif

                <label class="input input-bordered flex items-center gap-2 mt-4">
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
                <span class="text-red-500">@error('name') {{ $message }} @enderror</span>

                <div class="form-control mt-4">
                    <x-input-tags :tags="$tags" event="tagsAdded" :shopTags="$shopTags" />
                </div>
                <span class="text-red-500">@error('tagsAdded') {{ $message }} @enderror</span>

                <div class="mt-4">
                    {{ Form::button('<i class="fa-solid fa-floppy-disk"></i> Save', ['type' => 'submit', 'class' => 'btn btn-neutral'] )  }}
                    {{ Form::button('<i class="fa-solid fa-rotate"></i> Reset', ['type' => 'reset', 'class' => 'btn btn-outline'] )  }}
                </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>

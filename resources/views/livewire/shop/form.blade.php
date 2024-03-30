<div>
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1 class="h3">{{$formType}} Shop</h1>
                </div>
                <div class="col text-end">
                    <button wire:click="dispatch('clear')" class="btn btn-sm btn-dark">Back</button>
                </div>
            </div>
        </div>
        <div class="card-body">

            {!! display_bootstrap_alerts() !!}

            {!! Form::open(['wire:submit' => $formType === 'Create' ? 'save' : 'edit']) !!}

                <div class="form-group mb-3">
                    {!! Form::label('name', 'Name', array('class' => 'form-label'))  !!}
                    {!! Form::text('name', old('name' ?? ''),
                            [
                                'class' => 'form-control',
                                'placeholder' => 'shop name',
                                'wire:model' => 'name'

                            ]
                        )
                    !!}


                    <small class="text-muted fst-italic">
                        <code>Papua Mart</code>
                    </small>
                </div> <!-- form-group end -->

                <div class="form-group mb-3">
                    {!! Form::label('name', 'City', array('class' => 'form-label'))  !!}
                    {!! Form::select('city_id', App\Models\City::orderBy('name')->pluck('name', 'id'), null,
                            [
                                'class' => 'form-control',
                                'placeholder' => 'Select a city',
                                'wire:model' => 'city_id'


                            ]
                        )
                    !!}
                </div>

            <div class="form-group mb-3">
                <x-input-tags :tags="$tags" event="tagsAdded" />
            </div>

                <div class="form-group mb-3">
                    {!! Form::submit('submit', array( 'class' => 'btn btn-outline-dark' )) !!}
                    {!! Form::reset('reset', array( 'class' => 'btn btn-outline-dark' )) !!}
                </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>

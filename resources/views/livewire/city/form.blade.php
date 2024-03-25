<div>
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1 class="h3">{{$formType}} City</h1>
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
                            'placeholder' => 'city name',
                            'wire:model' => 'name'
                        ]
                    )
                !!}
                <small class="text-muted fst-italic">
                    <code>Port Numbay</code>
                </small>
            </div> <!-- form-group end -->

            

            <div class="form-group mb-3">
                {!! Form::label('name', 'Country', array('class' => 'form-label'))  !!}
                {!! Form::select('country_id', App\Models\Country::orderBy('name')->pluck('name', 'id'), null,
                        [
                            'class' => 'form-control',
                            'placeholder' => 'Select a country',
                            'wire:model' => 'country_id'


                        ]
                    )
                !!}
            </div>

            <div class="form-group mb-3">
                {!! Form::submit('submit', array( 'class' => 'btn btn-dark bg-[#212529]' )) !!}
                {!! Form::reset('reset', array( 'class' => 'btn btn-outline-dark' )) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>

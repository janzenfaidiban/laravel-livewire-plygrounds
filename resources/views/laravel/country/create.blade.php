<x-app-layout>
    <div class="card g-base-100 shadow-xl">
        <div class="card g-base-100 shadow-xl">
            <div class="card-body">
    
                <div class="flex justify-between mb-9">
                    <h2 class="card-title text-6xl font-bold">Create Country</h2>
                    <div>
                        <a href="{{ route('laravel.countries') }}" class="btn btn-outline"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                    </div>
                </div>
    
                {!! display_bootstrap_alerts() !!}
        
                {!! Form::open(['route' => 'laravel.countries.store', 'method' => 'post']) !!}

                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Country Name :
                        {!! Form::text('name', old('name' ?? ''),
                                [
                                    'class' => 'grow',
                                    'placeholder' => 'United States'
                                ]
                            )
                        !!}
                    </label> <!-- form-group end --> 

                    <div class="input input-bordered flex items-center gap-2">
                        Flag :
                        {!! Form::text('flag', old('flag' ?? ''),
                                  array(
                                    'class' => 'grow',
                                    'placeholder' => 'https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg',
                                ))
                        !!}
                    </div> <!-- form-group end -->
                    <small class="text-muted fst-italic block">
                        <i>
                            <code>https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg</code>
                        </i>
                    </small>

                    <div class="mt-4">
                        {{ Form::button('<i class="fa-solid fa-floppy-disk"></i> Save', ['type' => 'submit', 'class' => 'btn btn-neutral'] )  }}
                        {{ Form::button('<i class="fa-solid fa-rotate"></i> Reset', ['type' => 'reset', 'class' => 'btn btn-outline'] )  }}
                    </div>

                {!! Form::close() !!}
        
            </div>
        </div>
    </div>
</x-app-layout>

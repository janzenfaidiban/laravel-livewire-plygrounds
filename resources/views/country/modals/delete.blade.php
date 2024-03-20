<div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="@empty($item->flag) https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Indonesia.svg/800px-Flag_of_Indonesia.svg.png @else {{ $item->flag }} @endempty" alt="flag picture" class="img-fluid" width="34px"> {{ $item->name }}
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">no, don't do it</button>
        {!! Form::open(['route' => ['country.delete', $item->id]]) !!} 
            @csrf @method('DELETE') 
            {!! Form::submit('yes, delete!', array('class' => 'btn btn-sm btn-outline-danger' )) !!}
        {!! Form::close() !!}
        </div>
    </div>
    </div>
</div>
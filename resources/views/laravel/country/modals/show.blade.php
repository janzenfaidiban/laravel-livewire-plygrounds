

    <div class="modal fade" id="showModal{{$item->id}}" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="showModalLabel">Show</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div>
                        <img src="@empty($item->flag) https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Indonesia.svg/800px-Flag_of_Indonesia.svg.png @else {{ $item->flag }} @endempty" alt="flag picture" class="img-fluid" width="200px">
                    </div>
                </div>
                <div class="mb-3">
                    <div><span>Name: </span> {{ $item->name ?? '' }}</div>
                    <div><span>Created at: </span> {{ $item->created_at ?? '' }}</div>
                    <div><span>Updated at: </span> {{ $item->updated_at ?? '' }}</div>
                </div>
            </div>
        </div>
        </div>
    </div>
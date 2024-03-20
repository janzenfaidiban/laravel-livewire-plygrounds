
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="showModalLabel">Show</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td>Flag</td>
                        <td><img src="@empty($item->flag) https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Indonesia.svg/800px-Flag_of_Indonesia.svg.png @else {{ $item->flag }} @endempty" alt="flag picture" class="img-fluid" width="54px"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td class="fw-bold">{{ $item->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Created at</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated at</td>
                        <td>{{ $item->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
    </div>
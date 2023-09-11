<div wire:ignore.self class="modal fade" id="moveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ucwords($item_name)}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="submitMove">
                <div class="modal-body">
                    <div style="display: flex">
                        <div>
                            <label for="fname">Quantity </label>
                            <input type="text" wire:model.debounce.10ms="qty" @if($qtyNotModel < 1) disabled @else required @endif>
                            @if(session()->has('failed'))
                                <div class="alert alert-danger" style="width: 76%; margin-left: 25%; padding-bottom: 1%; padding-top: 1%; text-align:left; margin-top: 1%; ">
                                    {{ session('failed') }}
                                </div>
                            @elseif(session()->has('notNumber'))
                                <div class="alert alert-danger" style="width: 76%; margin-left: 25%; padding-bottom: 1%; padding-top: 1%; text-align:left; margin-top: 1%; ">
                                    {{ session('notNumber') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Move</button>
                </div>
            </form>
        </div>
    </div>
</div>

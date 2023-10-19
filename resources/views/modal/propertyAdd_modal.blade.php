<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="propAdd_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;"><h5>{{ucwords($itemName)}}</h5></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="propButton"></button>
            </div>
            <div class="modal-body" >
                <form wire:submit.prevent="submit">
                    <input type="text" id="request-searchInput" class="form-control" wire:model="prop_id" hidden>
                    <div class="mb-2" style="width: 70%; margin-left: 15%;">
                        <input type="text" id="request-searchInput" class="form-control" wire:model="item" placeholder="Item Description"  required>
                    </div>
                    <div class="mb-2" style="width: 70%; margin-left: 15%; margin-top: 2%;">
                        <input type="text" id="request-searchInput" class="form-control" wire:model="qty" placeholder="Quantity"  required>
                        @error('qty') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2" style="width: 70%; margin-left: 15%; margin-top: 2%;">
                        <input type="text" id="request-searchInput" class="form-control" wire:model="unit" placeholder="Unit"  required>
                    </div>
                    <div class="mb-2" style="width: 70%; margin-left: 15%; margin-top: 2%;" hidden>
                        <input type="text" id="request-searchInput" class="form-control" wire:model="date" placeholder="Date Acquired">
                    </div>
                    <div class="mb-2" style="display: flex; width: 70%; margin-left: 15%; margin-top: 2%;">
                        <label style="font-size: 14px; margin-top: 5px;">Amount:</label>
                        <input style="margin-left: 5px;" type="text" id="request-searchInput" class="form-control" wire:model="amount" placeholder="Amount">
                        @error('amount') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2" style="width: 70%; margin-left: 15%; margin-top: 2%;">
                        <input type="text" id="request-searchInput" class="form-control"  wire:model="teacher_name"  disabled>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%; margin-top: 2%;" onclick="clickPropAdd()">ADD</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="edit_request_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">Input Item Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="requestBtnClose"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="edit_submit">
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Item Description" wire:model="item_name" required>
                    </div>
                    @error('item_name') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Quantity" wire:model="quantity">
                    </div>
                    @error('quantity') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Unit" wire:model="unit" >
                    </div>
                    @error('unit') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Unit Cost" wire:model="unit_cost">
                    </div>
                    @error('unit_cost') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Total Cost" wire:model="total_cost" >
                    </div>
                    @error('total_cost') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Purpose" wire:click="not_item_click" wire:model="purpose" @if(count($request_data) > 0) disabled @endif>
                    </div>
                        <div style="margin-left: 15%;">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="item_type" value="consumable">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Consumable
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="item_type" value="non-consumable">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Non-Consumable
                                </label>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary" onclick="requestBtnClose()" style="width: 60%; margin-left: 20%; margin-top: 3%;">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

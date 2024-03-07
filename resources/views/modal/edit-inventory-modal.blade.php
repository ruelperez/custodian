<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="edit_inventory_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">Input Item Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="edit_submit">
                    @if(session()->has('dataUpdated'))
                        <div class="alert alert-success" style="width: 60%; ">
                            {{ session('dataUpdated') }}
                        </div>
                    @elseif(session()->has('errorUpdated'))
                        <div class="alert alert-danger" style="width: 60%; ">
                            {{ session('errorUpdated') }}
                        </div>
                    @endif
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Item Description" wire:model="item_name" required>
                    </div>
                    @error('item_name') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Quantity" wire:model="quantity" required>
                    </div>
                    @error('quantity') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Unit" wire:model="unit" >
                    </div>
                    @error('unit') <span style="color: red">{{ $message }}</span> @enderror
{{--                    <div class="mb-3" style="width: 70%; margin-left: 15%;">--}}
{{--                        <input type="text" class="form-control" placeholder="Inventory Item No." wire:model="inventory_number" >--}}
{{--                    </div>--}}
{{--                    @error('inventory_number') <span style="color: red">{{ $message }}</span> @enderror--}}
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
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="item_type" value="sets">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Sets
                            </label>
                        </div>
                    </div>

                        <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%; margin-top: 5%;">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

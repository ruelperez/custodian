<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="add_order_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">Input Item Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <form wire:submit.prevent="submit_order">
                    <div class="mb-2" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Supplier" wire:model.debounce.1ms="supplier" @if($clickUpdate == 1) disabled @endif>
                    </div>
                    @error('supplier') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Address" wire:model="address" @if($clickUpdate == 1) disabled @endif>
                    </div>
                    @error('address') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="TIN" wire:model="tin" @if($clickUpdate == 1) disabled @endif>
                    </div>
                    @error('tin') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="P.O Number" wire:model="po_num" @if($clickUpdate == 1) disabled @endif>
                    </div>
                    @error('po_num') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Mode of Procurement" wire:model="mode" @if($clickUpdate == 1) disabled @endif>
                    </div>
                    @error('mode') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Total" wire:model="total" disabled>
                    </div>
                    @error('total') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Total Amount In Words" wire:model="total_words" @if($clickUpdate == 1) disabled @endif>
                    </div>
                    @error('total_words') <span style="color: red">{{ $message }}</span> @enderror
                    @if($clickUpdate == 0)
                    <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%;">UPDATE</button>
                    @else
                        <button type="button" class="btn btn-warning" wire:click="clickEdit" style="width: 60%; margin-left: 20%; color: white">EDIT</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

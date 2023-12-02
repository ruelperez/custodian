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
                        <input type="text" class="form-control" placeholder="Supplier" wire:model.debounce.1ms="supplier" required>
                    </div>
                    @error('supplier') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Address" wire:model="address">
                    </div>
                    @error('address') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="TIN" wire:model="tin" >
                    </div>
                    @error('tin') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="P.O Number" wire:model="po_number">
                    </div>
                    @error('po_number') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Date" wire:model="date" >
                    </div>
                    @error('date') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Mode of Procurement" wire:model="mode" >
                    </div>
                    @error('mode') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Total" wire:model="total" >
                    </div>
                    @error('total') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Total Amount In Words" wire:model="total_words" >
                    </div>
                    @error('total_words') <span style="color: red">{{ $message }}</span> @enderror
                    <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%;">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>

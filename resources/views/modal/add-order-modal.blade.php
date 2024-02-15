<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="add_order_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">Input Item Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <form wire:submit.prevent="submit_order">
                    <div style="display: flex; width: 100%;">
                        <div style="margin-left: 3%;">
                            <div class="mb-3" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="Supplier" wire:model.debounce.1ms="supplier" @if($clickUpdate == 1) disabled @endif>
                            </div>
                            @error('supplier') <span style="color: red">{{ $message }}</span> @enderror
                            <div class="mb-3" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="Address" wire:model="address" @if($clickUpdate == 1) disabled @endif>
                            </div>
                            @error('address') <span style="color: red">{{ $message }}</span> @enderror
                            <div class="mb-3" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="TIN" wire:model="tin" @if($clickUpdate == 1) disabled @endif>
                            </div>
                            @error('tin') <span style="color: red">{{ $message }}</span> @enderror
                            <div class="mb-3" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="P.O Number" wire:model="po_num" @if($clickUpdate == 1) disabled @endif>
                            </div>
                            @error('po_num') <span style="color: red">{{ $message }}</span> @enderror
                            <div class="mb-3" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="Mode of Procurement" wire:model="mode" @if($clickUpdate == 1) disabled @endif>
                            </div>
                            @error('mode') <span style="color: red">{{ $message }}</span> @enderror
                            <div class="mb-3" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="Total" wire:model="total" disabled>
                            </div>
                            @error('total') <span style="color: red">{{ $message }}</span> @enderror
                        </div>
                        <div style="margin-left: 5%;">
                            <div class="mb-3" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="Name of Chief Accountant Head" wire:model="chief" @if($clickUpdate == 1) disabled @endif>
                            </div>
                            @error('chief') <span style="color: red">{{ $message }}</span> @enderror
                            <div class="mb-3" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="Place of Delivery" wire:model="place_delivery" @if($clickUpdate == 1) disabled @endif>
                            </div>
                            @error('place_delivery') <span style="color: red">{{ $message }}</span> @enderror
                            <div class="mb-3" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="Date of Delivery" wire:model="date_delivery" @if($clickUpdate == 1) disabled @endif>
                            </div>
                            @error('date_delivery') <span style="color: red">{{ $message }}</span> @enderror
                            <div class="mb-3" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="Delivery Term" wire:model="delivery_term" @if($clickUpdate == 1) disabled @endif>
                            </div>
                            @error('delivery_term') <span style="color: red">{{ $message }}</span> @enderror
                            <div class="mb-3" style="width: 100%;">
                                <input  type="text" class="form-control" placeholder="Payment Term" wire:model="payment_term" @if($clickUpdate == 1) disabled @endif>
                            </div>
                            @error('payment_term') <span style="color: red">{{ $message }}</span> @enderror
                            <div class="mb-3" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="Total Amount In Words" wire:model="total_words" @if($clickUpdate == 1) disabled @endif>
                            </div>
                            @error('total_words') <span style="color: red">{{ $message }}</span> @enderror
                        </div>
                    </div>
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

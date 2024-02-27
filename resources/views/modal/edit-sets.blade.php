<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="edit_inventory_modal_sets">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">Input Item Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="edit_submit_sets">
                    @if(session()->has('dataUpdated_sets'))
                        <div class="alert alert-success" style="width: 60%; ">
                            {{ session('dataUpdated_sets') }}
                        </div>
                    @elseif(session()->has('errorUpdated_sets'))
                        <div class="alert alert-danger" style="width: 60%; ">
                            {{ session('errorUpdated_sets') }}
                        </div>
                    @endif
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="PPE (Item Description)" wire:model="item_name">
                        @error('item_name') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Description" wire:model="components">
                        @error('components') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Property No." wire:model="prop_num" >
                        @error('prop_num') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Reference" wire:model="reference" >
                        @error('reference') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Quantity" wire:model="quantity" >
                        @error('quantity') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Office" wire:model="office" >
                        @error('office') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Date" wire:model="date" >
                        @error('date') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%; margin-top: 5%;">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

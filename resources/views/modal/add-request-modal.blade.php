<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="add_request_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">Input Item Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <form wire:submit.prevent="submit">
                    @if(session()->has('dataAdded'))
                        <div class="alert alert-success" style="width: 60%; ">
                            {{ session('dataAdded') }}
                        </div>
                    @elseif(session()->has('dataError'))
                        <div class="alert alert-danger" style="width: 60%; ">
                            {{ session('dataError') }}
                        </div>
                    @endif
                    <div class="mb-2" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Item Description" wire:click="click_input_item" wire:model.debounce.1ms="item_name" required>
                    </div>
                    @error('item_name') <span style="color: red">{{ $message }}</span> @enderror
                    @if($basis != 0)
                        <div style="width: 66%; margin-left: 14%; position: absolute;">
                            <ul class="list-group">
                                @php $h=0; @endphp
                                @foreach($result as $data)
                                    @if($h < 6)
                                        <li class="list-group-item btn" style="text-align: left; background-color: #E6E6FA" wire:click="click_item({{$data->id}})">
                                            {{$data->item_name}}
                                        </li>
                                    @endif
                                    @php $h++; @endphp
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Quantity" wire:click="not_item_click" wire:model="quantity" required>
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
                    <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%;">ADD</button>
                </form>
            </div>
        </div>
    </div>
</div>

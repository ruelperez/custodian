<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="add_prepare_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">Input Prepare Material</h5>
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
                    <div style="display: flex">
                        <div class="mb-2" style="width: 70%; margin-left: 15%;" >
                            <input @if($receiver_disable == 1) disabled @endif type="text" class="form-control" placeholder="Name of Receiver" wire:click="click_input_items" wire:model.debounce.1ms="receiver" required>
                        </div>
                        @if($basin == 0)
                            <div style="margin-left: 2%; margin-top: 6px;">
                                <i class="fa-solid fa-pen-to-square" style="cursor: pointer" wire:click="click_input_items"></i>
                            </div>
                        @endif
                    </div>

                    @if($basin != 0)
                        <div style="width: 66%; margin-left: 14%; position: absolute;">
                            <ul class="list-group">
                                @php $h=0; @endphp
                                @foreach($results as $data)
                                    @if($h < 6)
                                        <li class="list-group-item btn" style="text-align: left; background-color: #E6E6FA" wire:click="click_items({{$data->id}})">
                                            {{$data->fullname}}
                                        </li>
                                    @endif
                                    @php $h++; @endphp
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div style="display: flex">
                        <div class="mb-2" style="width: 70%; margin-left: 15%;">
                            <input @if($item_disable == 1) disabled @endif type="text" class="form-control" placeholder="Item Description" wire:click="click_input_item" wire:model.debounce.1ms="item_name" required>
                        </div>
                        @if($basis == 0)
                            <div style="margin-left: 2%; margin-top: 6px;">
                                <i class="fa-solid fa-pen-to-square" style="cursor: pointer" wire:click="click_input_item"></i>
                            </div>
                        @endif
                    </div>

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
                    @if($item_type == "sets")
                        <div class="mb-3" style="width: 70%; margin-left: 15%;">
                            <input type="text" class="form-control" placeholder="Unit" wire:click="not_item_click" wire:model="unit">
                            @error('unit') <span style="color: red">{{ $message }}</span> @enderror
                        </div>
                    @else
                        <div class="mb-3" style="width: 70%; margin-left: 15%;">
                            <input type="text" class="form-control" placeholder="Quantity" wire:click="not_item_click" wire:model="quantity">
                            @error('quantity') <span style="color: red">{{ $message }}</span> @enderror
                        </div>
                    @endif
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Serial No." wire:click="not_item_click" wire:model="serial">
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%;">ADD</button>
                </form>
            </div>
        </div>
    </div>
</div>

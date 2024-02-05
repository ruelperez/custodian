<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="add_property">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel">Input Prepare Material</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                @if(session()->has('dataAdded'))
                    <div class="alert alert-success" style="width: 100%; ">
                        {{ session('dataAdded') }}
                    </div>
                @elseif(session()->has('dataError'))
                    <div class="alert alert-danger" style="width: 100%; ">
                        {{ session('dataError') }}
                    </div>
                @elseif(session()->has('different'))
                    <div class="alert alert-danger" style="width: 100%; ">
                        {{ session('different') }}
                    </div>
                @endif
                <label>ICS No.</label>
                <u>{{$ics}}</u>
                <div style="display: flex; width: 90%; margin-left: 5%; text-align: center; cursor: pointer; margin-top: 3%;">
                    <div class="py-1" style="width: 50%; background-color: #61676A; color: white" id="icsBtn" onclick="ics()">
                        ICS
                    </div>
                    <div class="py-1" style="width: 50%;background-color: #86969D; color: white" id="parBtn" onclick="par()">
                        PAR
                    </div>
                </div>
                <div id="ics">
                    <form wire:submit.prevent="submit">
                        <div style="display: flex; margin-top: 3%;">
                            <div class="mb-2" style="width: 70%; margin-left: 15%; " >
                                <input @if(session()->has('different')) style="border: solid red 1px;" @endif  id="prepareInputTeacher" @if($receiver_disable == 1) disabled @endif type="text" class="form-control" placeholder="Name of Receiver" wire:click="click_input_items" wire:model="receiver" required>
                            </div>
                            @if($basin == 0)
                                <div style="margin-left: 2%; margin-top: 6px;">
                                    <i class="fa-solid fa-pen-to-square" style="cursor: pointer" wire:click="click_input_items"></i>
                                </div>
                            @endif
                        </div>

                        @if($basin != 0)
                            <div style="width: 66%; margin-left: 14%; position: absolute;" id="prepareSuggestTeacher">
                                <ul class="list-group">
                                    @php $h=0; @endphp
                                    @foreach($results as $data)
                                        @if($h < 6)
                                            <li class="list-group-item btn" style="text-align: left; background-color: #E0FFFF" wire:click="click_items({{$data->id}})">
                                                {{$data->fullname}}
                                            </li>
                                        @endif
                                        @php $h++; @endphp
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3" style="width: 70%; margin-left: 15%;">
                            <input type="text" class="form-control" placeholder="Position" wire:click="not_item_click" wire:model="position">
                            @error('position') <span style="color: red">{{ $message }}</span> @enderror
                        </div>
                        <div style="display: flex">
                            <div class="mb-2" style="width: 70%; margin-left: 15%;">
                                <input id="prepareInputItem" @if($item_disable == 1) disabled @endif type="text" class="form-control" placeholder="Item Description" wire:click="click_input_item" wire:model="item_name" required>
                                @if($mas == 1) <i style="color: green"> (Returned)</i> @endif
                            </div>
                            @if($basis == 0)
                                <div style="margin-left: 2%; margin-top: 6px;">
                                    <i class="fa-solid fa-pen-to-square" style="cursor: pointer" wire:click="click_input_item"></i>
                                </div>
                            @endif
                        </div>

                        @if($basis != 0)
                            <div style="width: 66%; margin-left: 14%; position: absolute;" id="prepareSuggestItem">
                                <ul class="list-group">
                                    @php $h=0; @endphp
                                    @foreach($result as $data)
                                        @if($h < 6)
                                            @if($data->item_status == null or $data->item_status == "")
                                                <li class="list-group-item btn" style="display: flex; text-align: left; background-color: #E0FFFF" wire:click="click_item({{$data->id}},'{{$data->item_status}}')">
                                                    {{$data->item_name}}
                                                    <p style="margin-left: auto">qty : {{$data->quantity}}</p>
                                                </li>
                                            @elseif($data->item_status == "returned")
                                                <li class="list-group-item btn" style="display: flex; text-align: left; background-color: #E0FFFF" wire:click="click_item({{$data->id}},'{{$data->item_status}}')">
                                                    {{$data->item_name}} ({{$data->item_status}})
                                                    <p style="margin-left: auto">qty : {{$data->quantity}}</p>
                                                </li>
                                            @endif
                                        @endif
                                        @php $h++; @endphp
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3" style="width: 70%; margin-left: 15%;">
                            <input type="text" class="form-control" placeholder="Unit" wire:model="unit" disabled>
                            @error('unit') <span style="color: red">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3" style="width: 70%; margin-left: 15%;">
                            <input type="text" class="form-control" placeholder="Quantity" wire:click="not_item_click" wire:model="quantity">
                            @error('quantity') <span style="color: red">{{ $message }}</span> @enderror
                            @if(session()->has('insufficient'))
                                <div class="alert alert-danger" style="width: 100%; padding-top: 2px; padding-bottom: 2px; margin-top: 1%;">
                                    {{ session('insufficient') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3" style="width: 70%; margin-left: 15%;">
                            <input type="text" class="form-control" placeholder="Unit Cost" wire:click="not_item_click" wire:model="unit_cost">
                            @error('unit_cost') <span style="color: red">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3" style="width: 70%; margin-left: 15%;">
                            <input type="text" class="form-control" placeholder="Total Cost" wire:click="not_item_click" wire:model="total_cost">
                            @error('total_cost') <span style="color: red">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3" style="width: 70%; margin-left: 15%;">
                            <input type="text" class="form-control" placeholder="Inventory No." wire:click="not_item_click" wire:model="serial" disabled>
                        </div>
                        <input type="text" hidden wire:model="unit_cost">
                        <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%;">ADD</button>
                    </form>
                </div>
                <div id="spinner" class="spinner-border spin" style="width: 70px; height: 70px; font-size: 25px; margin-left: 43%; margin-top: 20%; display: none;">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div id="par" style="display: none;">
                    <h1>PAR FORM HERE</h1>
                </div>
            </div>
        </div>
    </div>
</div>

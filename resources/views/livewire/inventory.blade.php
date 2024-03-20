<div>
    @include('modal.add-inventory-modal')
    @include('modal.edit-inventory-modal')
    @include('modal.edit-sets')
    <h5 style="text-align: left; margin-top: 3%;">Inventory</h5>
    <div style="display: flex; margin-top: 3%;">
        <div style="width: 12%;">
            <button style="margin-top: 2%; margin-bottom: 2%; margin-left: 1%; width: 100%;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_inventory_modal">Add</button>
        </div>
        <div style="width: 25%; margin-left: 3%;">
            <input type="text" placeholder="Search Item" wire:model.debounce.1ms="searchInput" style="width: 100%; padding: 1%; margin-top: 2%;">
        </div>
        <div style="margin-left: 3%;">
            <select class="form-select" aria-label="Default select example" style="margin-top: 2%;" wire:model="selectItemType">
                <option value="consumable">Consumable</option>
                <option value="non-consumable">Non-consumable</option>
                <option value="sets">Sets</option>
            </select>
        </div>
    </div>
    <table class="table table-hover" style="margin-top: 0.5%; width: 96.5%; margin-bottom: 2%;">
        <thead>
        @if($selectItemType != "sets")
            <tr class="inv">
                <th>
                    Desc
                </th>
                <th style="text-align: left">
                    Quantity
                </th>
                <th>
                    Unit Cost
                </th>
                <th>
                    Unit
                </th>
                <th>
                    Item No.
                </th>
                <th colspan="2">
                    Action
                </th>
            </tr>
        @else
            <tr class="inv">
                <th style="text-align: left">
                    PPE (Item Description)
                </th>
                <th style="text-align: left">
                    Description
                </th>
                <th>
                    Property No.
                </th>
                <th>
                    Reference
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Office/Officer
                </th>
                <th>
                    Date
                </th>
                <th colspan="2">
                    Action
                </th>
            </tr>
        @endif
        </thead>
        <tbody>
        @if(count($request_data) == 0)
            <tr style="text-align: center">
                <td colspan="7"> No Inventory Posted</td>
            </tr>
        @elseif($selectItemType == "sets")
            @php $q=0; @endphp
            @foreach($request_data as $data)
                @if($q < 10)
                    @if($data->item_status != "transferred")
                        <tr class="invs">
                            <td style="text-align: left">@if($data->item_status == "returned") {{ucfirst($data->item_name)}} ({{$data->inventory_number}}) @else {{ucfirst($data->item_name)}} @endif</td>
                            <td style="text-align: left">{{$data->components}}</td>
                            <td >{{$data->prop_num}}</td>
                            <td >{{$data->reference}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>{{$data->office}}</td>
{{--                            <td>{{$data->date}}</td>--}}
                            <td><i class="fa-solid fa-pen-to-square" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#edit_inventory_modal_sets" wire:click="edit_sets({{$data->id}})"></i></td>
                            <td ><i class="fa-solid fa-trash" style="color: red; cursor: pointer;" onclick="delInv({{$data->id}})"></i></td>
                        </tr>
                    @endif
                @endif
                @php $q++; @endphp
            @endforeach
        @else
            @php $q=0; @endphp
            @foreach($request_data as $data)
                @if($q < 10)
                    @if($data->item_status != "transferred")
                        <tr class="invs">
                            <td style="text-align: left">@if($data->item_status == "returned") {{ucfirst($data->item_name)}} ({{$data->inventory_number}}) @else {{ucfirst($data->item_name)}} @endif</td>
                            <td style="text-align: left">{{$data->quantity}}</td>
                            <td >{{$data->unit_cost}}</td>
                            <td >{{$data->unit}}</td>
                            <td>{{$data->inventory_number}}</td>
                            <td><i class="fa-solid fa-pen-to-square" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#edit_inventory_modal" wire:click="edit({{$data->id}})"></i></td>
                            <td ><i class="fa-solid fa-trash" style="color: red; cursor: pointer;" onclick="delInv({{$data->id}})"></i></td>
                        </tr>
                    @endif
                @endif
                @php $q++; @endphp
            @endforeach
        @endif
        </tbody>
    </table>
</div>

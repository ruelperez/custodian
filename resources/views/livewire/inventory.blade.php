<div>
    @include('modal.add-inventory-modal')
    <h5 style="text-align: left; margin-top: 3%;">Inventory</h5>
    <div style="display: flex; margin-top: 3%;">
        <div style="width: 12%;">
            <button style="margin-top: 2%; margin-bottom: 2%; margin-left: 1%; width: 100%;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_inventory_modal">Add</button>
        </div>
        <div style="width: 25%; margin-left: 3%;">
            <input type="text" placeholder="Search Item" wire:model.debounce.1ms="searchInput" style="width: 100%; padding: 1%; margin-top: 2%;">
        </div>
    </div>
    @include('modal.edit-inventory-modal')
    <table class="table table-hover" style="margin-top: 0.5%; width: 96.5%; margin-bottom: 2%;">
        <thead>
            <tr class="inv">
                <th>
                    Desc
                </th>
                <th>
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
                <th>
                    Item Type
                </th>
                <th colspan="2">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @if(count($request_data) == 0)
            <tr style="text-align: center">
                <td colspan="7"> No Inventory Posted</td>
            </tr>

        @else
            @php $q=0; @endphp
            @foreach($request_data as $data)
                @if($q < 10)
                    @if($data->item_status != "transferred")
                        <tr class="invs">
                            <td>@if($data->item_status == "returned") {{ucfirst($data->item_name)}} ({{$data->item_status}}) @else {{ucfirst($data->item_name)}} @endif</td>
                            <td>{{$data->quantity}}</td>
                            <td >{{$data->unit_cost}}</td>
                            <td >{{$data->unit}}</td>
                            <td>{{$data->inventory_number}}</td>
                            <td>{{$data->item_type}}</td>
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

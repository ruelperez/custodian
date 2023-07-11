<div>
    @include('modal.add-inventory-modal')
    <h4 style="text-align: center; margin-top: 3%;">Inventory Custodian Slip</h4>
    <div style="display: flex; margin-top: 2%;">
        <div style="margin-left: 1%; width: 12%;">
            <button style="margin-top: 2%; margin-bottom: 2%; margin-left: 1%; width: 100%;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_inventory_modal">Add</button>
        </div>
        <div style="width: 25%; margin-left: 3%;">
            <input type="text" placeholder="Search" wire:model.debounce.1ms="searchInput" style="width: 100%; padding: 1%; margin-top: 2%;">
        </div>
        <div style="margin-left: 52%;">
            <i title="Save Form" class="fa-solid fa-file-arrow-down" style="font-size: 35px; cursor: pointer; color: #0a53be" onclick="window.location='{{ route('form-request.pdf',['request' => 'request'])}}'"></i>
        </div>
    </div>

    <div style="background-color: #F5F5F5; margin-left: 1%;width: 98%;border: solid lightslategray 1px; margin-top: 0.5%;">
       @include('modal.edit-inventory-modal')

        <table class="table table-hover" style="width: 100%; text-align: center">
            <thead>
            <tr>
                <th>
                    Quantity
                </th>
                <th>
                    Unit
                </th>
                <th>
                    Unit Cost
                </th>
                <th>
                    Total Cost
                </th>
                <th>
                    Description
                </th>
                <th>
                    Inventory Item No.
                </th>
                <th>
                    Estimated Useful Life
                </th>
                <th>
                    Item Type
                </th>
            </tr>

            </thead>
            <tbody>
            @if(count($request_data) == 0)
                <tr style="text-align: center">
                    <td colspan="7"> No Inventory Posted</td>
                </tr>

            @else
                @foreach($request_data as $data)
                    <tr>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->unit}}</td>
                        <td>{{$data->unit_cost}}</td>
                        <td>{{$data->total_cost}}</td>
                        <td>{{$data->item_name}}</td>
                        <td>{{$data->inventory_number}}</td>
                        <td>{{$data->estimated}}</td>
                        <td>{{$data->item_type}}</td>
                        <td><i class="fa-solid fa-pen-to-square" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#edit_inventory_modal" wire:click="edit({{$data->id}})"></i></td>
                        <td><i class="fa-solid fa-trash" style="color: red; cursor: pointer;" wire:click="delete({{$data->id}})"></i></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>

<div style="display: flex; margin-right: 2%;">
    <div style="margin-top: 2%;">
        <h5 style="margin-top: 3%; margin-left: 35%;">Purchase Request</h5>
        <div style="margin-left: 2%;margin-top: 5%; width: 100%;background-color:#F8F8FF; ">
            @if(session()->has('move'))
                <div class="alert alert-success" style="width: 80%; margin-left: 10%;text-align: center; margin-top: 1%; ">
                    {{ session('move') }}
                </div>
            @endif
            @if(session()->has('move_failed'))
                <div class="alert alert-danger" style="width: 10%; ">
                    {{ session('move_failed') }}
                </div>
            @endif
            <div style="display: flex; padding-top: 2%;">
                <button class="btn btn-success" style="margin-top: 1%; margin-left: 61%;" wire:click="move_to_backup">Move to Backup</button>
                <i title="Save Form" class="fa-solid fa-file-arrow-down" style="margin-left: 5%; margin-top: 1%; font-size: 30px; cursor: pointer; color: #0a53be" onclick="window.location='{{ route('form-request.pdf',['request' => 'request'])}}'"></i>
            </div>
            <span data-bs-toggle="modal" data-bs-target="#add_request_modal" wire:click="add_request_click" title="Add Item" class="bi bi-plus-circle-fill" style="font-size: 30px; color: rgb(165, 42, 42);margin-left: 45%; cursor: pointer;">+</span>
            @include('modal.add-request-modal')
            @include('modal.edit-request-modal')

            <table class="table table-hover" style="width: 100%; text-align: center; margin-top: 2%;">
                <thead>
                <tr style="background-color: #20B2AA; color: white">
                    <th>
                        Unit
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Quantity
                    </th>
                    <th>
                        Unit Cost
                    </th>
                    <th>
                        Total Cost
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
                        <td colspan="5"> No Request Posted</td>
                    </tr>

                @else
                    @foreach($request_data as $data)
                        <tr>
                            <td>{{$data->unit}}</td>
                            <td>{{$data->item_name}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>{{$data->unit_cost}}</td>
                            <td>{{$data->total_cost}}</td>
                            <td>{{$data->item_type}}</td>
                            <td><i class="fa-solid fa-pen-to-square" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#edit_request_modal" wire:click="edit({{$data->id}})"></i></td>
                            <td><i class="fa-solid fa-trash" style="color: red; cursor: pointer;" wire:click="delete({{$data->id}})"></i></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <i class="fa-solid fa-circle-arrow-right" style="font-size: 30px; margin-left: 2%; margin-top: 22%; cursor: pointer;" title="Forward to Purchase Order" onclick="forward()"></i>

    <div style="margin-top: 2%; margin-left: 0.5%;">
        <h5 style="margin-top: 3%; margin-left: 35%;">Purchase Order</h5>

        <div style="background-color:#F8F8FF; margin-left: 2%;margin-top: 5%; width: 96%;">
            @if(session()->has('transfer'))
                <div class="alert alert-success" style="width: 80%; margin-left: 10%;text-align: center; margin-top: 1%; ">
                    {{ session('transfer') }}
                </div>
            @endif
                @if(session()->has('failed'))
                    <div class="alert alert-danger" style="width: 10%; ">
                        {{ session('failed') }}
                    </div>
                @endif
            <div style="display: flex;">
                <button class="btn btn-success" style="margin-top: 3%; margin-left: 58%;" wire:click="move_to_inventory">Move to Inventory</button>
                <i title="Save Form" class="fa-solid fa-file-arrow-down" style="margin-left: 5%; margin-top: 1%; font-size: 30px; cursor: pointer; color: #0a53be" onclick="window.location='{{ route('form-order.pdf',['request' => 'order'])}}'"></i>
            </div>
            <div style="margin-left:45%;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <span data-bs-toggle="modal" data-bs-target="#add_request_modal" wire:click="add_order_click" title="Add Item" class="bi bi-plus-circle-fill" wire:loading.remove style="font-size: 30px; color: rgb(165, 42, 42);margin-left: 45%; cursor: pointer;">+</span>
                <table class="table table-hover" style="width: 100%; text-align: center;margin-top: 2%;" >
                    <thead>
                    <tr style="background-color: #20B2AA; color: white">
                        <th>
                            Unit
                        </th>
                        <th>
                           Description
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Unit Cost
                        </th>
                        <th>
                            Total Cost
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
                    @if(count($order_data) == 0)
                        <tr style="text-align: center">
                            <td colspan="5"> No Request Posted</td>
                        </tr>

                    @else
                        @foreach($order_data as $data)
                            <tr>
                                <td>{{$data->unit}}</td>
                                <td>{{$data->item_name}}</td>
                                <td>{{$data->quantity}}</td>
                                <td>{{$data->unit_cost}}</td>
                                <td>{{$data->total_cost}}</td>
                                <td>{{$data->item_type}}</td>
                                <td><i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#edit_request_modal" style="cursor: pointer;" wire:click="edit_order({{$data->id}})"></i></td>
                                <td><i class="fa-solid fa-trash" style="color: red; cursor: pointer;" wire:click="delete_order({{$data->id}})"></i></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
        </div>
    </div>
</div>
<script>
    function forward(){
        if (confirm("Are you sure to forward the data to purchase order???"))
            window.livewire.emit('move');
    }
</script>

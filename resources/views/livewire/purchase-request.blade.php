<div style="display: flex; width: 100%;">
    @include('modal.add-request-modal')
    @include('modal.edit-request-modal')
    @include('modal.add-order-modal')
    <div style="margin-top: 2%; width: 50%;">
        <h5 style="margin-top: 3%; margin-left: 35%;">Purchase Request</h5>
        <div style="margin-top: 5%; width: 100%;background-color:#F8F8FF;">
            @if(session()->has('move'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('move')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('move_failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('move_failed')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div style="display: flex;">
                @if(session()->has('dataUpdated'))
                    <div class="alert alert-success" style="width: 77%; padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 1%; ">
                        {{ session('dataUpdated') }}
                    </div>
                @elseif(session()->has('errorUpdated'))
                    <div class="alert alert-danger" style="width: 77%; padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 1%; ">
                        {{ session('errorUpdated') }}
                    </div>
                @endif
                <span data-bs-toggle="modal" data-bs-target="#add_request_modal" wire:click="add_request_click" title="Add Item" class="bi bi-plus-circle-fill" style="font-size: 30px; color: rgb(165, 42, 42); cursor: pointer; @if(session()->has('dataUpdated') or session()->has('errorUpdated')) margin-left: 3%; @else margin-left: 75%; @endif ">+</span>
                <i class="fa-solid fa-suitcase" title="Move to Backup" style="font-size: 20px; color: green; margin-left: 5%; margin-top: 3.5%; @if(count($request_data) != 0) cursor:pointer; @endif" @if(count($request_data) != 0) onclick="moveBup()" @endif></i>
                <i class="fa-solid fa-print" title="Print" wire:click="print" style="margin-left: 5%; margin-top: 3%; @if(count($request_data) == 0) pointer-events: none; @endif font-size: 23px; cursor: pointer; color: #0a53be" onclick="location.href = '/Dashboard/request-pdf/request';"></i>
            </div>
            <table class="table table-hover" style="width: 100%; text-align: center; margin-top: 1%;">
                <thead>
                <tr style="background-color: #20B2AA; color: white">
                    <th>
                        Desc
                    </th>
                    <th>
                        Unit
                    </th>
                    <th>
                        Qty
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
                        <td colspan="7"> No Request Posted</td>
                    </tr>

                @else
                    @foreach($request_data as $data)
                        <tr>
                            <td>{{$data->item_name}}</td>
                            <td>{{$data->unit}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>{{$data->unit_cost}}</td>
                            <td>{{$data->total_cost}}</td>
                            <td>{{$data->item_type}}</td>
                            <td><i class="fa-solid fa-pen-to-square" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#edit_request_modal" wire:click="edit({{$data->id}})"></i></td>
                            <td><i class="fa-solid fa-trash" style="color: red; cursor: pointer;" onclick="deleteItemRequest({{$data->id}})"></i></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <i class="fa-solid fa-circle-arrow-right" style="@if(count($request_data) == 0) pointer-events: none; @endif font-size: 30px; margin-left: 2%; margin-right: 2%; margin-top: 22%; cursor: pointer;" title="Forward to Purchase Order" onclick="forward()"></i>

    <div style="margin-top: 2%; width: 50%;">
        <h5 style="margin-top: 3%; margin-left: 35%;">Purchase Order</h5>

        <div style="background-color:#F8F8FF; margin-top: 5%; width: 100%;">
            @if(session()->has('transfer'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('transfer')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('failed')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div style="display: flex;">
                @if(session()->has('dataUpdatedOrder'))
                    <div class="alert alert-success" style="width: 77%; padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 1%; ">
                        {{ session('dataUpdatedOrder') }}
                    </div>
                @elseif(session()->has('errorUpdatedOrder'))
                    <div class="alert alert-danger" style="width: 77%; padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 1%; ">
                        {{ session('errorUpdatedOrder') }}
                    </div>
                @endif
                <span data-bs-toggle="modal" data-bs-target="#add_order_modal" wire:click="add_order_click" title="Add data" class="bi bi-plus-circle-fill" style=" font-size: 30px; color: rgb(165, 42, 42); cursor: pointer; margin-left: 75%; ">+</span>
                <i class="fa-solid fa-suitcase" title="Move to Inventory" style="@if(session()->has('dataUpdatedOrder') or session()->has('errorUpdatedOrder')) margin-left: 3%; @else margin-left: 5%; @endif font-size: 20px; color: green;  margin-top: 3.5%; @if(count($order_data) != 0) cursor:pointer; @endif" @if(count($order_data) != 0) onclick="moveInv()" @endif></i>
                <i class="fa-solid fa-print" title="Print" style="margin-left: 5%; margin-top: 3%; @if(count($order_data) == 0) pointer-events: none; @endif font-size: 23px; cursor: pointer; color: #0a53be" wire:click="prints" onclick="location.href = '/Dashboard/request-pdf/purchase/order';"></i>
            </div>
            <div style="margin-left:45%;">
                <span class="visually-hidden">Loading...</span>
            </div>
               <table class="table table-hover" style="width: 100%; text-align: center;margin-top: 1%;" >
                    <thead>
                    <tr style="background-color: #20B2AA; color: white">
                        <th>
                           Desc
                        </th>
                        <th>
                            Unit
                        </th>
                        <th>
                            Qty
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
                            <td colspan="7"> No Request Posted</td>
                        </tr>

                    @else
                        @foreach($order_data as $data)
                            <tr>
                                <td>{{$data->item_name}}</td>
                                <td>{{$data->unit}}</td>
                                <td>{{$data->quantity}}</td>
                                <td>{{$data->unit_cost}}</td>
                                <td>{{$data->total_cost = $data->quantity * $data->unit_cost}}</td>
                                <td>{{$data->item_type}}</td>
                                <td><i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#edit_request_modal" style="cursor: pointer;" wire:click="edit_order({{$data->id}})"></i></td>
                                <td><i class="fa-solid fa-trash" style="color: red; cursor: pointer;" onclick="deleteItemOrder({{$data->id}})"></i></td>
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

    function moveInv(){
        if(confirm("Click \"OK\" to transfer purchase order item to inventory")){
            window.livewire.emit('moveToInv');
        }
    }

    const searchInput = document.getElementById('request-searchInput');
    const searchSuggestions = document.getElementById('request-searchSuggestions');

    // Event listener for clicking outside of the search container
    document.addEventListener('click', function (event) {
        if (!searchInput.contains(event.target)) {
            window.livewire.emit('removeSuggest');
        }
    });


</script>

<div style="display: flex; width: 100%;">
    <div style="margin-top: 2%; width: 50%;">
        <h5 style="margin-top: 3%; margin-left: 35%;">Purchase Request</h5>
        <div style="margin-top: 5%; width: 100%;background-color:#F8F8FF;">
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
            <div style="display: flex;">
                <span data-bs-toggle="modal" data-bs-target="#add_request_modal" wire:click="add_request_click" title="Add Item" class="bi bi-plus-circle-fill" style="font-size: 30px; color: rgb(165, 42, 42); cursor: pointer; margin-left: 75%;">+</span>
                <i class="fa-solid fa-suitcase" title="move to backup" style="font-size: 20px; color: green; margin-left: 5%; margin-top: 3.5%; @if(count($request_data) != 0) cursor:pointer; @endif" @if(count($request_data) != 0) onclick="moveBup()" @endif></i>
                <i class="fa-solid fa-print" title="Save Form" style="margin-left: 5%; margin-top: 3%; @if(count($request_data) == 0) pointer-events: none; @endif font-size: 23px; cursor: pointer; color: #0a53be" onclick="location.href = '/Dashboard/request-pdf/request';"></i>
            </div>
            @include('modal.add-request-modal')
            @include('modal.edit-request-modal')

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
                            <td><i class="fa-solid fa-trash" style="color: red; cursor: pointer;" wire:click="delete({{$data->id}})"></i></td>
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
                <span data-bs-toggle="modal" data-bs-target="#add_request_modal" wire:click="add_order_click" title="Add Item" class="bi bi-plus-circle-fill" wire:loading.remove style="font-size: 30px; color: rgb(165, 42, 42);margin-left: 75%; cursor: pointer;">+</span>
                <i class="fa-solid fa-suitcase" title="move to inventory" style="font-size: 20px; color: green; margin-left: 5%; margin-top: 3.5%; @if(count($order_data) != 0) cursor:pointer; @endif" @if(count($order_data) != 0) onclick="moveInv()" @endif></i>
                <i class="fa-solid fa-print" title="Save Form" style="margin-left: 5%; margin-top: 3%; @if(count($order_data) == 0) pointer-events: none; @endif font-size: 23px; cursor: pointer; color: #0a53be" onclick="location.href = '/Dashboard/request-pdf/order';"></i>
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

    const searchInput = document.getElementById('request-searchInput');
    const searchSuggestions = document.getElementById('request-searchSuggestions');

    // Event listener for clicking outside of the search container
    document.addEventListener('click', function (event) {
        if (!searchInput.contains(event.target)) {
            window.livewire.emit('removeSuggest');
        }
    });

    // Function to show search suggestions
    function showSuggestions() {
        searchSuggestions.style.display = 'block';

    }

    // Function to hide search suggestions
    function hideSuggestions() {
        searchSuggestions.hide();
    }


</script>

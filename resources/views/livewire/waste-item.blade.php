<div>
    @include('modal.move-modal')
    <p style="text-align: left; margin-top: 3%; margin-left: 1%; font-size: 18px;">{{ucwords($teacher_name->fullname)}}</p>

    <div style="display: flex; width: 100%;">
        <div style="width: 47%;">
            <button class="btn btn-success" style="margin-left: 69.5%; margin-bottom: 2%;" onclick="moveToInventory()">Move to Inventory</button>
            <table class="table table-hover" style="width: 100%; text-align: center">
                <thead>
                    <tr class="inv">
                        <th>
                            Deployed Item
                        </th>
                        <th>
                            Qty
                        </th>
                        <th>
                            Unit
                        </th>
                        <th>
                            Serial No.
                        </th>
                        <th colspan="2">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deployed_data as $data)
                        @if($data->quantity < 1)

                        @elseif($data->item_type == "consumable")
                        @else
                            <tr style="cursor: pointer">
                                <td>
                                    {{$data->item_name}}
                                </td>
                                <td>
                                    @if($data->quantity > 0)
                                        {{$data->quantity}}
                                    @endif
                                </td>
                                <td>
                                    {{$data->unit}}
                                </td>
                                <td>
                                    {{$data->serial}}
                                </td>
                                <td>
                                    {{$data->created_at}}
                                </td>
                                <td>
                                    <i class="fa-solid fa-arrow-right" data-bs-toggle="modal" data-bs-target="#moveModal" wire:click="clickArrow({{$data->id}})"></i>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="width: 47%; margin-left: 3%;">
            @if(session()->has('successMove'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('successMove')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('failedMove'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('failedMove')}}
                </div>
            @endif
            <div style="display: flex; margin-left: 50%;">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        Print
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="background-color: silver">
                        <li><button class="dropdown-item" type="button" onclick="location.href = '/Dashboard/request-pdf/{{$receiver_name}}';">Request Form</button></li>
                        <li><button class="dropdown-item" type="button">PWMR Form</button></li>
                    </ul>
                </div>
                <div>
                    `            <button>Fininsh</button>
                </div>
            </div>
            <table class="table table-hover" style="width: 100%; text-align: center">
                <thead>
                <tr class="inv">
                    <th>
                        Deployed Item
                    </th>
                    <th>
                        Qty
                    </th>
                    <th>
                        Unit
                    </th>
                    <th>
                        Serial No.
                    </th>
                    <th>
                        Date
                    </th>
                    <th>

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($movedData as $data)
                    <tr style="cursor: pointer">
                        <td>
                            {{$data->item_name}}
                        </td>
                        <td>
                            {{$data->quantity}}
                        </td>
                        <td>
                            {{$data->unit}}
                        </td>
                        <td>
                            {{$data->serial}}
                        </td>
                        <td>
                            {{$data->created_at}}
                        </td>
                        <td>
                            <i class="fa-solid fa-xmark" onclick="removeItemMoved({{$data->id}},'{{$data->item_name}}')"></i>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

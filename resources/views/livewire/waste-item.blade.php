<div>
    @include('modal.move-modal')
    @include('modal.printRequestModal')
    @include('modal.printWasteModal')
    @if(session()->has('transfer'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('transfer')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <p style="text-align: left; @if(session()->has('transfer')) margin-top: 1%; @else margin-top: 3%; @endif margin-left: 1%; font-size: 18px;">{{ucwords($teacher_name->fullname)}}</p>

    <div style="display: flex; width: 100%;">
        <div style="width: 48%;">
            <button class="btn btn-success" style="margin-bottom: 1%; width: 40%;" onclick="moveToInventory()">Move to Inventory</button>
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
                            Serial
                        </th>
                        <th>
                            Date
                        </th>
                        <th>

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
        <div style="width: 48%; margin-left: auto;">
            @if(session()->has('successMove'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('successMove')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('failedMove'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('failedMove')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div style="display: flex; padding-right: 2%;">
                <div class="dropdown" style="margin-bottom: 1%;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" style="width: 150px;" @if(count($movedData) == 0) disabled @endif >
                        Print
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="background-color: silver;">
                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#printRequestModal">Request Form</button></li>
                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#printWasteModal">WMR Form</button></li>
                    </ul>
                </div>
                <div style="margin-left: auto; margin-top: 3%;">
                    <i class="fa-solid fa-suitcase" title="move to backup" style="font-size: 23px; color: green; @if(count($movedData) == 0) @else cursor:pointer; @endif " @if(count($movedData) == 0) @else onclick="clickTransfer()" @endif></i>
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
                        Serial
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
                            <i class="fa-solid fa-xmark" onclick="removeItemMoved({{$data->id}},'{{$data->item_name}}')" style="color: red"></i>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

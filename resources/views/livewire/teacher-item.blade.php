<div>
    @include('modal.stolen')
    @include('modal.not_stolen')
    @include('modal.add_teacher_item')
    @include('modal.not-active')
    @include('modal.not_lost')
    @include('modal.view_components')
    @include('modal.com_not_active')
    @include('modal.com_not_lost')
    @include('modal.com_not_stolen')
    <div style="margin-left: 1%; margin-top: 2%;">
        <p style="font-size: 18px;">{{ucwords($teacher_name)}}</p>
    </div>
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
        <div style=" margin-left: 10%;" id="plusIcon">
            <span data-bs-toggle="modal" data-bs-target="#addTeacherItem" wire:click="add_request_click" title="Add Item" class="bi bi-plus-circle-fill" style="font-size: 30px; color: rgb(165, 42, 42); cursor: pointer; ">+</span>
        </div>
        <div style="margin-left: 3%; margin-top: 1%;">
            <i title="Print" class="fa-solid fa-print" style="font-size: 25px; cursor: pointer; color: #0a53be" wire:click="print" onclick="location.href = '/Dashboard/request-pdf/teacher-form/{{$teacher_name}}';" wire:click="print"></i>
        </div>
        <div style="margin-left: 3%;">
            <div class="dropdown">
                <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-sort" style="font-size: 19px; cursor: pointer;"></i>
                    Sort
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" wire:click="clickSort1('item_name')" style="cursor: pointer;">Name @if($sort1 == "item_name") <b style="font-size: 30px; margin-left: 3%;">&middot;</b> @endif</a></li>
                    <li><a class="dropdown-item" wire:click="clickSort1('created_at')" style="cursor: pointer;">Date @if($sort1 == "created_at") <b style="font-size: 30px; margin-left: 3%;">&middot;</b> @endif</a></li>
                    <hr>
                    <li><a class="dropdown-item" wire:click="clickSort2('asc')" style="cursor: pointer;">Ascending @if($sort2 == "asc") <b style="font-size: 30px; margin-left: 3%;">&middot;</b> @endif</a></li>
                    <li><a class="dropdown-item" wire:click="clickSort2('desc')" style="cursor: pointer;">Descending @if($sort2 == "desc") <b style="font-size: 30px; margin-left: 3%;">&middot;</b> @endif</a></li>
                </ul>
            </div>
        </div>
        @if(count($checkData) > 0)
            <div style="width: 14%; margin-left: 3%;" id="returnId">
                <button class="btn btn-warning text-white" style="width: 100%;" onclick="clickRtrn('{{$teacher_name}}')">Return</button>
            </div>
        @endif
        <div style="@if(count($checkData) > 0) margin-left: 12%; @else margin-left: 29%; @endif ">
            <i class="fa-solid fa-circle" style="color: green;"></i> Active
        </div>
        <div style="margin-left: 2%;">
            <i class="fa-solid fa-circle" style="color: red;"></i> Return
        </div>
        <div style="margin-left: 2%;">
            <i class="fa-solid fa-circle" style="color: black;"></i> Stolen
        </div>
        <div style="margin-left: 2%;">
            <i class="fa-solid fa-circle" style="color: brown;"></i> Lost
        </div>
        <div style="margin-left: 2%;">
            <i class="fa-solid fa-circle" style="color: yellow;"></i> Transferred
        </div>
    </div>

    <div style="display: flex; width: 100%;">
        <div style="width: 90%; margin-left: 5%;">
            <table id="tbTeach" class="table table-hover" style="width: 100%; text-align: center">
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
                        Inventory No.
                    </th>
                    <th>
                        ICS No.
                    </th>
                    <th>
                        PAR No.
                    </th>
                    <th>
                        Property No.
                    </th>
                    <th colspan="2">
                        Date
                    </th>
                    <th>

                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($deployed_data as $data)
                        @if($data->item_type == "consumable")

                        @elseif($data->show_teachers == 1)
                            <tr onmouseover="teacherHover({{$data->id}})" onmouseout="teacherOut({{$data->id}})">
                                <td style="text-align: left">
                                    {{ucfirst($data->item_name)}}
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
                                    @if($data->transaction_name == "property_ics")
                                    {{$data->serial}}
                                    @endif
                                </td>
                                <td>
                                    @if($data->transaction_name == "property_ics")
                                        {{$data->ics}}
                                    @endif
                                </td>
                                <td>
                                    @if($data->transaction_name == "par" or $data->transaction_name == "property")
                                        {{$data->par_num}}
                                    @endif
                                </td>
                                <td>
                                    @if($data->transaction_name == "property" or $data->transaction_name == "par")
                                        {{$data->prop_num}}
                                    @endif

                                </td>
                                <td>
                                    {{$data->created_at}}
                                </td>

                                <td>
                                    @if($data->is_stolen == 1)
                                        <div class="form-check">
                                            <i class="fa-solid fa-circle" style="color: black;cursor: pointer" data-bs-toggle="modal" data-bs-target="#not_stolen" wire:click="not_stolen({{$data->id}})"></i>
                                        </div>
                                    @elseif($data->is_lost == 1)
                                        <div class="form-check">
                                            <i class="fa-solid fa-circle" style="color: brown;cursor: pointer" data-bs-toggle="modal" data-bs-target="#not_lost" wire:click="not_lost({{$data->id}})"></i>
                                        </div>
                                    @elseif($data->is_returned == 0)
                                        <div class="form-check">
                                            <input class="form-check-input" style="cursor: pointer;" type="checkbox" id="checkBox{{$data->id}}" onchange="teacherClick({{$data->id}})"  @if($data->item_id == '1') checked @endif>
                                            <i class="fa-solid fa-circle" style="color: green; cursor: pointer" data-bs-toggle="modal" data-bs-target="#not_active" wire:click="not_active({{$data->id}})"></i>
                                        </div>
                                    @else
                                        @foreach($invAll as $inv)
                                            @if($data->unit_cost <= 50000)
                                                @if($data->serial == $inv->inventory_number)
                                                    @if($inv->item_status == "returned")
                                                        <i class="fa-solid fa-circle" style="color: red; margin-left:50%;"></i>
                                                    @elseif($inv->item_status == "transferred")
                                                        <i class="fa-solid fa-circle" style="color: yellow; margin-left:50%;"></i>
                                                    @endif
                                                @endif
                                            @else
                                                @if($data->prop_num == $inv->inventory_number)
                                                    @if($inv->item_status == "returned")
                                                        <i class="fa-solid fa-circle" style="color: red; margin-left:50%;"></i>
                                                    @elseif($inv->item_status == "transferred")
                                                        <i class="fa-solid fa-circle" style="color: yellow; margin-left:50%;"></i>
                                                    @endif
                                                @endif
                                            @endif

                                        @endforeach
                                    @endif
                                </td>
                                <td style="text-align: left; width: 1%; padding-left: 0px;">
                                    @if($data->transaction_name == "property")
                                        <i title="view components" class="fa-solid fa-eye" style="font-size: 15px; cursor: pointer" data-bs-toggle="modal" data-bs-target="#view_components" wire:click="view_components('{{$data->prop_num}}','{{$data->item_name}}')"></i>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

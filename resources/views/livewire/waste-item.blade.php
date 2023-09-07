<div>
    @include('modal.move-modal')
    <h5 style="text-align: left; margin-top: 3%; margin-left: 1%;">Prepare Waste Material Request</h5>
    <h6 style="text-align: left; margin-top: 3%; margin-left: 1%;">{{ucwords($teacher_name->fullname)}}</h6>
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
    <div style="display: flex; width: 100%; border: solid black 1px;">
        <div style="width: 50%; border: solid black 1px;">
            <table>
                <thead>
                    <tr>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($deployed_data as $data)
                        @if($data->unit < 1 and $data->quantity < 1)

                        @else
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
                                    <i class="fa-solid fa-arrow-right" data-bs-toggle="modal" data-bs-target="#moveModal" wire:click="clickArrow({{$data->id}})"></i>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="width: 50%; border: solid black 1px;">
            <table>
                <thead>
                <tr>
                    <th>
                        Deployed Item
                    </th>
                    <th>
                        Serial No.
                    </th>
                    <th>
                        Date
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($movedData as $data)
                    <tr style="cursor: pointer" wire:mouseover="handleMouseOver({{$data->id}})" wire:mouseout="mouseOut">
                        <td>
                            {{$data->item_name}}
                        </td>
                        <td>
                            {{$data->serial}}
                        </td>
                        <td>
                            {{$data->created_at}}
                        </td>
                        @if($ff == 1)
                            @if($hover_id == $data->id)
                                <td wire:click="clickMoveBack({{$data->id}})">
                                    move back
                                </td>
                            @endif
                        @endif
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

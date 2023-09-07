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
            <table class="table table-hover" style="width: 100%; text-align: center">
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
                                    @if($data->quantity > 0)
                                        {{$data->quantity}}
                                    @endif
                                </td>
                                <td>
                                    @if($data->unit > 0)
                                        {{$data->unit}}
                                    @endif
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
            <table class="table table-hover">
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
                @foreach($movedData as $data)
                    <tr style="cursor: pointer">
                        <td>
                            <i class="fa-solid fa-arrow-left"></i>
                        </td>
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
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

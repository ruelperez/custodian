<div>
    <h5 style="text-align: left; margin-top: 3%; margin-left: 1%;">Prepare Waste Material Request</h5>
    <h6 style="text-align: left; margin-top: 3%; margin-left: 1%;">{{ucwords($teacher_name->fullname)}}</h6>
    <div style="display: flex; width: 100%; border: solid black 1px;">
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
                    @foreach($deployed_data as $data)
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
                                    <td wire:click="clickMove({{$data->id}})">
                                        move
                                    </td>
                               @endif
                            @endif
                        </tr>

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

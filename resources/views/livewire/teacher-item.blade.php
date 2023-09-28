<div>
    <div style="display: flex;">
        <div style="margin-left: 10%;">
            <p style="font-size: 18px;">{{ucwords($teacher_name)}}</p>
        </div>
        <div style="margin-left: 70%;">
            <i class="fa-solid fa-sort" style="font-size: 19px; cursor: pointer"></i>
        </div>
    </div>
    <div style="display: flex; width: 100%;">
        <div style="width: 80%; margin-left: 10%;">
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
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

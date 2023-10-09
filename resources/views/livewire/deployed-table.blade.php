<div>
    <div style="margin-left: 15%;width: 70%;margin-top: 2%; margin-bottom: 2%;">
        <div style="display: flex;">
            <div>
                <h5 style="text-align: center; margin-top: 3%;">{{ucwords($teacherName)}}</h5>
            </div>
            <div style="margin-left: auto">
                <i title="Print" class="fa-solid fa-print" style="font-size: 25px; cursor: pointer; color: #0a53be" onclick="window.location='{{ route('form-inventory.pdf',['request' => 'inventory'])}}'"></i>
            </div>
        </div>
        <table class="table table-hover" style="width: 100%; text-align: center; margin-top: 1%;">
            <thead>
            <tr class="inv">
                <th>
                    Item Name
                </th>
                <th>
                    Qty
                </th>
                <th>
                    Unit
                </th>
                <th>
                    Item Type
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
            @if(count($deployed_data) > 0)
                @foreach($deployed_data as $preps)
                    <tr class="invs">
                        <td>
                            {{$preps->item_name}}
                        </td>
                        <td>
                            {{$preps->quantity}}
                        </td>
                        <td>
                            {{$preps->unit}}
                        </td>
                        <td>
                            {{$preps->item_type}}
                        </td>
                        <td>
                            {{$preps->serial}}
                        </td>
                        <td>
                            {{$preps->created_at}}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">
                        No Data Posted
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

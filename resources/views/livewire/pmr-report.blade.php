<div>
    @if($clickBk == 0)
        <i class="fa-solid fa-backward" style="font-size: 20px; cursor: pointer; margin-top: 3%; margin-bottom: 2%;" onclick="clickBk6()" wire:click="clickBack"></i>
    @endif
    <h5 style="margin-left: 1%;">ICS Report</h5>
    <div style="display: flex;">
        <div style="margin-top: 4%; margin-left: 15%;">
            <h5>{{$dataDate}}</h5>
        </div>
        <div style="margin-left: 58%;margin-top: 4%;">
            <i title="Print" class="fa-solid fa-print" style="font-size: 25px; cursor: pointer; color: #0a53be" onclick="location.href = '/Dashboard/request-pdf/ics-form/{{$dataDate}}';"></i>
        </div>
    </div>

    <div style="margin-left: 15%;width: 70%; margin-top: 0.5%; margin-bottom: 2%;">
        <table class="table table-hover" style="width: 100%; text-align: center">
            <thead>
            <tr class="inv">
                <th>
                    Item Name
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Unit
                </th>
                <th>
                    Inventory No.
                </th>
                <th>
                    Receiver
                </th>
                <th>
                    Time Created
                </th>
            </tr>
            </thead>

            <tbody>
            @if(count($request_data) > 0)
                @foreach($request_data as $preps)
                    <tr class="invs">
                        <td>
                            {{ucwords($preps->item_name)}}
                        </td>
                        <td>
                            {{$preps->quantity}}
                        </td>
                        <td>
                            {{$preps->unit}}
                        </td>
                        <td>
                            {{$preps->serial}}
                        </td>
                        <td>
                            {{$preps->receiver}}
                        </td>
                        <td>
                            {{$preps->created_at}}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">
                        No Data Posted
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

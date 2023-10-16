<div>
    <i class="fa-solid fa-backward" style="font-size: 20px; cursor: pointer; margin-top: 3%; margin-bottom: 2%;" onclick="clickBack50()"></i>
    <h5 style="margin-left: 1%;">Request Report</h5>
    <div style="display: flex;">
        @if(session()->has('moveSuccess'))
            <div class="alert alert-success" style="width: 56%; padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 1%; margin-left: 15%; ">
                {{ session('moveSuccess') }}
            </div>
        @elseif(session()->has('moveFailed'))
            <div class="alert alert-danger" style="width: 56%; padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 1%; margin-left: 15%; ">
                {{ session('moveFailed') }}
            </div>
        @endif
        <div style="margin-top: 4%; @if(session()->has('moveSuccess') or session()->has('moveFailed')) margin-left: 5%; @else margin-left: 76%; @endif">
            <i class="fa-solid fa-suitcase" title="move to purchase request" onclick="clickMove()" style="font-size: 23px; color: green; margin-left: 5%;cursor:pointer;"></i>
        </div>
        <div style="margin-left: 3%;margin-top: 4%;">
            <i title="Print" class="fa-solid fa-print" style="font-size: 25px; cursor: pointer; color: #0a53be" onclick="location.href = '/Dashboard/request-pdf/request-form/{{$prNo}}';"></i>
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
                    Unit Cost
                </th>
                <th>
                    Total Cost
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
                            {{$preps->unit_cost}}
                        </td>
                        <td>
                            {{$preps->total_cost}}
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

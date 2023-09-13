<div>
    @if($clickBk == 0)
        <i class="fa-solid fa-backward" style="font-size: 20px; cursor: pointer; margin-top: 3%;" onclick="clickBk()" wire:click="clickBack"></i>
    @endif
    <h5 style="margin-left: 1%;">Request Report</h5>
    <div style="display: flex;">
        <div style="margin-left: 37%;margin-top: 4%;">
            <i title="Save Form" class="fa-solid fa-file-arrow-down" style="font-size: 30px; cursor: pointer; color: #0a53be" onclick="window.location='{{ route('form-inventory.pdf',['request' => 'inventory'])}}'"></i>
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
                            {{$preps->item_name}}
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

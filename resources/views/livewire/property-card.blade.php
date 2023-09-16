<div>
    @if($clickBk == 0)
        <i class="fa-solid fa-backward" style="font-size: 20px; cursor: pointer; margin-top: 3%; margin-bottom: 2%;" onclick="clickBk5()" wire:click="clickBack"></i>
    @endif
    <h5 style="margin-left: 1%;">Property Card</h5>
    <div style="display: flex; margin-top: 3%;">
        <div style="margin-left: 40%;">
            <h4 style="text-align: center; margin-top: 3%;">{{ucwords($itemName)}}</h4>
        </div>
        <div style="margin-left: 22%; margin-top: 2%;">
            <i title="Save Form" class="fa-solid fa-print" style="font-size: 25px; cursor: pointer; color: #0a53be" onclick="window.location='{{ route('form-inventory.pdf',['request' => 'inventory'])}}'"></i>
        </div>
    </div>

    <div style="margin-left: 15%;width: 70%;margin-top: 1%; margin-bottom: 2%;">
        <table class="table table-hover" style="width: 100%; text-align: center">
            <thead>
            <tr class="inv">
                <th>
                    Receipt Qty.
                </th>
                <th>
                    Qty
                </th>
                <th>
                    Office
                </th>
                <th>
                    Balance
                </th>
                <th>
                    Date
                </th>
            </tr>
            </thead>

            <tbody>
            @if(count($stockcard_data) > 0)
                @foreach($stockcard_data as $preps)
                    <tr class="invs">
                        <td>
                            {{$preps->receiptQty}}
                        </td>
                        <td>
                            {{$preps->quantity}}
                        </td>
                        <td>
                            {{$preps->receiver}}
                        </td>
                        <td>
                            {{$preps->receiptQty - $preps->quantity}}
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

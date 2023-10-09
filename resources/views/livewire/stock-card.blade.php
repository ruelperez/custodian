<div>
    @if($clickBk == 0)
        <i class="fa-solid fa-backward" style="font-size: 20px; cursor: pointer; margin-top: 3%; margin-bottom: 2%;" onclick="clickBk4()" wire:click="clickBack"></i>
    @endif
    <h5 style="margin-left: 1%;">Stock Card</h5>

        <div style="margin-left: 15%;width: 70%;margin-top: 2%; margin-bottom: 2%;">
            <div style="display: flex;">
                <div>
                    <h5>{{ucwords($itemName)}}</h5>
                </div>
                <div style="margin-left: auto;">
                    <i title="Print" class="fa-solid fa-print" style="font-size: 25px; cursor: pointer; color: #0a53be" onclick="window.location='{{ route('form-inventory.pdf',['request' => 'inventory'])}}'"></i>
                </div>
            </div>
            <table class="table table-hover" style="width: 100%; text-align: center; margin-top: 1%;">
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

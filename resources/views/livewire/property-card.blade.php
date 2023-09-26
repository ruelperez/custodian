<div>
    @include('modal.property-table')
    @include('modal.propertyAdd_modal')
    @if($clickBk == 0)
        <i class="fa-solid fa-backward" style="font-size: 20px; cursor: pointer; margin-top: 3%; margin-bottom: 2%;" onclick="clickBk5()" wire:click="clickBack"></i>
    @endif
    <h5 style="margin-left: 1%;">Property Card</h5>
    <div style="display: flex; margin-top: 3%; margin-left: 15%;width: 70%;">
        <div>
            <h5>{{ucwords($itemName)}}</h5>
        </div>
    </div>

    <div style="margin-left: 15%;width: 70%; margin-bottom: 2%; margin-top: 1%;">
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
                <th>

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
                        <td>
                            <p style="color: green; cursor: pointer" data-bs-toggle="modal" data-bs-target="#propTable_modal" wire:click="clickView('{{$preps->receiver}}','{{$preps->created_at}}',{{$preps->id}})">View</p>

{{--                                                        <p style="color: green; cursor: pointer" data-bs-toggle="modal" data-bs-target="#propAdd_modal" wire:click="clickView('{{$preps->receiver}}','{{$preps->created_at}}',{{$preps->id}})">View</p>--}}
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

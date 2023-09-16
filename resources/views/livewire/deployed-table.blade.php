<div>
{{--    @if($clickBk == 0)--}}
{{--        <i class="fa-solid fa-backward" style="font-size: 20px; cursor: pointer; margin-top: 3%; margin-bottom: 2%;" onclick="clickBk4()" wire:click="clickBack"></i>--}}
{{--    @endif--}}
    <h5 style="margin-left: 1%;">Deployed Item</h5>
    <div style="display: flex; margin-top: 3%;">
        <div style="margin-left: 45%;">
            <h4 style="text-align: center; margin-top: 3%;">{{ucwords($teacherName)}}</h4>
        </div>
        <div style="margin-left: 30%;">
            <i title="Save Form" class="fa-solid fa-file-arrow-down" style="font-size: 30px; cursor: pointer; color: #0a53be" onclick="window.location='{{ route('form-inventory.pdf',['request' => 'inventory'])}}'"></i>
        </div>
    </div>

    <div style="margin-left: 15%;width: 70%;margin-top: 1%; margin-bottom: 2%;">
        <table class="table table-hover" style="width: 100%; text-align: center">
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

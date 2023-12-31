<div>
    @if($clickView == 0)
        <h5 style="margin-left: 1%;">Stock Card</h5>
        <div style="display: flex;">
            <div class="input-group mb-1" style="width: 30%; margin-left: 25%; margin-top: 1%;">
                <input type="text" wire:model.debounce.1ms="search" class="form-control" placeholder="Search Item" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
        </div>

        <div style="margin-left: 25%;width: 50%; margin-top: 0.5%; margin-bottom: 2%;">
            <table class="table table-hover" style="width: 100%; text-align: center">
                <thead>
                <tr class="inv">
                    <th style="text-align: left; padding-left: 3%;">
                        Item Name
                    </th>
                    <th style="text-align: right; padding-right: 5%;">
                        Action
                    </th>
                </tr>
                </thead>

                <tbody>
                @if(count($request_data) > 0)
                    @foreach($request_data as $preps)
                        <tr class="invs">
                            <td style="text-align: left; padding-left: 3%;">
                                {{ucwords($preps->item_name)}}
                            </td>
                            <td style="text-align: right; padding-right: 7.5%; color: green; cursor: pointer;" onclick="clickBack()" wire:click="click('{{$preps->item_name}}')">
                                View
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
    @elseif($clickView == 1)
        @livewire('stock-card',['dateData' => $dateData])
    @endif
</div>

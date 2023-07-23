<div>
    <h4 style="text-align: center; margin-top: 3%;">Stock Card</h4>
    <div class="input-group mb-1" style="width: 40%; margin-left: 30%; margin-top: 3%;">
        <input type="text" wire:model.debounce.1ms="search" class="form-control" placeholder="Search Teacher" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <span class="input-group-text" wire:click="find" id="basic-addon2" style="cursor: pointer;">Search</span>
    </div>

    @if($display_search == "show")
        <div style="width: 34%; margin-left: 30%;">
            <ul class="list-group">
                @foreach($stock as $data)
                    <li class="list-group-item btn" wire:click="click_suggest({{$data->id}})" style="text-align: left;">
                        {{$data->item_name}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if($display_table == "show")
        <div style="display: flex; margin-top: 3%;">
            <div style="margin-left: 45%;">
                <h4 style="text-align: center; margin-top: 3%;">{{ucwords($search)}}</h4>
            </div>
            <div style="margin-left: 30%;">
                <i title="Save Form" class="fa-solid fa-file-arrow-down" style="font-size: 30px; cursor: pointer; color: #0a53be" onclick="window.location='{{ route('form-inventory.pdf',['request' => 'inventory'])}}'"></i>
            </div>
        </div>

        <div style="background-color: #F5F5F5; margin-left: 15%;width: 70%;border: solid lightslategray 1px; margin-top: 1%; margin-bottom: 2%;">
            <table class="table table-hover" style="width: 100%; text-align: center">
                <thead>
                <tr>
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
                            <tr>
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
                                <td><i class="fa-solid fa-circle-xmark" wire:click="delete_click({{$preps->id}})" style="color: red; cursor: pointer; font-size: 20px;" data-bs-toggle="modal" data-bs-target="#waste_delete_modal"></i></td>
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
        {{$stockcard_data->links('pagination-links')}}
    @endif
</div>

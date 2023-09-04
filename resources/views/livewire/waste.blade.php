<div>
    @include('modal.waste-delete-modal')
    <h5 style="text-align: left; margin-top: 3%; margin-left: 1%;">Prepare Waste Material Request</h5>
    <div class="input-group mb-1" style="width: 40%; margin-left: 30%; margin-top: 3%;">
        <input type="text" wire:model.debounce.1ms="search_teacher" class="form-control" placeholder="Search Teacher" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <span class="input-group-text" @if($display_table == "hide") wire:click="find" @endif id="basic-addon2" style="cursor: pointer;">Search</span>
    </div>
    @if($display_search == "show")
        <div style="width: 34%; margin-left: 30%;">
            <ul class="list-group">
                @foreach($result as $data)
                    <li class="list-group-item btn" wire:click="click_suggest({{$data->id}})" style="text-align: left;">
                        {{$data->fullname}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($display_table == "show")
        <h5 style="text-align: center; margin-top: 3%;">{{ucwords($search_teacher)}}</h5>
        <div style="margin-left: 15%;width: 70%;margin-top: 1%; margin-bottom: 2%;">
            <table class="table table-hover" style="width: 100%; text-align: center">
                <thead>
                <tr class="inv">
                    <th>
                        Date Deployed
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @if(count($prepare_data) > 0)
                    @foreach($prepare_data as $preps)
                        <tr class="invs">
                            <td>
                                {{$preps->created_at}}
                            </td>

                            <td>@livewire('view-button',['date' => $preps->created_at])</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            No Item Posted
                        </td>

                    </tr>
                @endif

                </tbody>
            </table>
        </div>
{{--        <div style="margin-left: 15%;width: 70%;margin-top: 1%; margin-bottom: 2%;">--}}
{{--            <table class="table table-hover" style="width: 100%; text-align: center">--}}
{{--                <thead>--}}
{{--                <tr class="inv">--}}
{{--                    <th>--}}
{{--                        Unit--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        Description--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        Quantity--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        Serial No.--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        Date--}}
{{--                    </th>--}}
{{--                    <th colspan="2">--}}
{{--                        Action--}}
{{--                    </th>--}}
{{--                </tr>--}}
{{--                </thead>--}}

{{--                <tbody>--}}
{{--                @if(count($prepare_data) > 0)--}}
{{--                    @foreach($prepare_data as $preps)--}}
{{--                        @if($preps->item_type == "non-consumable" or $preps->item_type == "sets")--}}
{{--                            <tr class="invs">--}}
{{--                                <td>--}}
{{--                                    {{$preps->unit}}--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    {{$preps->item_name}}--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    {{$preps->quantity}}--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    {{$preps->serial}}--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    {{$preps->created_at}}--}}
{{--                                </td>--}}
{{--                                <td><i class="fa-solid fa-circle-xmark" wire:click="delete_click({{$preps->id}})" style="color: red; cursor: pointer; font-size: 20px;" data-bs-toggle="modal" data-bs-target="#waste_delete_modal"></i></td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                @else--}}
{{--                    <tr>--}}
{{--                        <td colspan="6">--}}
{{--                            No Item Posted--}}
{{--                        </td>--}}

{{--                    </tr>--}}
{{--                @endif--}}

{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
    @endif
</div>

<script>
    function see(data){
        window.livewire.emit('seen', data);
    }
</script>

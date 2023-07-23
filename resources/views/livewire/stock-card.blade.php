<div>
    <h4 style="text-align: center; margin-top: 3%;">Stock Card</h4>
    <div class="input-group mb-1" style="width: 40%; margin-left: 30%; margin-top: 3%;">
        <input type="text" wire:model.debounce.1ms="search" class="form-control" placeholder="Search Teacher" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <span class="input-group-text" wire:click="find" id="basic-addon2" style="cursor: pointer;">Search</span>
    </div>

{{--    <div style="width: 34%; margin-left: 30%;">--}}
{{--        <ul class="list-group">--}}
{{--            @foreach($stock as $data)--}}
{{--                <li class="list-group-item btn" wire:click="click_suggest({{$data->id}})" style="text-align: left;">--}}
{{--                    {{$data->fullname}}--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}

{{--    <div style="background-color: #F5F5F5; margin-left: 15%;width: 70%;border: solid lightslategray 1px; margin-top: 1%; margin-bottom: 2%;">--}}
{{--        <table class="table table-hover" style="width: 100%; text-align: center">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>--}}
{{--                    Unit--}}
{{--                </th>--}}
{{--                <th>--}}
{{--                    Description--}}
{{--                </th>--}}
{{--                <th>--}}
{{--                    Quantity--}}
{{--                </th>--}}
{{--                <th>--}}
{{--                    Serial No.--}}
{{--                </th>--}}
{{--                <th>--}}
{{--                    Date--}}
{{--                </th>--}}
{{--            </tr>--}}
{{--            </thead>--}}

{{--            <tbody>--}}
{{--            @php $bs=0; @endphp--}}
{{--            @foreach($prepare_data as $preps)--}}
{{--                @if($preps->item_type == "non-consumable")--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            {{$preps->unit}}--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            {{$preps->item_name}}--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            {{$preps->quantity}}--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            {{$preps->serial}}--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            {{$preps->created_at}}--}}
{{--                        </td>--}}
{{--                        <td><i class="fa-solid fa-circle-xmark" wire:click="delete_click({{$preps->id}})" style="color: red; cursor: pointer; font-size: 20px;" data-bs-toggle="modal" data-bs-target="#waste_delete_modal"></i></td>--}}
{{--                    </tr>--}}
{{--                    @php $bs++; @endphp--}}
{{--                @endif--}}
{{--            @endforeach--}}

{{--            @if($bs == 0)--}}
{{--                <tr>--}}
{{--                    <td colspan="6">--}}
{{--                        No Item Posted--}}
{{--                    </td>--}}

{{--                </tr>--}}

{{--            @endif--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
</div>

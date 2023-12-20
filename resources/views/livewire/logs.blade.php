<div>
    <h4 style="text-align: left; margin-top: 3%;">Logs</h4>
{{--    <div style="width: 25%; margin-left: 3%;">--}}
{{--        <input type="text" placeholder="Search Item" wire:model.debounce.1ms="searchInput" style="width: 100%; padding: 1%; margin-top: 2%;">--}}
{{--    </div>--}}
    <table class="table table-hover" style="margin-top: 2%; width: 96.5%; margin-bottom: 2%;">
        <thead>
        <tr class="inv">
            <th>
                Admin Acc. Name
            </th>
            <th>
                Action Taken
            </th>
            <th>
                Date
            </th>
        </tr>
        </thead>
        <tbody>
        @if(count($request_data) == 0)
            <tr style="text-align: center">
                <td colspan="7"> No Inventory Posted</td>
            </tr>

        @else
            @foreach($request_data as $data)
                <tr class="invs">
                    <td>{{ucfirst($data->name)}}</td>
                    <td>{{$data->action}}</td>
                    <td >{{$data->created_at}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

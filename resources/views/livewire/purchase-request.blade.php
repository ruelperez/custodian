<div>
    @include('modal.add-request-modal')
    @include('modal.edit-request-modal')
    <table class="table table-hover" style="width: 100%; text-align: center">
        <thead>
            <tr>
                <th>
                    Unit
                </th>
                <th>
                    Item Description
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Unit Cost
                </th>
                <th>
                    Total Cost
                </th>
            </tr>

        </thead>
        <tbody>
        @if(count($request_data) == 0)
            <tr style="text-align: center">
                <td colspan="5"> No Request Posted</td>
            </tr>

        @else
            @foreach($request_data as $data)
                <tr>
                    <td>{{$data->unit}}</td>
                    <td>{{$data->item_name}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->unit_cost}}</td>
                    <td>{{$data->total_cost}}</td>
                    <td><i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#edit_request_modal" wire:click="edit({{$data->id}})"></i></td>
                    <td><i class="fa-solid fa-trash" style="color: red; cursor: pointer;" wire:click="delete({{$data->id}})"></i></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

</div>

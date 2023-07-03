<div>
    @include('modal.add-request-modal')
    <table class="table table-hover" style="width: 100%; text-align: center">
        <thead>
            <tr>
                <th>
                    Item Name
                </th>
                <th>
                    Quantity
                </th>
            </tr>

        </thead>
        <tbody>
        @if(count($request_data) == 0)
            <tr style="text-align: right">
                <td> No Request Posted</td>
            </tr>

        @else
            @foreach($request_data as $data)
                <tr>
                    <td>{{$data->item_name}}</td>
                    <td>{{$data->quantity}}</td>
                    <td><i class="fa-solid fa-trash" style="color: red"></i></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

</div>

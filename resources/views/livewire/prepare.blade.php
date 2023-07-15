<div>
    @include('modal.add-prepare-modal')
    @include('modal.deploy-confirmation')
    <h4 style="text-align: center; margin-top: 3%;">Prepare Material Request</h4>
    <div style="display: flex; margin-top: 3%;">
        <div style="margin-left: 15%; width: 12%;">
            <button style="margin-top: 2%; margin-bottom: 2%; margin-left: 1%; width: 100%;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_prepare_modal">Add</button>
        </div>
        <div style="margin-left: 45%;">
            <button style="margin-top: 2%; margin-bottom: 2%; margin-left: 1%; width: 100%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deploy_confirmation">Deploy</button>
        </div>
        <div style="margin-left: 3%;">
            <i title="Save Form" class="fa-solid fa-file-arrow-down" style="font-size: 35px; cursor: pointer; color: #0a53be" onclick="window.location='{{ route('form-inventory.pdf',['request' => 'inventory'])}}'"></i>
        </div>
    </div>
    @include('modal.edit-prepare-modal')
    <div style="background-color: #F5F5F5; margin-left: 15%;width: 70%;border: solid lightslategray 1px; margin-top: 0.5%; margin-bottom: 2%;">
        <table class="table table-hover" style="width: 100%; text-align: center">
            <thead>
            <tr>
                <th>
                    Unit
                </th>
                <th>
                    Description
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Serial No.
                </th>
                <th>
                    Remarks
                </th>
                <th>
                    Receiver
                </th>
            </tr>

            </thead>
            <tbody>
            @if(count($prepare_data) == 0)
                <tr style="text-align: center">
                    <td colspan="7"> No Posted</td>
                </tr>

            @else
                @php $q=0; @endphp
                @foreach($prepare_data as $data)
                    @if($q < 10)
                        <tr>
                            <td>{{$data->unit}}</td>
                            <td>{{$data->item_name}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>{{$data->serial}}</td>
                            <td>{{$data->item_type}}</td>
                            <td>{{ucwords($data->receiver)}}</td>
                            <td><i class="fa-solid fa-pen-to-square" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#edit_prepare_modal" wire:click="edit({{$data->id}})"></i></td>
                            <td><i class="fa-solid fa-trash" style="color: red; cursor: pointer;" wire:click="delete({{$data->id}})"></i></td>
                        </tr>
                    @endif
                    @php $q++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

</div>

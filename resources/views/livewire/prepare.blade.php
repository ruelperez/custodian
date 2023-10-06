<div>
    @include('modal.add-prepare-modal')
    @include('modal.deploy-confirmation')
    @if($sample != 0)
        @livewire('deployed-byname')
    @else
        <h5 style="text-align: left; margin-top: 3%; margin-left: 1%;">Prepare Material Request</h5>
        <button class="btn btn-primary" wire:click="clickReport('deployed')" style="margin-left: 1%; margin-top: 1%;">Redirect to deployed item</button>
        <div style="display: flex; margin-top: 3%;">
            <div style="margin-left: 12%; width: 12%;">
                <button style="margin-top: 2%; margin-bottom: 2%; margin-left: 1%; width: 100%;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_prepare_modal">Add</button>
            </div>
            <div style="margin-left: 50%;">
                <button style="margin-top: 2%; margin-bottom: 2%; margin-left: 1%; width: 100%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deploy_confirmation" @if(count($prepare_data) == 0) disabled @endif>Deploy</button>
            </div>
            {{--        <div style="margin-left: 3%; margin-top: 1%;" >--}}
            {{--            <i title="Print" class="fa-solid fa-print" style="font-size: 25px; @if(count($prepare_data) > 0) cursor: pointer; @endif color: #0a53be" @if(count($prepare_data) > 0) onclick="window.location='{{ route('form-inventory.pdf',['request' => 'inventory'])}}'" @endif></i>--}}
            {{--        </div>--}}
        </div>
        @include('modal.edit-prepare-modal')
        <div style="margin-left: 12%;width: 70%; margin-top: 0.5%; margin-bottom: 2%;">
            <table class="table table-hover" style="width: 100%; text-align: center">
                <thead>
                <tr class="inv">
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
                        Receiver
                    </th>
                    <th colspan="2">
                        Action
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
                            <tr class="invs">
                                <td>{{$data->unit}}</td>
                                <td>{{$data->item_name}}</td>
                                <td>{{$data->quantity}}</td>
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
    @endif


</div>

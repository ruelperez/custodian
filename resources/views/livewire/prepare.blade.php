<div>
    @include('modal.add-prepare-modal')
    @include('modal.deploy-confirmation')
    @include('modal.add-property')
    @include('modal.edit-prepare-modal')
    @if($sample != 0)
        @livewire('deployed-byname')
    @else
        <h5 style="text-align: left; margin-top: 3%; margin-left: 1%;">Prepare Material Request</h5>
        <button class="btn btn-primary" wire:click="clickReport('deployed')" style="margin-left: 1%; margin-top: 1%;">Redirect to deployed item</button>
        <div style="display: flex; margin-top: 3%;">
            <div style="margin-left: 12%; width: 12%;">
                <button style="margin-top: 2%; margin-bottom: 2%; margin-left: 1%; width: 100%;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Add</button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="background-color: silver;">
                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#add_prepare_modal" wire:click="addClick('supply')">SUPPLY</button></li>
                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#add_property" wire:click="addClick('property_ics')">PROPERTY</button></li>
                </ul>
            </div>
            <div style="margin-left: 50%;">
                <button style="margin-top: 2%; margin-bottom: 2%; margin-left: 1%; width: 100%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deploy_confirmation" @if(count($prepare_data) == 0) disabled @endif>Deploy</button>
            </div>
        </div>
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
                       Inventory No.
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
                                @if($data->item_status == null or $data->item_status == "")
                                    <td>{{$data->item_name}}</td>
                                @else
                                    <td>{{$data->item_name}} (returned)</td>
                                @endif

                                <td>{{$data->quantity}}</td>
                                <td>{{$data->serial}}</td>
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

<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="propTable_modal">
    <div class="modal-dialog modal-lg" role="document" style="">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel"><h5>{{ucwords($itemName)}}</h5></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <p>Receiver: {{ucwords($teacher_name)}}</p>
                <div>
                    @if(session()->has('dataAdded'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('dataAdded')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session()->has('dataFailed'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('dataFailed')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session()->has('successEdit'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('successEdit')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session()->has('failedEdit'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('failedEdit')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session()->has('successDel'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('successDel')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session()->has('failedDel'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('failedDel')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div style="display: flex">
                    <div style="width: 12%;">
                        <button style="margin-top: 2%; margin-bottom: 2%; margin-left: 1%; width: 100%;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#propAdd_modal">Add</button>
                    </div>
                    <div style="width: 20%; margin-left: 57%; margin-top: 1.5%;">
                        <input style="width: 100%;" type="text" wire:model="par_num"  placeholder="PAR No.">
                    </div>
                    <div style="margin-left: 5%;margin-top: 2%;">
                        <i title="Print Form" class="fa-solid fa-print" style="font-size: 25px; cursor: pointer; color: #0a53be" onclick="location.href = '/Dashboard/request-pdf/component/{{$prop_id}}';"></i>
                    </div>
                </div>

                <table class="table table-hover" style="width: 100%; text-align: center;margin-top: 1%;" >
                    <thead>
                        <tr style="background-color: #20B2AA; color: white">
                            <th>
                                Qty
                            </th>
                            <th>
                                Unit
                            </th>
                            <th>
                                Desc
                            </th>
                            <th>
                                Property Number
                            </th>
                            <th>
                                Date Acquired
                            </th>
                            <th>
                                Amount
                            </th>
                            <th colspan="2">
                                Action
                            </th>

                        </tr>
                    </thead>

                    <tbody>
                    @if(count($component_data) == 0)
                        <tr style="text-align: center">
                            <td colspan="7"> No Request Posted</td>
                        </tr>
                    @else
                        @foreach($component_data as $data)
                            <tr>
                                <td>{{ucwords($data->quantity)}}</td>
                                <td>{{$data->unit}}</td>
                                <td>{{ucwords($data->item_name)}}</td>
                                <td></td>
                                <td>{{$data->date_acquired}}</td>
                                <td>{{$data->amount}}</td>
                                <td><i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#propEdit_modal" style="cursor: pointer;" wire:click="edit({{$data->id}})"></i></td>
                                <td><i class="fa-solid fa-trash" style="color: red; cursor: pointer;" onclick="propDelete({{$data->id}},'{{$data->item_name}}')"></i></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



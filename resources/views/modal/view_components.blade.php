<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="view_components">
    <div class="modal-dialog modal-lg" role="document" style="">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel"><h5>{{ucfirst($itemName)}}</h5></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <table class="table table-hover" style="width: 100%; text-align: center; margin-top: 1%;" >
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
                                <td>{{$data->property_number}}</td>
                                <td>{{$data->date_acquired}}</td>
                                <td>{{$data->amount}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="summary">
    <div class="modal-dialog modal-lg" role="document" style="">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel">Summary Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                @if(count($waste ) != 0)
                    <div style="margin-left: 95%;margin-top: 2%;">
                        <i title="Print Form" class="fa-solid fa-print" style="font-size: 25px; cursor: pointer; color: #0a53be" onclick="location.href = '/Dashboard/request-pdf/waste-summary/{{$date}}/';"></i>
                    </div>
                @endif
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
                    </tr>
                    </thead>

                    <tbody>
                    @if(count($waste ) != 0)
                        @foreach($waste as $data)
                            <tr>
                                <td>{{($data->total_quantity)}}</td>
                                <td>{{$data->unit}}</td>
                                <td>{{ucwords($data->item_name)}}</td>
                            </tr>
                        @endforeach
                    @else
                        <p style="text-align: center">No Data Posted</p>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



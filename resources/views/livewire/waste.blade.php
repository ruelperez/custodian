<div>
    @include('modal.waste-delete-modal')
    <h5 style="text-align: left; margin-top: 3%; margin-left: 1%;">Prepare Waste Material Request</h5>
    <div class="input-group mb-1" style="width: 40%; margin-left: 30%; margin-top: 5%;">
        <input type="text" wire:model.debounce.1ms="search_teacher" class="form-control" placeholder="Search Teacher" aria-label="Recipient's username" aria-describedby="basic-addon2">
    </div>
        <div style="margin-left: 20%;width: 60%;margin-top: 2%; margin-bottom: 2%;">
            <table class="table table-hover" style="width: 100%; text-align: center">
                <thead>
                <tr class="inv">
                    <th>
                       Teachers
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                </thead>

                <tbody>
                    @if(count($result) > 0)
                        @foreach($result as $preps)
                            <tr class="invs">
                                <td>
                                    {{$preps->fullname}}
                                </td>
                                <td style="color: #0c63e4; cursor: pointer" onclick="location.href = '/Dashboard/waste/view/{{$preps->id}}';">
                                    View
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2">
                                No Item Posted
                            </td>

                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
</div>

<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="view">
    <div class="modal-dialog" style="max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" sty>Date Deployed - {{$date_save}}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="margin-left: 5%;width: 90%;margin-top: 1%; margin-bottom: 2%;">
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
                            <th colspan="2">
                                Action
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @if(count($deployed_data) > 0)
                            @foreach($deployed_data as $preps)
                                <tr class="invs">
                                    <td>
                                        {{$preps->unit}}
                                    </td>
                                    <td>
                                        {{$preps->item_name}}
                                    </td>
                                    <td>
                                        {{$preps->quantity}}
                                    </td>
                                    <td>
                                        {{$preps->serial}}
                                    </td>
                                    <td><i class="fa-solid fa-circle-xmark" wire:click="delete_click({{$preps->id}})" style="color: red; cursor: pointer; font-size: 20px;" data-bs-toggle="modal" data-bs-target="#waste_delete_modal"></i></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    No Item Posted
                                </td>

                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

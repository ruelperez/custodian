<div>
    <i class="fa-solid fa-backward" style="margin-top: 2%; font-size: 20px; cursor: pointer; @if($tg == 0) display: none; @endif " wire:click="backButton"></i>
    <h5 style="text-align: left; @if($tg == 0) margin-top: 3%; @else margin-top: 1%; @endif  margin-left: 1%;">Prepare Waste Material Request</h5>
    @include('modal.waste-delete-modal')
    @if($tg == 0)
        <div>
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
                                    {{$preps->receiver}}
                                </td>
                                <td style="color: #0c63e4; cursor: pointer" wire:click="clickView({{$preps->id}})">
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
    @endif

    @if($tg == 1)
        <div>
            @livewire('waste-item',['teacher_id' => $receiver_id])
        </div>
    @endif
</div>
<script>
    function removeItemMoved(id,name){
        if (confirm('Are you sure to remove '+name+'?')){
            window.livewire.emit('remove', id);
        }
    }

    function moveToInventory(name){
        if (confirm('Are you sure to move all item to inventory?')){
            window.livewire.emit('move', name);
        }
    }
</script>

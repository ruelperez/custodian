<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="addTeacherItem">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">Input Item Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <form wire:submit.prevent="submit">
                    <div class="mb-2" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Item Description" wire:model="item_name"  required>
                    </div>
                    @error('item_name') <span style="color: red">{{ $message }}</span> @enderror
                    <div style="width: 66%; margin-left: 14%; position: absolute;">
                        <ul class="list-group">
                            @php $h=0; @endphp
                            @foreach($suggestData as $data)
                                @if($h < 6)
                                    <li class="list-group-item btn" style="text-align: left; background-color: #E0FFFF" wire:click="click_item({{$data->id}})">
                                        {{$data->item_name}}
                                    </li>
                                @endif
                                @php $h++; @endphp
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Quantity"  wire:model="quantity">
                    </div>
                    @error('quantity') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Unit"  wire:model="unit" >
                    </div>
                    @error('unit') <span style="color: red">{{ $message }}</span> @enderror
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="text" class="form-control" placeholder="Serial No."  wire:model="serial" >
                    </div>
                    @error('serial') <span style="color: red">{{ $message }}</span> @enderror
                    <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%; margin-top: 3%;">ADD</button>
                </form>
            </div>
        </div>
    </div>
</div>



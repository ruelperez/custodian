<div>
    @if($rt == 1)
        <i class="fa-solid fa-backward" style="font-size: 20px; cursor: pointer; margin-top: 3%; margin-bottom: 2%;" onclick="clickBk8()" wire:click="clickBack"></i>
        <h5 style="text-align: left; margin-left: 1%;">Employees</h5>
    @endif
    @include('modal.waste-delete-modal')
    @if($tg == 0)
        <h5 style="text-align: left; margin-left: 1%;">Employees</h5>
        <div>
            <div class="input-group mb-1" style="width: 40%; margin-left: 20%; margin-top: 5%;">
                <input type="text" wire:model.debounce.1ms="search_teacher" class="form-control" placeholder="Search Teacher" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            <div style="margin-left: 20%;width: 60%;margin-top: 2%; margin-bottom: 2%;">
                <table class="table table-hover" style="width: 100%; text-align: center">
                    <thead>
                    <tr class="inv">
                        <th style="text-align: left">
                            Employees
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
                                <td style="text-align: left">
                                    {{ucwords($preps->receiver)}}
                                </td>
                                <td style="color: #0c63e4; cursor: pointer" onclick="clickBk7()" wire:click="clickView('{{$preps->receiver}}')">
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
            @livewire('teacher-item',['teacherName' => $teacher_name])
        </div>
    @endif
</div>

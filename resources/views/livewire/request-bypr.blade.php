<div>
    @if($clickView == 0)
        <i class="fa-solid fa-backward" style="font-size: 20px; cursor: pointer; margin-top: 3%; margin-bottom: 2%;" onclick="clickBack50()"></i>
        <h5 style="margin-left: 1%;">Request Report</h5>
        <div style="display: flex;">
            <div class="input-group mb-1" style="width: 30%; margin-left: 25%; margin-top: 3%;">
                <input type="text" wire:model.debounce.1ms="search" class="form-control" placeholder="Search Item" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
        </div>

        <div style="margin-left: 25%;width: 50%; margin-top: 0.5%; margin-bottom: 2%;">
            <table class="table table-hover" style="width: 100%; text-align: center">
                <thead>
                <tr class="inv">
                    <th style="text-align: left; padding-left: 3%;">
                        P.R No.
                    </th>
                    <th style="text-align: right; padding-right: 5%;">
                        Action
                    </th>
                </tr>
                </thead>

                <tbody>
                @if(count($pr) > 0)
                    @foreach($pr as $preps)
                        <tr class="invs">
                            <td style="text-align: left; padding-left: 3%;">
                                {{$preps->pr_num}}
                            </td>
                            <td style="text-align: right; padding-right: 7.5%; color: green; cursor: pointer;" wire:click="click('{{$preps->pr_num}}')">
                                View
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            No Data Posted
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    @elseif($clickView == 1)
        @livewire('request-report',['prNum' => $prNum])
    @endif
</div>

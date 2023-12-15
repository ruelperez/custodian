<div>
    @if($ds == 1)
        @include('modal.summary')
    @endif
    <input type="text" wire:model="year" placeholder="Year" style="margin-left: 25%; margin-bottom: 1%; width: 10%;">
    @error('year') <span style="color: red">{{ $message }}</span> @enderror
        <div style="margin-left: 25%;width: 50%; margin-top: 0.5%; margin-bottom: 2%;">
            <table class="table table-hover" style="width: 100%; text-align: center">
                <thead>
                <tr class="inv">
                    <th style="text-align: center;">
                        Months
                    </th>
                    <th style="text-align: center;">
                        Action
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>January</td>
                    <td><b style="cursor: pointer" wire:click="clickVw(1)" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>
                <tr>
                    <td>February</td>
                    <td><b style="cursor: pointer" wire:click="clickVw(2)" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>

                <tr>
                    <td>March</td>
                    <td><b style="cursor: pointer" wire:click="clickVw(3)" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>
                <tr>
                    <td>April</td>
                    <td><b style="cursor: pointer" wire:click="clickVw(4)" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>
                <tr>
                    <td>May</td>
                    <td><b style="cursor: pointer" wire:click="clickVw(5)" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>
                <tr>
                    <td>June</td>
                    <td><b style="cursor: pointer" wire:click="clickVw(6)" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>
                <tr>
                    <td>July</td>
                    <td><b style="cursor: pointer" wire:click="clickVw(7)" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>
                <tr>
                    <td>August</td>
                    <td><b style="cursor: pointer" wire:click="clickVw(8)" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>
                <tr>
                    <td>September</td>
                    <td><b style="cursor: pointer" wire:click="clickVw('09')" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>
                <tr>
                    <td>October</td>
                    <td><b style="cursor: pointer" wire:click="clickVw(10)" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>
                <tr>
                    <td>November
                    <td><b style="cursor: pointer" wire:click="clickVw(11)" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>
                <tr>
                    <td>December</td>
                    <td><b style="cursor: pointer" wire:click="clickVw(12)" data-bs-toggle="modal" data-bs-target="#summary">View</b></td>
                </tr>
                </tbody>
            </table>
        </div>
</div>

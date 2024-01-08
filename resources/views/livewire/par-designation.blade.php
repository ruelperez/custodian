<div style="width: 30%; height: 275px; border: solid black 1px;margin-left: 16%; margin-right: 3%; text-align: center;padding-top: 1%;">
    <b>PAR Form</b>
    <div style="display: flex; margin-top: 5%; margin-bottom: 24%;">
        <div style="text-align: left; padding-left: 5%;">
            <label>Signature Over Printed Name:</label>
            <label style="margin-top: 15%;">Position:</label>
        </div>
        <div style="text-align: right; padding-right: 5%;">
            <input type="text" wire:model="printedName" placeholder="Name" @if($pr_btn === "update") disabled @endif>
            <input style="margin-top: 21%;" type="text" placeholder="Position" wire:model="position" @if($pr_btn === "update") disabled @endif>
        </div>
    </div>
    @if($pr_btn === "submit")
        <div style="width: 50%; cursor: pointer;" class="bg-primary text-white mx-auto mt-3" wire:click="prSubmit" >
            SUBMIT
        </div>
    @elseif($pr_btn === "update")
        <div style="width: 50%; cursor: pointer;" class="bg-warning mx-auto mt-3 text-white" wire:click="prBtn('edit')">
            EDIT
        </div>
    @elseif($pr_btn === "edit")
        <div style="width: 50%; cursor: pointer;" class="bg-success mx-auto mt-3 text-white" wire:click="prBtn('update')">
            UPDATE
        </div>
    @endif
</div>

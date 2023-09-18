function clickBack(){
    window.livewire.emit('clickBack1');
}

function clickBk(){
    window.livewire.emit('clickBack2')
}

function clickBk3(){
    window.livewire.emit('clickBack3')
}

function clickBk4(){
    window.livewire.emit('clickBack4')
}

function clickBk5(){
    window.livewire.emit('clickBack5')
}

function clickBk6(){
    window.livewire.emit('clickBack6')
}

function clickBk7(){
    window.livewire.emit('clickBack7')
}

function clickBk8(){
    window.livewire.emit('clickBack8')
}

function moveBup(){
    if(confirm('Are you sure to move all item to backup folder?')){
        window.livewire.emit('movetoBup');
    }
}

function clickTransfer(){
    if(confirm('Transfer moved item to backup. Click "OK" to proceed ')){
        window.livewire.emit('transfer');
    }
}

function itemMove(){
    $('#closeMove').click();
}

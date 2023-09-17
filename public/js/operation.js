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

function moveBup(){
    if(confirm('Are you sure to move all item to backup folder?')){
        window.livewire.emit('movetoBup');
    }
}

function itemMove(){
    $('#closeMove').click();
}

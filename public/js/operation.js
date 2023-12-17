function clickBack(){
    window.livewire.emit('clickBack1');
}

function clickBk(){
    window.livewire.emit('clickBack2')
}

function clickBack21(){
    window.livewire.emit('clickBk23')
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

function clickBk25(){
    window.livewire.emit('clickBack25')
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

function requestBtnClose(){
    $('#requestBtnClose').click();
}

function deleteItemRequest(id){
    if (confirm('Are you sure you want to delete?')){
        window.livewire.emit('deleteItemRequest', id);
    }
}

function deleteItemOrder(id){
    if (confirm('Are you sure you want to delete?')){
        window.livewire.emit('deleteItemOrder', id);
    }
}

function clickPropAdd(){
    $('#propButton').click();
}

function clickPropEdit(){
    $('#propEditButton').click();
}

function propDelete(id,name){
    if (confirm('Click "OK" to delete '+name)){
        window.livewire.emit('propDel', id);
    }
}

function clickBk40(){
    window.livewire.emit('clickBack40')
}

function clickWaste(){
    window.livewire.emit('clickBack45')
}

function removeItemMoved(id,name){
    if (confirm('Are you sure to remove '+name+'?')){
        window.livewire.emit('remove', id);
    }
}

function moveToInventory(){
    if (confirm('Are you sure to move all item to inventory?')){
        window.livewire.emit('moves');
    }
}

function clickMove(){
    if (confirm('Are you sure to move to purchase request?')){
        window.livewire.emit('movebToPr');
    }
}

function clickBack50(){
    window.livewire.emit('prNumClickBack');
}

// Teachers add item
function inputChange(){
    window.livewire.emit('input_change');
}

function clickRequestProceed(){
    $('#closeRequestMove').click();
}

function hoverIn(element){
    element.style.border= 'solid black 3px';
}

function hoverOut(element){
    element.style.border = 'none';
}



// Delete data from inventory
function delInv(id){
    if (confirm('Are you sure you want to delete? If yes, click "OK"')){
        window.livewire.emit('deleteInv',id);
    }
}

// Prepare Material Request hide suggestion if not click input item field
const searchInputTeacher = document.getElementById('prepareInputTeacher');
const searchInputItem = document.getElementById('prepareInputItem');

// Event listener for clicking outside of the search container
document.addEventListener('click', function (event) {
    if (!searchInputTeacher.contains(event.target)) {
        window.livewire.emit('removeSuggestTeacher');
    }

    if (!searchInputItem.contains(event.target)) {
        window.livewire.emit('removeSuggestItem');
    }
});

function clickEllipsis(){
    var an = $(".div100");
    var sn = $(".div101");
    $(".div100").toggle();
    if (an.css("display") !== "none") {
        // Set margin-top for elements with class "div101"
        sn.css("margin-top", "31%");
    } else {
        // If "div100" is hidden, you may want to reset the margin-top
        sn.css("margin-top", "75%");
    }

}

$(document).ready(function() {
    var sn = $(".div101");
    // Hide the div when anything on the page is clicked
    $(document).click(function(event) {
        if (!$(event.target).is("#ellip")) {
            $(".div100").hide();
            sn.css("margin-top", "75%");
        }
    });

});

// function clickBody(){
//     if (!$(event.target).is("#ellip")) {
//         $("#myDiv").hide();
//     }
// }
// $(document).click(function(event) {
//
// });

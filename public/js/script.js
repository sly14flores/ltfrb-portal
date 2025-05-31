document.getElementById('app-type').addEventListener('change', checkDropdowns);
document.getElementById('denomination').addEventListener('change', checkDropdowns);

function checkDropdowns(){
    var app_type = document.getElementById('app-type').value;
    var denomination = document.getElementById('denomination').value;
    var table = document.getElementById('app-table');

    if(app_type == 1 && denomination == 1){
        table.style.display = 'table';
    } else {
        table.style.display = 'none';
    }
}
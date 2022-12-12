$(document).ready(function(event){
    var tr = $(".click");
    tr.click(function(event){
        location = "/editFirm/editFirmForm.php?id="+ event.target.parentElement.id;
    });

     var eb =$("#edit-btn")
        eb.click(function(){
        var id = $(".check:checked").attr("id");
        
        console.log(id);
        if (id!=undefined)
        location = "/editFirm/editFirmForm.php?id="+ id;
    });



});
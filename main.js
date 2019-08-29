$(document).ready(function(){

    $("#mycom").submit(function (e) { 

        e.preventDefault();
        $.ajax({
            method: "POST",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            url: "insertcom.php",
            data: new FormData(this)
          })
            .done(function( msg ) {
              alert( "Data Saved: " + msg );
            });    
    });
    // $.post("insertcom.php", function(data, status){
    //   alert("Data: " + data + "\nStatus: " + status);
    // });
})
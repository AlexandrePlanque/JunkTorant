$(document).ready(function (){
    $("#signin").attr("placeholder", "Ce nom existe déjà").val("").focus().blur();
})

$("#signin").click(function() {
    $("#signin").css("border-color", '')
})

$("#signin").focusout(function() {
    $.ajax({
        type: "get",
        url : "data/send.php",
        dataType: "json",
        
        success : function(data){
            
            verifyUser($.parseJSON(data))
            
        }
    });
    //alert('test')
       
   var url = window.location.href;
   //récupération de l'ID contenu dans l'url
   var id = url.substring(url.lastIndexOf('=') + 1);
  
   $('#'+id).addClass("active");
   console.log
    });


function verifyUser(users){

var user = $("#signin").val();
for(var i = 0; i < users.length; i++){
    //alert(users[i].username);
    if(user !== null){
    if(users[i].username === user){
        
        $("#signin").css('border-color', 'red')
        //i+=999999;
       
    }
    return;
}
}
}

$( "#signin" )
  .focusout(function() {
  //  $("#signin").attr("placeholder", "Ce nom existe déjà").val("").focus().blur();
    //.css('display','inline-block').append($('<p>').text("<small>Pseudo déjà existant"));;
   // $("#errorField").css('display','inline-block').append($('<p>').text("<small>Pseudo déjà existant"));
//$( "#focus-count" ).text( "focusout fired: " + focus + "x" );
  })
  
/*   $( "#signin" )
  .focus(function() {
    $("#signin").css('border-color', 'grey');
    $("#errorField").empty();
  });
}
 */
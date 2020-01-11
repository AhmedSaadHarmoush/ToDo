$(document).ready(function (){
   $("#Register").click(function (){
       $(".login").hide();
       $(".Register").show();
        return false;
   }) ;
   
   $("#login").click(function (){
       $(".login").show();
        $(".Register").hide();
       return false;
   });
   $('#search').keyup(function (e){
       var search =$(this).val().toLowerCase();
       if(search!==""){
       $.post('./view/main_body.php',
                        {
                            data:"search",
                            search:search
                        }, 
                        function(data) {
                            console.log(data);
                          $(".srch").empty();
                           $(".srch").append(data);
			});}
		
})
});



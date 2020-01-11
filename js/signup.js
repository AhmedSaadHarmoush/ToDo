$(document).ready(function (){
    $("#reg_email").keyup(function (e){
        $(this).val($(this).val().replace(/\s/g, ''));
        var email = $(this).val();
			$("#user-result").html('<img src="./img/ajax-loader.gif" />');
                    
			$.post('./controller/login.php',
                        {
                            check_email:"check_email",
                            email:email
                        }, 
                        function(data) {
                            console.log(data);
                            $("#email_check").empty();
			  $("#email_check").html(data);
			});
		
});
    $("#signup").click(function (){
        console.log("formDa"); 

$("#register").submit(function(e)
{
	var formObj = $(this);
	var formURL = formObj.attr("action");

	if(window.FormData !== undefined)  // for HTML5 browsers
	{
	
		var formData = new FormData(this);
                
		$.ajax({
        	url: formURL,
			type: "POST",
			data:  formData,
			mimeType:"multipart/form-data",
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data, textStatus, jqXHR)
		    {
                        console.log(data);
                        window.location.href = '/todo/'
                        
		    },
		  	error: function(jqXHR, textStatus, errorThrown) 
	    	{
	    	} 	        
	   });
        e.preventDefault();
   }
  

});
$("#register").submit();
})

});
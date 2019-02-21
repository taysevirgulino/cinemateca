$(function(){
	$('input:radio').on('ifChecked', function(event){
		var status = parseInt($(this).val());
		console.log(  );
		if( status == 1 ){
			$("#divFrmLogin").each(function(index, element) {
				$(this).css("visibility", "visible");
				//$(this).find("label").removeClass("nobr").html("Login: *");
			});
			$("#divFrmSenha").each(function(index, element) {
				$(this).css("visibility", "visible");
				//$(this).find("label").removeClass("nobr").html("Senha: *");
			});
		}else{
			$("#divFrmLogin").each(function(index, element) {
				$(this).css("visibility", "hidden");
				//$(this).find("label").addClass("nobr").html("Login:");
			});
			$("#divFrmSenha").each(function(index, element) {
				$(this).css("visibility", "hidden");
				//$(this).find("label").addClass("nobr").html("Senha:");
			});
		}
		
	});	
});
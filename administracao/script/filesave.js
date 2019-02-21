function _Popup(url, campo) {
	var width = screen.availWidth;
	var height = screen.availHeight;
	$("#"+campo).val( "" );
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(url, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=0,resizable=0,width='+width+',height='+height);");
}
function _LoadArquivo(file, campo){
	$("#"+campo).val( file );
}
function MM_jumpMenu(targ,selObj,restore){ //v3.0
	eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	if (restore) selObj.selectedIndex=0;
}
	
function ListagemSelectCheks( objCheckAll ){
	var tags = document.getElementsByTagName("input");
	for ( i=0; i < tags.length; i++ ) {
		if(tags[i].type == "checkbox" && tags[i].className == "InputOperacao"){
			tags[i].checked = objCheckAll.checked;
		}
	}
}

function ListagemSelectCheksAll( objCheckAll ){
	var tags = document.getElementsByTagName("input");
	for ( i=0; i < tags.length; i++ ) {
		if(tags[i].type == "checkbox"){
		    if(!tags[i].disabled){
			    tags[i].checked = objCheckAll.checked;
			}
		}
	}
}

function ListagemSelectChek( id ){
	var obj = document.getElementById(id);
	obj.checked = !obj.checked;
}

function ListagemOperacaoExecutar( id ){
	if( confirm("Deseja realmente executar esta operacao?") ){
		var obj = document.getElementById(id);
		var tags = document.getElementsByTagName("input");
		var valor = "";
		for ( i=0; i < tags.length; i++ ) {
			if(tags[i].type == "checkbox" && tags[i].className == "InputOperacao"){
				if(tags[i].checked == true){
					valor += tags[i].value + ";";
				}
			}
		}
		obj.value = valor;
		return true;
	}
	return false;
}
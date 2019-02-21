
	function fncDateDiff(Date1, Date2){
		varDate1 = Date1.substring(6,10) + Date1.substring(3,5) + Date1.substring(0,2);
		varDate2 = Date2.substring(6,10) + Date2.substring(3,5) + Date2.substring(0,2);

		if(parseFloat(varDate1) < parseFloat(varDate2))
			return(true);
		else
			return(false);
	}

	function IsNumber(Number){
		var validos = "0123456789";
		tam = Number.length;

		for (i = 0; i < tam ; i++) {  
			if(validos.indexOf(Number.substring(i,i + 1))==-1){
			 	return false;}
		}

		return(true)
	}
	
	function IsMoney(Number){
		var validos = "0123456789";
		num = fncFiltraValor(Number);
		tamNumber = Number.length
		tam = num.length;

		if(Number.charAt(tamNumber-3)=='.'){
			for (i = 0; i < tam ; i++) {
				if(validos.indexOf(num.substring(i,i + 1))==-1){
			 		return false;}
			}
		}
		else{
			return(false);
		}

		return(true)
	}

	function IsDate(Date){
		Dia = Date.substring(0,2);
		Mes = Date.substring(3,5);
		Ano = Date.substring(6,10);
		UltDia = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
	
		/* Se o primeiro &eacute; numero */
		if (IsNumber(Dia))
			if (IsNumber(Mes))
				if (Date.charAt(2)=="/")
					if (parseFloat(Mes) > 0 && parseFloat(Mes) < 13)
						if (parseFloat(Dia) > 0 && parseFloat(Dia) <= UltDia[parseFloat(Mes)-1])
							if (Date.charAt(5)=="/")
								if (parseFloat(Ano) >= 0)
									return(true);
								else
									return(false);
							else
								return(false);
						else
							return(false);
					else
						return(false);
				else
					return(false);
		else
			return(false);
	}
	
	function IsTime(Time){
		Hora = Time.substring(0,2);
		Minuto = Time.substring(3,5);
	
		if (IsNumber(Hora) && parseInt(Hora) >= 0 && parseInt(Hora) < 24)
			if (IsNumber(Minuto) && parseInt(Minuto) >= 0 && parseInt(Minuto) < 60)
				return(true);
			else
				return(false);
		else
			return(false);
	}
	
	function IsTimeComplete(Time){
		Hora = Time.substring(0,2);
		Minuto = Time.substring(3,5);
		Segundo = Time.substring(6,8);
	
		if (IsNumber(Hora) && parseInt(Hora) >= 0 && parseInt(Hora) < 24)
			if (IsNumber(Minuto) && parseInt(Minuto) >= 0 && parseInt(Minuto) < 60)
				if (IsNumber(Segundo) && parseInt(Segundo) >= 0 && parseInt(Segundo) < 60)
					return(true);
				else
					return(false);
			else
				return(false);
		else
			return(false);
	}
	
	function IsCPF(CPF){
		var varCPF="";
		var indSoma, varSoma, varDigito1, varvarDigito2;
		
		varCPF = fncFiltraValor(CPF);
		
		if(varCPF.length != 11)
			return(false);
      
		/* Evitar que o 00000000000 passe pelo teste */
		if(CPF == "00000000000")
			return(false);

		/* Verificar o primeiro digito */
		varSoma = 0;
  
		for(indSoma=0; indSoma<=8; indSoma++){varSoma = varSoma + (parseInt(varCPF.charAt(indSoma))*(indSoma+1));}
  
		/* Obter o resto da divisao da soma com 11 */
		varDigito1 = varSoma % 11;
  
		/* Caso seja 10, deve-se transformar para 0 */
		if(varDigito1 == 10) 
			varDigito1 = 0;

		/* Verificar o segundo digito */
		varSoma = 0;
  
		for(indSoma=0; indSoma<=7; indSoma++){varSoma = varSoma + (parseInt(varCPF.charAt(indSoma+1))*(indSoma+1));}

		varSoma = varSoma + (varDigito1*9);

		/* Obter o resto da divisao da soma com 11 */
		varDigito2 = varSoma % 11;

		/* Caso seja 10, deve-se transformar para 0 */
		if(varDigito2 == 10){varDigito2 = 0;}
		
		/* Fazer a validacao dos digitos com os digitos verificadores do CPF */
		if (varDigito1 == parseInt(varCPF.charAt(9)) && varDigito2 == parseInt(varCPF.charAt(10))){return(true);}
	
		return(false);
	}
	
	function IsCNPJ(CNPJ){
		var varCNPJ="";
		var indSoma, varSoma, varDigito1, varDigito2;

		varCNPJ = fncFiltraValor(CNPJ);
   
		/* Validar o tamanho */
		if(varCNPJ.length != 14)
			return(false);  
  
		/* Verificar o primeiro digito */
		varSoma = 0;
		varMult = 5;

		for(indSoma=0; indSoma<12; indSoma++){
			if(varMult==1){varMult=9};
			varSoma += parseInt(varCNPJ.charAt(indSoma))*varMult;
			varMult -= 1;
		}	
		 
		varDigito1 = varSoma % 11;
  
		if (varDigito1 <= 1){varDigito1 = 0;}else{varDigito1 = 11 - varDigito1;}

		/* Verificar o segundo digito */
		varSoma = 0;
		varMult = 6;

		for(indSoma=0; indSoma<12; indSoma++){
			if(varMult==1){varMult=9};
			varSoma += parseInt(varCNPJ.charAt(indSoma))*varMult;
			varMult -= 1;
		}	

		varSoma += varDigito1*2;
		varDigito2 = varSoma % 11;

		if (varDigito2 <= 1){varDigito2 = 0;}else{varDigito2 = 11 - varDigito2;}

		/* Fazer a validacao dos digitos com os digitos verificadores do CNPJ */
		if (parseInt(varCNPJ.charAt(12)) == varDigito1 && parseInt(varCNPJ.charAt(13)) == varDigito2){return(true)};

		return(false);
	}
	
	function fncIsEstadoCep(varUf, varCep){
		varCepFiltrado = fncFiltraValor(varCep);

		var varCepParc = varCepFiltrado.substring(0, 3);


		if ( varUf.length == 0 || varCepParc == 0 )
			return false;

		switch ( varUf ){
			case 'AC':
				if ( varCepParc == 699 ) bOk = true; else bOk = false;
				break;

			case 'AL':
				if ( varCepParc >= 570 && varCepParc <= 579 ) bOk = true; else bOk = false;
				break;

			case 'AM':
				if ( (varCepParc >= 690 && varCepParc <= 692) || (varCepParc >= 694 && varCepParc <= 698) ) bOk = true; else bOk = false;
				break;

			case 'AP':
				if ( varCepParc == 689 ) bOk = true; else bOk = false;
				break;

			case 'BA':
				if ( varCepParc >= 400 && varCepParc <= 489 ) bOk = true; else bOk = false;
				break;

			case 'CE':
				if ( varCepParc >= 600 && varCepParc <= 639 ) bOk = true; else bOk = false;
				break;

			case 'DF':
				if ( (varCepParc >= 700 && varCepParc <= 727) || (varCepParc >= 730 && varCepParc <= 736) ) bOk = true; else bOk = false;
				break;

			case 'ES':
				if ( varCepParc >= 290 && varCepParc <= 299 ) bOk = true; else bOk = false;
				break;

			case 'GO':
				if ( (varCepParc >= 728 && varCepParc <= 729) || (varCepParc >= 737 && varCepParc <= 769) ) bOk = true; else bOk = false;
				break;

			case 'MA':
				if ( varCepParc >= 650 && varCepParc <= 659 ) bOk = true; else bOk = false;
				break;

			case 'MG':
				if ( varCepParc >= 300 && varCepParc <= 399 ) bOk = true; else bOk = false;
				break;

			case 'MS':
				if ( varCepParc >= 790 && varCepParc <= 799 ) bOk = true; else bOk = false;
				break;

			case 'MT':
				if ( varCepParc >= 780 && varCepParc <= 788 ) bOk = true; else bOk = false;
				break;

			case 'PA':
				if ( varCepParc >= 660 && varCepParc <= 688 ) bOk = true; else bOk = false;
				break;

			case 'PB':
				if ( varCepParc >= 580 && varCepParc <= 589 ) bOk = true; else bOk = false;
				break;

			case 'PE':
				if ( varCepParc >= 500 && varCepParc <= 569 ) bOk = true; else bOk = false;
				break;

			case 'PI':
				if ( varCepParc >= 640 && varCepParc <= 649 ) bOk = true; else bOk = false;
				break;

			case 'PR':
				if ( varCepParc >= 800 && varCepParc <= 879 ) bOk = true; else bOk = false;
				break;

			case 'RJ':
				if ( varCepParc >= 200 && varCepParc <= 289 ) bOk = true; else bOk = false;
				break;

			case 'RN':
				if ( varCepParc >= 590 && varCepParc <= 599 ) bOk = true; else bOk = false;
				break;

			case 'RO':
				if ( varCepParc == 789 ) bOk = true; else bOk = false;
				break;

			case 'RR':
				if ( varCepParc == 693 ) bOk = true; else bOk = false;
				break;

			case 'RS':
				if ( varCepParc >= 900 && varCepParc <= 999 ) bOk = true; else bOk = false;
				break;

			case 'SC':
				if ( varCepParc >= 880 && varCepParc <= 899 ) bOk = true; else bOk = false;
				break;

			case 'SE':
				if ( varCepParc >= 490 && varCepParc <= 499 ) bOk = true; else bOk = false;
				break;

			case 'SP':
				if ( varCepParc >= 10 && varCepParc <= 199 ) bOk = true; else bOk = false;
				break;

			case 'TO':
				if ( varCepParc >= 770 && varCepParc <= 779 ) bOk = true; else bOk = false;
				break;
		}

		if ( bOk == false )
			return false;

		return true;
	}

	/* Formatador de String */
	function fncTrim(varString){
		i = 0;

		//Realizar um LeftTrim
		while(varString.charAt(i)==" "){
			i = i + 1;
		}
		varNewString = varString.substring(i,varString.length);
		
		i = varNewString.length;
		
		//Realizar um RightTrim
		while(varNewString.charAt(i-1)==" "){
			i = i - 1;
		}

		return(varNewString.substring(0,i));
	}

	function fncFormataCep(formulario, campo){
		if(window.event.keyCode==8 || window.event.keyCode==37 || window.event.keyCode==39 || window.event.keyCode==46)return false;

		document.forms[formulario].elements[campo].value = fncFiltraCampo(formulario, campo);
		vr = document.forms[formulario].elements[campo].value;
		tam = vr.length;

		if ( tam > 2 && tam < 5 )
			document.forms[formulario].elements[campo].value = vr.substr( 0, tam - 2  ) + '.' + vr.substr( tam - 2, tam );
		if ( tam >= 5 && tam <= 8 ) 
			document.forms[formulario].elements[campo].value = vr.substr( 0, 2 ) + '.' + vr.substr( 2, 3 ) + '-' + vr.substr( 5, 3 ); 
	}
	
	function fncFormataCNPJ(formulario, campo){
		if(window.event.keyCode==8 || window.event.keyCode==37 || window.event.keyCode==39 || window.event.keyCode==46)return false;

		document.forms[formulario].elements[campo].value = fncFiltraCampo(formulario, campo);
		vr = document.forms[formulario].elements[campo].value;

		if ( vr.length >= 2 && vr.length < 5 )
			document.forms[formulario].elements[campo].value = vr.substr( 0, 2  ) + '.' + vr.substr( 2, vr.length-2 );
		if ( vr.length >= 5 && vr.length < 8 )
			document.forms[formulario].elements[campo].value = vr.substr( 0, 2  ) + '.' + vr.substr( 2, 3 ) + '.' + vr.substr( 5, vr.length-5 );
		if ( vr.length >= 9 && vr.length < 12 )
			document.forms[formulario].elements[campo].value = vr.substr( 0, 2  ) + '.' + vr.substr( 2, 3 ) + '.' + vr.substr( 5, 3 ) + '/' + vr.substr( 8, vr.length-8 );
		if ( vr.length > 12 )
			document.forms[formulario].elements[campo].value = vr.substr( 0, 2  ) + '.' + vr.substr( 2, 3 ) + '.' + vr.substr( 5, 3 ) + '/' + vr.substr( 8, 4 ) + '-' + vr.substr( 12, vr.length-2 );
	}
	
	function fncFormataCPF(formulario, campo){
		if(window.event.keyCode==8 || window.event.keyCode==37 || window.event.keyCode==39 || window.event.keyCode==46)return false;

		document.forms[formulario].elements[campo].value = fncFiltraCampo(formulario, campo);
		vr = document.forms[formulario].elements[campo].value;

		if ( vr.length >=3 && vr.length < 6 )
			document.forms[formulario].elements[campo].value = vr.substr( 0, 3  ) + '.' + vr.substr( 3, vr.length-3 );
		if ( vr.length >=6 && vr.length < 9 )
			document.forms[formulario].elements[campo].value = vr.substr( 0, 3  ) + '.' + vr.substr( 3, 3 ) + '.' + vr.substr( 6, vr.length-6 );
		if ( vr.length > 9 )
			document.forms[formulario].elements[campo].value = vr.substr( 0, 3  ) + '.' + vr.substr( 3, 3 ) + '.' + vr.substr( 6, 3 ) + '-' + vr.substr( 9, vr.length-9 );
	}
	
	function fncFormataData(formulario, campo){
		if(window.event.keyCode==8 || window.event.keyCode==37 || window.event.keyCode==39 || window.event.keyCode==46)return false;

		document.forms[formulario].elements[campo].value = fncFiltraCampo(formulario, campo);
		vr = document.forms[formulario].elements[campo].value;
		tam = vr.length;

		if ( tam > 2 && tam < 5 )
			document.forms[formulario].elements[campo].value = vr.substr( 0, tam - 2  ) + '/' + vr.substr( tam - 2, tam );
		if ( tam >= 5 && tam <= 10 ) 
			document.forms[formulario].elements[campo].value = vr.substr( 0, 2 ) + '/' + vr.substr( 2, 2 ) + '/' + vr.substr( 4, 4 ); 
	}
	
	function fncFormataDocumento(formulario, campo){
		document.forms[formulario].elements[campo].value=fncFiltraValor(document.forms[formulario].elements[campo].value);

		if(document.forms[formulario].elements[campo].value.length <= 11)
			fncFormataCPF(formulario, campo);
		else
			fncFormataCNPJ(formulario, campo);
	}

	function fncFormataHora(formulario, campo){
		if(window.event.keyCode==8 || window.event.keyCode==37 || window.event.keyCode==39 || window.event.keyCode==46)return false;

		document.forms[formulario].elements[campo].value = fncFiltraCampo(formulario, campo);
		vr = document.forms[formulario].elements[campo].value;
		tam = vr.length;

		if ( tam > 2 && tam < 5 )
			document.forms[formulario].elements[campo].value = vr.substr( 0, tam - 2  ) + ':' + vr.substr( tam - 2, tam );
	}
	
	function fncFormataHoraCompleta(formulario, campo){
		if(window.event.keyCode==8 || window.event.keyCode==37 || window.event.keyCode==39 || window.event.keyCode==46)return false;

		document.forms[formulario].elements[campo].value = fncFiltraCampo(formulario, campo);
		vr = document.forms[formulario].elements[campo].value;
		tam = vr.length;

		if ( tam > 2 && tam < 5 )
			document.forms[formulario].elements[campo].value = vr.substr( 0, tam - 2  ) + ':' + vr.substr( tam - 2, tam );
		if ( tam >= 5 && tam <= 8 ) 
			document.forms[formulario].elements[campo].value = vr.substr( 0, 2 ) + ':' + vr.substr( 2, 2 ) + ':' + vr.substr( 4, 2 ); 
	}
	
	function fncFormataTelefone(formulario, campo){
		if(window.event.keyCode==8 || window.event.keyCode==37 || window.event.keyCode==39 || window.event.keyCode==46)return false;

		document.forms[formulario].elements[campo].value = fncFiltraCampo(formulario, campo);
		vr = document.forms[formulario].elements[campo].value;
		tam = vr.length;

		if ( tam > 2 && tam <= 5 && vr.substr( 0, 1 ) != '0')
			document.forms[formulario].elements[campo].value = '(' + vr.substr( 0, tam - 2  ) + ')' + vr.substr( tam - 2, tam );
		if ( tam >= 6 && tam <= 9 && vr.substr( 0, 1 ) != '0') 
			document.forms[formulario].elements[campo].value = '(' + vr.substr( 0, 2 ) + ')' + vr.substr( 2, 3 ) + '-' + vr.substr( 5, 4 ); 
		if ( tam == 10 && vr.substr( 0, 1 ) != '0')
			document.forms[formulario].elements[campo].value = '(' + vr.substr( 0, 2 ) + ')' + vr.substr( 2, 4 ) + '-' + vr.substr( 6, 4 ); 
		if ( tam == 10 && vr.substr( 0, 1 ) == '0')
			document.forms[formulario].elements[campo].value = vr.substr( 0, 4 ) + ' ' + vr.substr( 4, 2 ) + ' ' + vr.substr( 6, 2 ) + ' ' + vr.substr( 8, 2 ); 
		if ( tam == 11 && vr.substr( 0, 1 ) == '0' && vr.charAt(2) != '0')
			document.forms[formulario].elements[campo].value = '(' + vr.substr( 0, 3 ) + ')' + vr.substr( 3, 4 ) + '-' + vr.substr( 7, 4 ); 
		if ( tam == 11 && vr.substr( 0, 1 ) == '0' && vr.charAt(2) == '0')
			document.forms[formulario].elements[campo].value = vr.substr( 0, 4 ) + ' ' + vr.substr( 4, 3 ) + ' ' + vr.substr( 7, 2 ) + ' ' + vr.substr( 9, 2 ); 
	}

	function fncFormataValor(formulario, campo, decimais, decimalformat) {
		if(window.event.keyCode==8 || window.event.keyCode==37 || window.event.keyCode==39 || window.event.keyCode==46)return false;

		fncFiltraCampo(formulario, campo);

		document.forms[formulario].elements[campo].value = fncFiltraCampo(formulario, campo);
		vr = document.forms[formulario].elements[campo].value;
		tam = vr.length;

		switch(decimalformat){
			case "BR":
				decimal = ",";
				milhar  = ".";
				break;

			case "US":
				decimal = ".";
				milhar  = ",";
				break;
		}

		if ( tam <= decimais ){ 
	 		document.forms[formulario].elements[campo].value = vr ; }
	 	if ( (tam > decimais) && (tam <= decimais+3) ){
	 		document.forms[formulario].elements[campo].value = vr.substr( 0, tam - decimais ) + decimal + vr.substr( tam - decimais, tam ) ; }
	 	if ( (tam >= decimais+4) && (tam <= decimais+6) ){
	 		document.forms[formulario].elements[campo].value = vr.substr( 0, tam - decimais - 3 ) + milhar + vr.substr( tam - decimais - 3, 3 ) + decimal + vr.substr( tam - decimais, tam ) ; }
	 	if ( (tam >= decimais+7) && (tam <= decimais+9) ){
	 		document.forms[formulario].elements[campo].value = vr.substr( 0, tam - decimais - 6  ) + milhar + vr.substr( tam - decimais - 6, 3 ) + milhar + vr.substr( tam - decimais - 3, 3 ) + decimal + vr.substr( tam - decimais, tam ) ; }
	 	if ( (tam >= decimais+10) && (tam <= decimais+12) ){
	 		document.forms[formulario].elements[campo].value = vr.substr( 0, tam - decimais - 9 ) + milhar + vr.substr( tam - decimais - 9, 3 ) + milhar + vr.substr( tam - decimais - 6, 3 ) + milhar + vr.substr( tam - decimais - 3, 3 ) + decimal + vr.substr( tam - decimais, tam ) ; }
	 	if ( (tam >= decimais+13) && (tam <= decimais+15) ){
	 		document.forms[formulario].elements[campo].value = vr.substr( 0, tam - decimais - 12 ) + milhar + vr.substr( tam - decimais - 12, 3 ) + milhar + vr.substr( tam - decimais - 9, 3 ) + milhar + vr.substr( tam - decimais - 6, 3 ) + milhar + vr.substr( tam - decimais - 3, 3 ) + decimal + vr.substr( tam - decimais, tam ) ; }
		return;
	}

	function fncFiltraCampo(formulario, campo){
		var s = "";
		var cp = "";
		var invalidos = "A&Aacute;&Agrave;&Atilde;&Acirc;&Auml;BC&Ccedil;DE&Eacute;&Egrave;&Ecirc;&Euml;FGHI&Iacute;&Igrave;&Icirc;&Iuml;JKLMNO&Oacute;&Ograve;&Otilde;&Ocirc;&Ouml;PQRSTU&Uacute;&Ugrave;&Ucirc;&Uuml;VWXYZa&aacute;&agrave;&atilde;&acirc;&auml;bc&ccedil;de&eacute;&egrave;&ecirc;&euml;fghi&iacute;&igrave;&icirc;&iuml;jklmno&oacute;&ograve;&otilde;&ocirc;&ouml;pqrstu&uacute;&ugrave;&ucirc;&uuml;vwxyz`&acute;^~&uml;'\"@#$%&uml;&*()-_+={}[]<>:;?,./|";

		vr = document.forms[formulario].elements[campo].value;
		tam = vr.length;
		for (i = 0; i < tam ; i++) {  
			if(invalidos.indexOf(vr.substring(i,i + 1))==-1){
			 	s = s + vr.substring(i,i + 1);}
		}
		document.forms[formulario].elements[campo].value = s;
		return cp = document.forms[formulario].elements[campo].value
	}
	
	function fncFiltraSenha(formulario, campo){
		var s = "";
		var cp = "";
		var invalidos = "&Aacute;&Agrave;&Atilde;&Acirc;&Auml;&Ccedil;&Eacute;&Egrave;&Ecirc;&Euml;&Iacute;&Igrave;&Icirc;&Iuml;&Oacute;&Ograve;&Otilde;&Ocirc;&Ouml;&Uacute;&Ugrave;&Ucirc;&Uuml;&aacute;&agrave;&atilde;&acirc;&auml;&ccedil;&eacute;&egrave;&ecirc;&euml;&iacute;&igrave;&icirc;&iuml;&oacute;&ograve;&otilde;&ocirc;&ouml;&uacute;&ugrave;&ucirc;&uuml;`&acute;^~&uml;'\"@#$%&uml;&*()-_+={}[]<>:;?,./|";

		vr = document.forms[formulario].elements[campo].value;
		tam = vr.length;
		for (i = 0; i < tam ; i++) {  
			if(invalidos.indexOf(vr.substring(i,i + 1))==-1){
			 	s = s + vr.substring(i,i + 1);}
		}
		document.forms[formulario].elements[campo].value = s;
		return cp = document.forms[formulario].elements[campo].value
	}
	
	function fncFiltraValor(Valor){
		var s = "";
		var cp = "";
		var invalidos = "A&Aacute;&Agrave;&Atilde;&Acirc;&Auml;BC&Ccedil;DE&Eacute;&Egrave;&Ecirc;&Euml;FGHI&Iacute;&Igrave;&Icirc;&Iuml;JKLMNO&Oacute;&Ograve;&Otilde;&Ocirc;&Ouml;PQRSTU&Uacute;&Ugrave;&Ucirc;&Uuml;VWXYZa&aacute;&agrave;&atilde;&acirc;&auml;bc&ccedil;de&eacute;&egrave;&ecirc;&euml;fghi&iacute;&igrave;&icirc;&iuml;jklmno&oacute;&ograve;&otilde;&ocirc;&ouml;pqrstu&uacute;&ugrave;&ucirc;&uuml;vwxyz`&acute;^~&uml;'\"@#$%&uml;&*()-_+={}[]<>:;?,./|";

		vr = Valor;
		tam = vr.length;
		for (i = 0; i < tam ; i++) {  
			if(invalidos.indexOf(vr.substring(i,i + 1))==-1){
			 	s = s + vr.substring(i,i + 1);}
		}

		return s
	}
	
	function fncSaltaCampo(formulario, prox){
		document.forms[formulario].elements[prox].focus();
	}
	
	function fncTestarNumero(formulario, campo){
		document.forms[formulario].elements[campo].value = fncFiltraCampo(formulario, campo);
		vr = document.forms[formulario].elements[campo].value;
		digito = vr.substr(tam-1, tam);

		if(!IsNumber(digito)){
		  vr = vr.substr(0, tam-1);
		}

		digito = vr.substr(0, 1);

		if(!IsNumber(digito)){
		  vr = vr.substr(1, tam);
		}

		document.forms[formulario].elements[campo].value = vr;
	}

	function fncVerificarTamanho(formulario, campo, quantidade){
		if (parseInt(document.forms[formulario].elements[campo].value.length) > parseInt(quantidade)){
			window.alert("Este campo deve conter at&eacute; " + quantidade + " caracteres!");
			document.forms[formulario].elements[campo].value = document.forms[formulario].elements[campo].value.substring(0, parseInt(quantidade)-1);
			document.forms[formulario].elements[campo].focus();
		}
	}
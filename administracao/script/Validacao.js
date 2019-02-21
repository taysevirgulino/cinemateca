	function isNumero(pStr)
	{
		//Apenas numeros ou digitos
		//Ex: 123
		var expressao = /^\d+$/;
		return expressao.test(pStr);
	}
	
	function isDecimal(pStr)
	{
		//Numeros decimais ou float
		//Ex: 12,34
		var expressao = /^[+-]?((\d+|\d{1,3}(\.\d{3})+)(\,\d*)?|\,\d+)$/;
		return expressao.test(pStr);
	}

	function isMoeda(pStr)
	{
		//Valor financeiro ou moeda
		//Ex: 1.000,00
		var expressao = /^\d{1,3}(\.\d{3})*\,\d{2}$/;
		return expressao.test(pStr);
	}

	function isData(pStr)
	{
		//Data BR dd/mm/yyyy
		//Ex: 26/09/2005
		var expressao = /^((0[1-9]|[12]\d)\/(0[1-9]|1[0-2])|30\/(0[13-9]|1[0-2])|31\/(0[13578]|1[02]))\/\d{4}$/;
		return expressao.test(pStr);
	}

	function isHora(pStr)
	{
		//Hora BR HH:MM:SS
		//Ex: 16:58:25
		var expressao = /^([0-1]\d|2[0-3]):[0-5]\d:[0-5]\d$/;
		return expressao.test(pStr);
	}

	function isEmail(pStr)
	{
		//Formato email
		//Ex: email@email.com.br
		var expressao = /^[\w-]+(\.[\w-]+)*@(([A-Za-z\d][A-Za-z\d-]{0,61}[A-Za-z\d]\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
		return expressao.test(pStr);
	}
	
	function isCep(pStr)
	{
		//Formato CEP
		//Ex: 77000-000
		var expressao = /^[0-9]{5}-[0-9]{3}$/;
		return expressao.test(pStr);
	}
	
	function isLetras(pStr)
	{
		//Somente Letras
		//Ex: aeiou
		var expressao = /^[A-Za-z]+$/;
		return expressao.test(pStr);
	}
	
	function isNulo(pStr){
		//Valor Nulo
		var expressao = /^.+$/;
		return ! expressao.test(pStr);
	}
	

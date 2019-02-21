var dialog		= window.parent ;
var oEditor		= dialog.InnerDialogLoaded() ;
var FCK			= oEditor.FCK ;
var FCKLang		= oEditor.FCKLang ;
var FCKConfig	= oEditor.FCKConfig ;

dialog.AddTab( 'Info', oEditor.FCKLang.DlgInfoTab ) ;

window.onload = function()
{
	oEditor.FCKLanguageManager.TranslatePage(document) ;
	dialog.SetAutoSize( true ) ;
	dialog.SetOkButton( true ) ;
	SelectField( 'txtEmbed' ) ;
}

function Ok()
{
	if( ValidateForm() ){
		UpdateValuesEmbed();
	
		var txtEmbed = GetE('txtEmbed');
		oEditor.FCK.InsertHtml( txtEmbed.value ) ;
	}else{
		return false;
	}
	
	return true ;
}

function ValidateForm()
{
	var txtEmbed = GetE('txtEmbed');
	var txtWidth = GetE('txtWidth');
	var txtHeight = GetE('txtHeight');
	
	CleanEmbed();
	
	if(txtEmbed.value.length <= 0){
		alert( oEditor.FCKLang.DlgdpEmbedFieldEmbed );
		txtEmbed.focus();
		return false;
	}
	
	if(txtWidth.value.length <= 0){
		alert( oEditor.FCKLang.DlgdpEmbedFieldWidth );
		txtWidth.focus();
		return false;
	}

	if(txtHeight.value.length <= 0){
		alert( oEditor.FCKLang.DlgdpEmbedFieldHeight );
		txtHeight.focus();
		return false;
	}
	
	return true;
}

var embedWidth = 320;
var embedHeight = 240;

function FilterEmbed()
{
	CleanEmbed();
	GetValuesEmbed();
}

function GetValuesEmbed()
{
	var valueEmbed = GetE('txtEmbed').value;

	if(valueEmbed.length > 0){
		var parWidth = /width=[\"|']([0-9]{1,10})[\"|']/i;
		var rsWidth = valueEmbed.match(parWidth);
		if(rsWidth != null){
			embedWidth = rsWidth[1];
		}
	
		var parHeight = /height=[\"|']([0-9]{1,10})[\"|']/i;
		var rsHeight = valueEmbed.match(parHeight);
		if(rsHeight != null){
			embedHeight = rsHeight[1];
		}
		
		ResetSizes();
	}
}

function CleanEmbed()
{
	var txtEmbed = GetE('txtEmbed');
	txtEmbed.value = trim( strip_tags(txtEmbed.value, "<embed>") );
}

function UpdateValuesEmbed()
{
	var txtEmbed = GetE('txtEmbed');	
	var valueEmbed = txtEmbed.value;
	
	if(valueEmbed.length > 0){
		valueEmbed = valueEmbed.replace(/width=[\"|']([0-9]{1,10})[\"|']/gi, 'width="'+GetE('txtWidth').value+'"');
		valueEmbed = valueEmbed.replace(/height=[\"|']([0-9]{1,10})[\"|']/gi, 'height="'+GetE('txtHeight').value+'"');
		
		txtEmbed.value = valueEmbed;
	}
}

var bLockRatio = true ;

function SwitchLock( lockButton )
{
	bLockRatio = !bLockRatio ;
	lockButton.className = bLockRatio ? 'BtnLocked' : 'BtnUnlocked' ;
	lockButton.title = bLockRatio ? 'Lock sizes' : 'Unlock sizes' ;

	if ( bLockRatio )
	{
		if ( GetE('txtWidth').value.length > 0 )
			OnSizeChanged( 'Width', GetE('txtWidth').value ) ;
		else
			OnSizeChanged( 'Height', GetE('txtHeight').value ) ;
	}
}

function OnSizeChanged( dimension, value )
{
	if ( bLockRatio )
	{
		var e = dimension == 'Width' ? GetE('txtHeight') : GetE('txtWidth') ;

		if ( value.length == 0 || isNaN( value ) )
		{
			e.value = '' ;
			return ;
		}

		if ( dimension == 'Width' )
			value = value == 0 ? 0 : Math.round( embedHeight * ( value  / embedWidth ) ) ;
		else
			value = value == 0 ? 0 : Math.round( embedWidth  * ( value / embedHeight ) ) ;

		if ( !isNaN( value ) )
			e.value = value ;
	}
	
	UpdateValuesEmbed();
}

function ResetSizes()
{
	GetE('txtWidth').value  = embedWidth;
	GetE('txtHeight').value = embedHeight;
	
	UpdateValuesEmbed();
}
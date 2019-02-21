// Register the related commands.
FCKCommands.RegisterCommand( 'dpEmbed', new FCKDialogCommand( FCKLang['DlgdpEmbedTitle'], FCKLang['DlgdpEmbedTitle'], FCKConfig.PluginsPath + 'dpEmbed/dpEmbed.html', 450, 300 ) ) ;

// Create the "dpEmbed" toolbar button.
var oFindItem		= new FCKToolbarButton( 'dpEmbed', FCKLang['dpEmbedTip'] ) ;
oFindItem.IconPath	= FCKConfig.PluginsPath + 'dpEmbed/dpEmbed.gif' ;

FCKToolbarItems.RegisterItem( 'dpEmbed', oFindItem ) ;			// 'dpEmbed' is the name used in the Toolbar config.

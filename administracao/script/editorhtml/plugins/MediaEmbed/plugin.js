/*
* @example An iframe-based dialog with custom button handling logics.
*/
( function() {
    CKEDITOR.plugins.add( 'MediaEmbed',
    {
        requires: [ 'iframedialog' ],
        init: function( editor )
        {
           var me = this;
           CKEDITOR.dialog.add( 'MediaEmbedDialog', function ()
           {
              return {
                 title : 'Inserir c�digo Embed',
                 minWidth : 550,
                 minHeight : 200,
                 contents :
                       [
                          {
                             id : 'iframe',
                             label : 'Inserir c�digo Embed',
                             expand : true,
                             elements :
                                   [
                                      {
						               type : 'html',
						               id : 'pageMediaEmbed',
						               label : 'Embed Media',
						               style : 'width : 100%;',
						               html : '<iframe src="'+me.path+'/dialogs/mediaembed.html" frameborder="0" name="iframeMediaEmbed" id="iframeMediaEmbed" allowtransparency="1" style="width:100%;margin:0;padding:0;"></iframe>'
						              }
                                   ]
                          }
                       ],
                 onOk : function()
                 {
					for (var i=0; i<window.frames.length; i++) {
					   if(window.frames[i].name == 'iframeMediaEmbed') {
					      var content = window.frames[i].document.getElementById("embed").value;
					   }
					}
                    editor.insertHtml('<div class="media_embed">'+content+'</div>');
                 }
              };
           } );

            editor.addCommand( 'MediaEmbed', new CKEDITOR.dialogCommand( 'MediaEmbedDialog' ) );

            editor.ui.addButton( 'MediaEmbed',
            {
                label: 'Inserir c�digo Embed',
                command: 'MediaEmbed',
                icon: this.path + 'images/icon.gif'
            } );
        }
    } );
} )();

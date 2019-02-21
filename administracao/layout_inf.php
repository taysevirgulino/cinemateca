		</td>
      </tr>
	  <!-- Corpo.Fim() -->
      <? if($ShowTop){ ?>
	  <!-- Rodape.Inicio() -->
	  <tr>
        <td>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td class="Rodape">
            	Controle Administrativo e Gerenciador de Conteúdo<br />
                Desenvolvido por <a href="http://www.crptecnologia.com.br/" target="_blank">CRP - Tecnologia| www.crptecnologia.com.br | suporte@crptecnologia.com.br</a> 
            </td>
          </tr>
        </table></td>
      </tr>
	  <!-- Rodape.Fim() -->
      <? } ?>
    </table>
	</td>
  </tr>
</table>
<? if($ShowTop){ ?>
<script language="javascript">
	/*$("#pagecontent a[rel!=notcolorbox][id!=link_list]").colorbox({
		width:"1025", 
		height:"95%", 
		iframe:true,
		href: function(){
			var url = $(this).attr('href');
			var test = /\?/;
			return url+((test.test(url)) ? '&' : '?' )+'menu=disabled';
		},
		onClosed:function(){
			var test = /(_list|_view)/;
			if(test.test(document.location)){
				window.open(document.location, "_parent");
			}			
		}
	});*/
</script>
<? }else{ ?>
<script language="javascript">
	$("a[rel!=notcolorbox]").attr( 'href', function(){
		var url = $(this).attr('href');
		var test = /\?/;
		return url+((test.test(url)) ? '&' : '?' )+'menu=disabled';
	});
	$(".paginacao_local a").attr( 'href', function(){
		var url = $(this).attr('href');
		var test = /\?/;
		return url+((test.test(url)) ? '&' : '?' )+'menu=disabled';
	});
	$("form[rel!=notcolorbox]").attr( 'action', function(){
		var url = $(this).attr('action');
		var test = /\?/;
		return url+((test.test(url)) ? '&' : '?' )+'menu=disabled';
	});
</script>
<? } ?>
<script type="text/javascript"> 
	$('a[title],.table_list img[title]').qtip({
		style: {
			tip: true,
			classes: "qtip-red"
		},
		position: {
			at: "top center",
			my: "bottom center"
		}
	});
</script>
</body>
</html>
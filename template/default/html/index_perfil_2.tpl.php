{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<script type="application/javascript">
		$(document).ready(function() {
	
			$('#full-calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				buttonIcons: false, // show the prev/next text
				weekNumbers: false,
				editable: false,
				eventLimit: true, // allow "more" link when too many events
				events: {$Fullcalendar},
				eventRender: function(event, element) {
					{literal}
					element.popover({
						title: event.lojista,
						placement:'auto',
						html:true,
						trigger : 'hover',
						animation : 'true',
						content: "["+event.status+"] "+event.data+": "+event.description+" > "+event.title,
						container:'body'
					});
					{/literal}
				}
			});
			
		});
	</script>
{/block}

{block name=body_interna}

<div class="row">
	<div class="col-md-8">
	</div>	
	<div class="col-md-4">
		<h4>Atalhos <i class="fa fa-external-link"></i></h4>
		<div class="list-group"> 
			<!-- <a href="{$URL_PATH}lojista-selecionar?page=lojista-cronograma" class="list-group-item"> <i class="fa fa-check-square-o"></i> &nbsp;&nbsp;<strong>Atualizar</strong> Cronogramas </a> 
			<a href="{$URL_PATH}lojista-selecionar?page=arquivo-list" class="list-group-item"> <i class="fa fa-file-text"></i> &nbsp;&nbsp;<strong>Acompanhar</strong> Arquivos/Protocolos </a> 
			<a href="{$URL_PATH}lojista-selecionar?page=foto-list" class="list-group-item"> <i class="fa fa-camera-retro"></i> &nbsp;&nbsp;<strong>Publicar</strong> Fotografias </a> 
			<a href="{$URL_PATH}notificacoes" class="list-group-item"> <i class="fa fa-bell"></i> &nbsp;&nbsp;<strong>Ver</strong> Notificações </a> 
			<a href="{$URL_PATH}mensagem-list" class="list-group-item"> <i class="fa fa-envelope"></i> &nbsp;&nbsp;<strong>Ler</strong> Mensagens </a> -->
			<a href="{$URL_PATH}mensagem-list" class="list-group-item"> <i class="fa fa-sign-out"></i> &nbsp;&nbsp;<strong>Sair</strong></a>
		</div>
	</div>
</div>

{/block}
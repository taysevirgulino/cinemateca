<?
	class NoticiaAttribute{
		public static function IdNoticia(){
			return "id_noticia";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdEditoria(){
			return "id_editoria";
		}
		public static function IdAreaPublicacao(){
			return "id_area_publicacao";
		}
		public static function IdAppUsuarioCadastro(){
			return "id_app_usuario_cadastro";
		}
		public static function IdAppUsuarioEdicao(){
			return "id_app_usuario_edicao";
		}
		public static function Chapeu(){
			return "chapeu";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Resumo(){
			return "resumo";
		}
		public static function Texto(){
			return "texto";
		}
		public static function Link(){
			return "link";
		}
		public static function LinkTarget(){
			return "link_target";
		}
		public static function FotoCredito(){
			return "foto_credito";
		}
		public static function FotoDescricao(){
			return "foto_descricao";
		}
		public static function FotoArquivo(){
			return "foto_arquivo";
		}
		public static function FotoAreaPublicacao(){
			return "foto_area_publicacao";
		}
		public static function Click(){
			return "click";
		}
		public static function Shares(){
			return "shares";
		}
		public static function Comments(){
			return "comments";
		}
		public static function Slug(){
			return "slug";
		}
		public static function UrlCurta(){
			return "url_curta";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function DatahoraCadastro(){
			return "datahora_cadastro";
		}
		public static function DatahoraEdicao(){
			return "datahora_edicao";
		}
		public static function Tipo(){
			return "tipo";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_noticia";
		}
		public static function _Default(){
			return NoticiaAttribute::Chapeu();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case NoticiaAttribute::IdNoticia() : { return true; } break;
				case NoticiaAttribute::Identificador() : { return true; } break;
				case NoticiaAttribute::IdeOrigem() : { return true; } break;
				case NoticiaAttribute::IdEditoria() : { return true; } break;
				case NoticiaAttribute::IdAreaPublicacao() : { return true; } break;
				case NoticiaAttribute::IdAppUsuarioCadastro() : { return true; } break;
				case NoticiaAttribute::IdAppUsuarioEdicao() : { return true; } break;
				case NoticiaAttribute::Chapeu() : { return true; } break;
				case NoticiaAttribute::Titulo() : { return true; } break;
				case NoticiaAttribute::Resumo() : { return true; } break;
				case NoticiaAttribute::Texto() : { return true; } break;
				case NoticiaAttribute::Link() : { return true; } break;
				case NoticiaAttribute::LinkTarget() : { return true; } break;
				case NoticiaAttribute::FotoCredito() : { return true; } break;
				case NoticiaAttribute::FotoDescricao() : { return true; } break;
				case NoticiaAttribute::FotoArquivo() : { return true; } break;
				case NoticiaAttribute::FotoAreaPublicacao() : { return true; } break;
				case NoticiaAttribute::Click() : { return true; } break;
				case NoticiaAttribute::Shares() : { return true; } break;
				case NoticiaAttribute::Comments() : { return true; } break;
				case NoticiaAttribute::Slug() : { return true; } break;
				case NoticiaAttribute::UrlCurta() : { return true; } break;
				case NoticiaAttribute::Datahora() : { return true; } break;
				case NoticiaAttribute::DatahoraCadastro() : { return true; } break;
				case NoticiaAttribute::DatahoraEdicao() : { return true; } break;
				case NoticiaAttribute::Tipo() : { return true; } break;
				case NoticiaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_noticia", "type"=>"bigint(20)", "text"=>"Código Notícia"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_editoria", "type"=>"bigint(20)", "text"=>"Código Editoria"),
				array("value"=>"id_area_publicacao", "type"=>"bigint(20)", "text"=>"Código Área Publicação"),
				array("value"=>"id_app_usuario_cadastro", "type"=>"bigint(20)", "text"=>"Código App Usuário Cadastro"),
				array("value"=>"id_app_usuario_edicao", "type"=>"bigint(20)", "text"=>"Código App Usuário Edição"),
				array("value"=>"chapeu", "type"=>"varchar(50)", "text"=>"Chapéu"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"resumo", "type"=>"text", "text"=>"Resumo"),
				array("value"=>"texto", "type"=>"text", "text"=>"Texto"),
				array("value"=>"link", "type"=>"varchar(255)", "text"=>"Link"),
				array("value"=>"link_target", "type"=>"varchar(20)", "text"=>"Link Abrir"),
				array("value"=>"foto_credito", "type"=>"varchar(255)", "text"=>"Foto Crédito"),
				array("value"=>"foto_descricao", "type"=>"varchar(255)", "text"=>"Foto Descrição"),
				array("value"=>"foto_arquivo", "type"=>"varchar(255)", "text"=>"Foto Arquivo"),
				array("value"=>"foto_area_publicacao", "type"=>"varchar(255)", "text"=>"Foto Área Publicação"),
				array("value"=>"click", "type"=>"bigint(20)", "text"=>"Click"),
				array("value"=>"shares", "type"=>"int(11)", "text"=>"Shares"),
				array("value"=>"comments", "type"=>"int(11)", "text"=>"Comments"),
				array("value"=>"slug", "type"=>"varchar(255)", "text"=>"Slug"),
				array("value"=>"url_curta", "type"=>"varchar(255)", "text"=>"Url (Endereço) Curta"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"datahora_cadastro", "type"=>"datetime", "text"=>"Data/Hora Cadastro"),
				array("value"=>"datahora_edicao", "type"=>"datetime", "text"=>"Data/Hora Edição"),
				array("value"=>"tipo", "type"=>"int(11)", "text"=>"Tipo"),
				array("value"=>"status", "type"=>"bigint(20)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_noticia","identificador","ide_origem","id_editoria","id_area_publicacao","id_app_usuario_cadastro","id_app_usuario_edicao","chapeu","titulo","resumo","texto","link","link_target","foto_credito","foto_descricao","foto_arquivo","foto_area_publicacao","click","shares","comments","slug","url_curta","datahora","datahora_cadastro","datahora_edicao","tipo","status");
		}
	}
?>
<?
	class CurriculoAttribute{
		public static function IdCurriculo(){
			return "id_curriculo";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdEmpreendimento(){
			return "id_empreendimento";
		}
		public static function IdCurriculoArea(){
			return "id_curriculo_area";
		}
		public static function IdCurriculoSegmento(){
			return "id_curriculo_segmento";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Sobrenome(){
			return "sobrenome";
		}
		public static function Sexo(){
			return "sexo";
		}
		public static function DataNascimento(){
			return "data_nascimento";
		}
		public static function Cpf(){
			return "cpf";
		}
		public static function EstadoCivil(){
			return "estado_civil";
		}
		public static function Telefone(){
			return "telefone";
		}
		public static function Telefone2(){
			return "telefone2";
		}
		public static function Email(){
			return "email";
		}
		public static function Endereco(){
			return "endereco";
		}
		public static function Cidade(){
			return "cidade";
		}
		public static function Estado(){
			return "estado";
		}
		public static function Imagem(){
			return "imagem";
		}
		public static function Arquivo(){
			return "arquivo";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_curriculo";
		}
		public static function _Default(){
			return CurriculoAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case CurriculoAttribute::IdCurriculo() : { return true; } break;
				case CurriculoAttribute::Identificador() : { return true; } break;
				case CurriculoAttribute::IdEmpreendimento() : { return true; } break;
				case CurriculoAttribute::IdCurriculoArea() : { return true; } break;
				case CurriculoAttribute::IdCurriculoSegmento() : { return true; } break;
				case CurriculoAttribute::Nome() : { return true; } break;
				case CurriculoAttribute::Sobrenome() : { return true; } break;
				case CurriculoAttribute::Sexo() : { return true; } break;
				case CurriculoAttribute::DataNascimento() : { return true; } break;
				case CurriculoAttribute::Cpf() : { return true; } break;
				case CurriculoAttribute::EstadoCivil() : { return true; } break;
				case CurriculoAttribute::Telefone() : { return true; } break;
				case CurriculoAttribute::Telefone2() : { return true; } break;
				case CurriculoAttribute::Email() : { return true; } break;
				case CurriculoAttribute::Endereco() : { return true; } break;
				case CurriculoAttribute::Cidade() : { return true; } break;
				case CurriculoAttribute::Estado() : { return true; } break;
				case CurriculoAttribute::Imagem() : { return true; } break;
				case CurriculoAttribute::Arquivo() : { return true; } break;
				case CurriculoAttribute::Datahora() : { return true; } break;
				case CurriculoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_curriculo", "type"=>"bigint(20)", "text"=>"Código Currículo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_empreendimento", "type"=>"bigint(20)", "text"=>"Código Empreendimento"),
				array("value"=>"id_curriculo_area", "type"=>"bigint(20)", "text"=>"Código Currículo Área"),
				array("value"=>"id_curriculo_segmento", "type"=>"bigint(20)", "text"=>"Código Currículo Segmento"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"sobrenome", "type"=>"varchar(255)", "text"=>"Sobrenome"),
				array("value"=>"sexo", "type"=>"varchar(2)", "text"=>"Sexo"),
				array("value"=>"data_nascimento", "type"=>"date", "text"=>"Data Nascimento"),
				array("value"=>"cpf", "type"=>"varchar(32)", "text"=>"Cpf"),
				array("value"=>"estado_civil", "type"=>"int(11)", "text"=>"Estado Civil"),
				array("value"=>"telefone", "type"=>"varchar(20)", "text"=>"Telefone"),
				array("value"=>"telefone2", "type"=>"varchar(20)", "text"=>"Telefone2"),
				array("value"=>"email", "type"=>"varchar(255)", "text"=>"E-mail"),
				array("value"=>"endereco", "type"=>"varchar(255)", "text"=>"Endereço"),
				array("value"=>"cidade", "type"=>"varchar(255)", "text"=>"Cidade"),
				array("value"=>"estado", "type"=>"varchar(2)", "text"=>"Estado"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
				array("value"=>"arquivo", "type"=>"varchar(255)", "text"=>"Arquivo"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_curriculo","identificador","id_empreendimento","id_curriculo_area","id_curriculo_segmento","nome","sobrenome","sexo","data_nascimento","cpf","estado_civil","telefone","telefone2","email","endereco","cidade","estado","imagem","arquivo","datahora","status");
		}
	}
?>
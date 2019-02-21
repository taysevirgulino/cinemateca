<?php
    class Validar {
    
        public static function Completo(){
            self::Usuario();
            self::Empreendimento();
        }
        
        public static function Usuario(){
            UsuarioLogin::Validar();
        }
        
        public static function Empreendimento(){
            EmpreendimentoManage2::Empreendimento_Validar();
        }
        
    }

?>
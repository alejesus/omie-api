<?php

namespace Source\App;

use League\Plates\Engine;

class Web
{

   private $view;

   // Construtor
   public function __construct()
   {

      $this->view = new \League\Plates\Engine(dirname(__DIR__,2) . "/src/Templates");

   }

   public function home(): void
   {

      echo $this->view->render( "home", [
         "title" => "Home"
      ]);

   }

   public function info(): void
   {

      echo $this->view->render( "info", [
         "versao" => "v1",
         "timestamp" => "(22-jul-2026 ~ 23:00)"
      ] );

   }

   public function testes(): void
   {

      echo "testes ...";

   }

   public function contato(): void
   {

      echo $this->view->render( "contato", [] );

   }

   public function errors(array $data): void
   {

      echo $this->view->render( "error", [
         "title" => "Ooops - Erro {$data["errcode"]}",
         "error" => $data["errcode"]
      ]);

   }

}

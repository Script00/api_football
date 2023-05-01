<?php

class Foot
{
  public $baseUri;
  public $reqPrefs = array();

/*

  // PRIMEIRO TESTE FOI FEITO COM A DOCUMENTAÇÃO DA API, DEU CERTO! MOTIVO: ENTERDER O RETORNO PARA PODER ACESSAR OS RESULTADOS.

  public function test()
  {
        $uri = 'https://api.football-data.org/v4/competitions/BSA/matches?matchday=5';
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: 6311a66f5f8746fd8860a5de6173f49f';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        $matches = json_decode($response);
  }

*/

  // Aqui, o __construct está sendo utilizado para passar argumentos para classe; eu chamo e carrego meu arquivo config.php, depois acesso minha baseUri. nas minhas preferências eu passo meu methode e importo minha key de autentição de $config que já está parametrizada.

  public function __construct() 
  {
        $this->config = parse_ini_file('config.ini', true);
        $this->baseUri = $this->config['baseUri']; 
        $this->reqPrefs['http']['method'] = 'GET';
        $this->reqPrefs['http']['header'] = 'X-Auth-Token: ' . $this->config['authToken'];
  }

  // Aqui, minha function viewmatches recebe dois parametros. O primeiro parâmetro recebe a competição e o segundo as rodadas; concateno as urls com os parâmetros e decodifico o retorno em json.

  public function viewmatches($competitions, $round) 
  {
        $resource = 'competitions/' . $competitions . '/matches/?matchday=' . $round;
        $response = file_get_contents($this->baseUri . $resource, false, stream_context_create($this->reqPrefs));

        return json_decode($response);
  }
  
}

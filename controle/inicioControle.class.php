<?php
	include"funcao.php";
	class inicioControle
    {
     function iniciar()
     {	 
        $cidade = urlencode('Jau');           
        $url = "http://servicos.cptec.inpe.br/XML/listaCidades?city=$cidade";
        $resultado = file_get_contents($url);                                             
        $resultado = new SimpleXMLElement($resultado);
        $num = $resultado->cidade->id;
        $url = "http://servicos.cptec.inpe.br/XML/cidade/$num/previsao.xml";
        $ret = file_get_contents($url);                                             
        $ret = simplexml_load_string($ret);            
        if($ret)
        {  
           echo"<div id='previsao'>";
           echo "<strong>  Previsão do Tempo - ".$ret->previsao[0]->dia." -- $ret->nome </strong>";                             
           echo"<strong>-- Máxima ".$ret->previsao[0]->maxima."º </strong";
           echo"<strong>- Mínima ".$ret->previsao[0]->minima."º</strong";
            if($ret->previsao[0]->tempo =='ec')
            {
                echo"<hstrong> - Encoberto com Chuvas Isoladas <strong>";
            }
            elseif($ret->previsao[0]->tempo =='ci')
            {
                echo"<hstrong> - Chuvas Isoladas<strong>";
            }
            elseif($ret->previsao[0]->tempo =='c')
            {
                echo"<hstrong> - Chuva <strong>";
            }
            elseif($ret->previsao[0]->tempo =='in')
            {
                echo"<hstrong> - Instável <strong>";
            }
            elseif($ret->previsao[0]->tempo =='pp')
            {
                echo"<hstrong> - Possibilidade de pancadas de chuva <strong>";
            }
            elseif($ret->previsao[0]->tempo =='cm')
            {
                echo"<hstrong> - Chuva pala Manhã <strong>";
            }
            elseif($ret->previsao[0]->tempo =='cn')
            {
                echo"<hstrong> - Chuva a noite <strong>";
            }
            elseif($ret->previsao[0]->tempo =='pm')
            {
                echo"<hstrong> - Pancadas de Chuva pela Manhã <strong>";
            }
            elseif($ret->previsao[0]->tempo =='pm')
            {
                echo"<hstrong> - Nublado com Pancadas de Chuva <strong>";
            }
            elseif($ret->previsao[0]->tempo =='pt')
            {
                echo"<hstrong> - Pancadas de Chuva a Tarde <strong>";
            }
            elseif($ret->previsao[0]->tempo =='pc')
            {
                echo"<hstrong> - Pancadas de Chuva <strong>";
            }            
            elseif($ret->previsao[0]->tempo =='pn')
            {
                echo"<hstrong> - Parcialmente Nublado<strong>";
            }
            elseif($ret->previsao[0]->tempo =='cv')
            {
                echo"<hstrong> - Chuvisco <strong>";
            }
            elseif($ret->previsao[0]->tempo =='ch')
            {
                echo"<hstrong> - Chuvoso <strong>";
            }
            elseif($ret->previsao[0]->tempo =='t')
            {
                echo"<hstrong> - Tempestade <strong>";
            }
            elseif($ret->previsao[0]->tempo =='ps')
            {
                echo"<hstrong> - Predomínio de Sol <strong>";
            }
            elseif($ret->previsao[0]->tempo =='e')
            {
                echo"<hstrong> - Céu Encoberto <strong>";
            }
            elseif($ret->previsao[0]->tempo =='n')
            {
                echo"<hstrong> - Nublado <strong>";
            }
            elseif($ret->previsao[0]->tempo =='cl')
            {
                echo"<hstrong> - Céu Claro <strong>";
            }
            elseif($ret->previsao[0]->tempo =='nv')
            {
                echo"<hstrong> - Nevoeiro <strong>";
            }
            elseif($ret->previsao[0]->tempo =='g')
            {
                echo"<hstrong> - Geada <strong>";
            }
            elseif($ret->previsao[0]->tempo =='nd')
            {
                echo"<hstrong> - Não Definido <strong>";
            }
            elseif($ret->previsao[0]->tempo =='pnt')
            {
                echo"<hstrong> - Pancadas de Chuva a Noite <strong>";
            }
            elseif($ret->previsao[0]->tempo =='psc')
            {
                echo"<hstrong> - Possibilidade de Chuva <strong>";
            }
            elseif($ret->previsao[0]->tempo =='pcm')
            {
                echo"<hstrong> - Possibilidade de Cuva pela Manhã <strong>";
            }
            elseif($ret->previsao[0]->tempo =='pct')
            {
                echo"<hstrong> - Possibilidade de Chuva a Terde <strong>";
            }
            elseif($ret->previsao[0]->tempo =='pcn')
            {
                echo"<hstrong> - Possibilidade de Chuva a Noite <strong>";
            }
            elseif($ret->previsao[0]->tempo =='npt')
            {
                echo"<hstrong> - Nublado com pancadas de Chuva a Tarde  <strong>";
            }
            elseif($ret->previsao[0]->tempo =='npn')
            {
                echo"<hstrong> - Nublado com pancadas de chuva a noite <strong>";
            }
            elseif($ret->previsao[0]->tempo =='ncn')
            {
                echo"<hstrong> - Nublado com Possibilidade de Chuva a Noite <strong>";
            }
            elseif($ret->previsao[0]->tempo =='nct')
            {
                echo"<hstrong> - Nublado com Possibilidade de Chuva a Tarde <strong>";
            }
            elseif($ret->previsao[0]->tempo =='ncm')
            {
                echo"<hstrong> - Nublado com Possibilidade de Chuva pela Manhã <strong>";
            }
            elseif($ret->previsao[0]->tempo =='npm')
            {
                echo"<hstrong> - Nublado com pancadas de Chuva pela Manhã <strong>";
            }
            elseif($ret->previsao[0]->tempo =='npp')
            {
                echo"<hstrong> - Nublado com Possibilidade de Chuva <strong>";
            }
            elseif($ret->previsao[0]->tempo =='vn')
            {
                echo"<hstrong> - Variação Nebulosidade <strong>";
            }
            elseif($ret->previsao[0]->tempo =='cv')
            {
                echo"<hstrong> - Chuvisco <strong>";
            }
            elseif($ret->previsao[0]->tempo =='ct')
            {
                echo"<hstrong> - Chuva a Tarde <strong>";
            }
            elseif($ret->previsao[0]->tempo =='ppn')
            {
                echo"<hstrong> - Possibilidade de Pancadas de Chuva a Noite <strong>";
            }
            elseif($ret->previsao[0]->tempo =='ppt')
            {
                echo"<hstrong> - Possibilidade de Pancadas de Chuva a Tarde <strong>";
            }
            elseif($ret->previsao[0]->tempo =='ppm')
            {
                echo"<hstrong> - Possibilidade de Pancadas de Chuva pela Manhã <strong>";
            }

           echo"</div>";

        } //if		
        require_once "visao/menu.php";
     }
    }
?>

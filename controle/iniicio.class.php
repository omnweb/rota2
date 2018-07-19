<?php
	class inicio
	{
		function inicio()
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
               echo "<strong>Previsão do Tempo - ".$ret->previsao[0]->dia." -- $ret->nome </strong>";                             
               echo"<strong>-- Máxima ".$ret->previsao[0]->maxima."º </strong";
               echo"<strong>- Mínima ".$ret->previsao[0]->minima."º</strong";
               if($ret)
                {  
                   echo"<div id='previsao'>";
                   echo "<strong>  Previsão do Tempo - ".$ret->previsao[0]->dia." -- $ret->nome </strong>";                             
                   echo"<strong>-- Máxima ".$ret->previsao[0]->maxima."º </strong";
                   echo"<strong>- Mínima ".$ret->previsao[0]->minima."º</strong";
                    if($ret->previsao[0]->tempo =='pn')
                    {
                        echo"<hstrong> - Parcialmente Nublado<strong>";
                    }
                    elseif($ret->previsao[0]->tempo =='pn')
                    {
                        echo"<hstrong> - Parcialmente Nublado<strong>";
                    }
               }
               echo"</div>";

            } //if		
            require_once "visao/menu.php";
        } //inicio 	
    }//class
	
?>
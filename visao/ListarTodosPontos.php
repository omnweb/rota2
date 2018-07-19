<?php
	session_start();
	$_SESSION["titulo"] = 'Lista de Pontos';
	require('documento.php');
    
	//gerar pdf
	$pdf = new documento('P', 'pt', 'A4'); 
	$pdf->AddPage(); 
    $pdf->AliasNbPages();
	$pdf->SetTextColor(0);
	
	$pdf->SetFont('Arial', '', 12);
	foreach($retorno as $ret)
	{
		//largura = 50 
		//altura = 40
		//texto ou variável 
		//borda = 0 
		//quebra de linha = 0 
		//alinhamento = C (centralizado) 
		$pdf->Cell(40,40,"ID: ", 0, 0, 'L');
		$pdf->Cell(10,40,$ret->idpontos, 0,0, 'L');
		$pdf->Cell(150,40,"Nome: ", 0, 0, 'R');
		$pdf->multiCell(300,40,$ret->nome, 0, 'L'); //Parâmetros: comprimento, altura, o que irá imprimir, borda e alinhamento. Obs.:A quebra de linha é automática
		$pdf->Cell(40,40,"Cidade: ", 0, 0, 'R');
		$pdf->Cell(150,40,$ret->cidade, 0,0, 'L');
		$fim = str_repeat("-", 130);
		$pdf->Cell(500,40,$fim, 0,1, 'C');
	}
	$pdf->Output();
	// salva o PDF em arquivo
    //$pdf->Output('../relatorios/alunos.pdf', 'F');
?>
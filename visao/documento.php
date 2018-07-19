<?php
	require('fpdf17/fpdf.php');
	class documento extends FPDF
	{
		function header()
		{
			$titulo = $_SESSION["titulo"];
			$this->SetFont('helvetica', 'B', 28);
			$this->SetTextColor(0, 0, 205);
			$this->Cell(450, 20, 'Relatório', 0, 0, 'C');
			$this->Ln(50);
			$this->SetFont('Arial', 'B', 20);
			$this->Cell(500,20, $titulo, 0, 0, "C");
			$this->SetFont('Arial', 'B', 8);
			$data =  "Data:". date(" d-m-Y");
			$this->Cell(30,20, $data, 0,0,"C");
			$this->Ln(70);
		}
		
		function footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial', 'B', 8);
			$this->Cell(0,10, 'Página '.$this->PageNo().'/{nb}', 0, 0, 'C');
			
		}
		
	}
?>
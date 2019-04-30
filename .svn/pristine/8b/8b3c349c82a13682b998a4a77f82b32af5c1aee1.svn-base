<?php

include_once 'fpdf.php';

class EtiquetaPDF extends FPDF {
    
    public function __construct($orientation = 'P', $unit = 'mm', $size = 'letter'){ 
      parent::__construct($orientation, $unit, $size);
   }

    function Header() {
        // Arial bold 15
        /*$this->SetFont('Arial', 'B', 8);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(50, 10, utf8_decode('Etiquetas geradas'));
        // Line break
        $this->Ln(18);*/
    }

    function Footer() {
        // Position at 1.5 cm from bottom
        //$this->SetY(-15);
        // Arial italic 8
        //$this->SetFont('Arial', 'I', 8);
        // Page number
        //$this->Cell(0, 10, utf8_decode('Página ' . $this->PageNo() . '/{nb}'), 0, 0, 'C');
    }

    function setMargemPapelCarta() {
        $this->SetTopMargin(21);
        $this->SetLeftMargin(3.5);
        $this->SetRightMargin(4);
    }

    function Etiqueta($data, $deslocamentoHorizontal = 0) {
        //Altura da etiqueta: 33,9mm
        //Largura da etiqueta: 101,6mm
        $largura = 101.6;
        $espacoEntreEtiquetas = 0;
        $espacoEntreLinhas = 4.2375;
        $alturaDasLinhas = 4.2375;
        //linha do topo
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, 0, '', 'T');
        $this->Ln(0);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, 'Remetente: Prefeitura Municipal de Olinda', 'LR', 0 , 'C');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, utf8_decode('Destinatário: '.$data[0]), 'LR', 0, 'C');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, utf8_decode($data[1]), 'LR', 0, 'C');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, utf8_decode($data[2]), 'LR', 0, 'C');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, utf8_decode($data[3]), 'LR', 0, 'C');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, utf8_decode($data[4]), 'LR', 0, 'C');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, utf8_decode($data[5]), 'LR', 0, 'C');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, utf8_decode($data[6]), 'LR', 0, 'C');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, 0, '', 'B');
        $this->Ln($espacoEntreEtiquetas);
    }
    
    function EtiquetaVazia($deslocamentoHorizontal) {
        //Altura da etiqueta: 33,9mm
        //Largura da etiqueta: 101,6mm
        $largura = 101.6;
        $espacoEntreEtiquetas = 0;
        $espacoEntreLinhas = 8.475;
        $alturaDasLinhas = 8.475;
        //linha do topo
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, 0, '', 'T');
        $this->Ln(0);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, '', 'LR');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, '', 'LR');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, '', 'LR');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, $alturaDasLinhas, '', 'LR');
        $this->Ln($espacoEntreLinhas);
        $this->SetX($this->GetX() + $deslocamentoHorizontal);
        $this->Cell($largura, 0, '', 'B');
        $this->Ln($espacoEntreEtiquetas);
    }
    
    function distribuirEmPaginas($datas){
        $etiquetasPorPagina = 14;
        $paginas = array_chunk($datas, $etiquetasPorPagina);
        
        foreach($paginas as $pagina){
            $this->imprimirPaginaDeEtiquetas($pagina);
        }
    }

    function imprimirPaginaDeEtiquetas($datas) {
        $qteEtiquetasNaColuna = 7;
        $deslocamentoVertical = 237.3;
        $deslocamentoHorizontal = 107;
        $this->SetFont('Times', '', 8);
        
        $etiquetasUsadas = 0;
        for($i =0; $i < sizeof($datas); $i++){
            $this->Etiqueta($datas[$i], 0);
            $etiquetasUsadas++;
            if($i == 6){
                break;
            }
        }
        
        //completar a primeira coluna, se necessário
        for($i=0; $i < ($qteEtiquetasNaColuna - $etiquetasUsadas); $i++){
            $this->EtiquetaVazia(0);
        }
        
        //Segunda Coluna
        $this->SetY($this->GetY() - $deslocamentoVertical);
        
        for($i = $etiquetasUsadas; $i < sizeof($datas); $i++){
            $this->Etiqueta($datas[$i], $deslocamentoHorizontal);
            $etiquetasUsadas++;
            if($i == 13){
                break;
            }
        }
        
        //completar a segunda coluna, se necessário
        if(sizeof($datas) > 7){
            for($i = 0; $i < ($etiquetasUsadas % $qteEtiquetasNaColuna); $i++){
                $this->EtiquetaVazia($deslocamentoHorizontal);
            }
        }else{
            for($i = 0; $i < $qteEtiquetasNaColuna; $i++){
                $this->EtiquetaVazia($deslocamentoHorizontal);
            }
        }
        
        
        //Volta com o valor de x original
        $this->SetX($this->GetX() - $deslocamentoHorizontal);
    }

}

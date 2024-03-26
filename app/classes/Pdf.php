<?php

require_once 'app/fpdf/fpdf.php';

class Pdf{



    public function generatePdf_forOrder($order_id,$first_name,$last_name,$address,$state,$email,$artical,$price,$amount,$totalPrice,$filename){
        $pdf = new FPDF();

        // Dodajte prvu stranicu
        $pdf->AddPage();
        
        // Postavite font
        $pdf->SetFont('Arial','B',12);
        // Prikaz naslova
        $pdf->Cell(0,10,'#'. $order_id.' order',0,1,'C');
        // Linija ispod naslova
        $pdf->Cell(0,0,'','B',1,'C');
     
        $pdf->Ln(10);
        
        // Postavljanje fonta i veličine za opis
        $pdf->SetFont('Arial','',10);
        
        // Ispisivanje podataka
        $pdf->Cell(0,10,'Name: '.$first_name.' '.$last_name,0,1);
        $pdf->Cell(0,10,'Address: '. $address,0,1);
        $pdf->Cell(0,10,'State: '.$state,0,1);
        $pdf->Cell(0,10,'Email: '.$email,0,1);
        
        // Ispisivanje slike
        $pdf->Cell(0,10,'Name of artical: '.$artical,0,1);
        //$pdf->Image('putanja/do/slike.jpg',10,$pdf->GetY(),30);
        $pdf->Ln(10);
        
        // Linija ispod cene
        $pdf->Cell(0,0,'','T',1,'C');
        $pdf->Cell(0,10,'Price: '.$price,0,1);
        $pdf->Cell(0,10,'Delivery price: $10',0,1);
        $pdf->Cell(0,10,'Amount: '.$amount,0,1);
        $pdf->Cell(0,10,'Total price: '.$totalPrice,0,1);
        
        // Output
                    
       // $filename = "public/pdf_files" . $order_id . ".pdf";
        $pdf->Output('F', $filename);
          
    }
}
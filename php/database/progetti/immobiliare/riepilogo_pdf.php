<?php
    require('fpdf/fpdf.php');
    require('components/functions.php');

    $CF = $_REQUEST['CF'];

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Anagrafica di '.$CF,0,1);

    
    $sql = "SELECT * FROM proprietari WHERE CF = ?";
    $result = $conn->prepare($sql);
    $result->execute([$CF]);
    $rs = $result->fetchAll();

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(40,8,'Codice fiscale',1);
    $pdf->Cell(35,8,'Nome',1);
    $pdf->Cell(35,8,'Cognome',1);
    $pdf->Cell(30,8,'Telefono',1);
    $pdf->Cell(50,8,'Email',1);
    $pdf->Ln();
    
    $pdf->SetFont('Arial','',8);
    foreach ($rs as $row) {
        $pdf->Cell(40,8,$row['CF'],1);
        $pdf->Cell(35,8,$row['nome'],1);
        $pdf->Cell(35,8,$row['cognome'],1);
        $pdf->Cell(30,8,$row['telefono'],1);
        $pdf->Cell(50,8,$row['email'],1);
        $pdf->Ln();
    }

    $pdf->Ln(5);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Lista immobili di '.$CF,0,1);

    $sql = "SELECT imm.*, intes.idProp
            FROM immobili AS imm, intestazioni AS intes
            WHERE intes.idProp = '$CF'
            AND imm.id = intes.idImmob";
    $result = $conn->prepare($sql);
    $result->execute();
    $rs = $result->fetchAll();

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(40,8,'Proprietario',1);
    $pdf->Cell(30,8,'Nome immobile',1);
    $pdf->Cell(35,8,'Via',1);
    $pdf->Cell(15,8,'Civico',1);
    $pdf->Cell(15,8,'Metratura',1);
    $pdf->Cell(12,8,'Piano',1);
    $pdf->Cell(13,8,'N°Locali',1);
    $pdf->Cell(15,8,'Tipologia',1);
    $pdf->Cell(15,8,'Zona',1);
    $pdf->Ln(); 

    $pdf->SetFont('Arial','',8);
    foreach ($rs as $row) {
        $pdf->Cell(40,8,$row['idProp'],1);
        $pdf->Cell(30,8,$row['nome'],1);
        $pdf->Cell(35,8,$row['via'],1);
        $pdf->Cell(15,8,$row['civico'],1);
        $pdf->Cell(15,8,$row['metratura'],1);
        $pdf->Cell(12,8,$row['piano'],1);
        $pdf->Cell(13,8,$row['nLocali'],1);

        $tmp = $row['IdTipo'];
        $sub_sql = "SELECT t.tipo
                    FROM tipoimm AS t, immobili AS imm
                    WHERE t.id = ?";
        $resultTmp = $conn->prepare($sub_sql);
        $resultTmp->execute([$tmp]);
        $rsTmp = $resultTmp->fetchAll();
        $pdf->Cell(15,8,$rsTmp['tipo'],1);
        
        $tmp = $row['IdZona'];
        $sub_sql = "SELECT z.zona
                    FROM tipozona AS z, immobili AS imm
                    WHERE z.id = ?";
        $resultTmp = $conn->prepare($sub_sql);
        $resultTmp->execute([$tmp]);
        $rsTmp = $resultTmp->fetchAll();
        $pdf->Cell(15,8,$rsTmp['zona'],1);

        $pdf->Ln();
        $rs = $resultTmp->fetchAll();

    }
    $pdf->Output();
?>
<?php
    session_start();
?>

<?php
    include "connect.php";

    if (isset($_SESSION["inlognummer"])){
        require ('fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();

        $sql = 'SELECT * FROM tblgebruikers WHERE gebruikernummer = '.$_SESSION["inlognummer"].'';
        $resultaat = $mysqli->query($sql);
        $row = $resultaat->fetch_assoc();
        
        $pdf->SetFont('Arial','B',14);

        $pdf->Cell(130 ,5,'Il Ristorante Spettacoloso',0,0);
        $pdf->Cell(59 ,5,'AFREKENING',0,1);

        $pdf->SetFont('Arial','',12);

        $pdf->Cell(25 ,5,'Klant ID:',0,0);
        $pdf->Cell(34 ,5,$_SESSION["inlognummer"],0,1);

        $pdf->Image('https://publicdomainvectors.org/photos/johnny_automatic_spaghetti.png', 120, 17, 67);

        
        $pdf->Cell(189 ,10,'',0,1);

        $pdf->Cell(10 ,5,'',0,0);
        $pdf->Cell(90 ,5,'Volledige naam:',0,1);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10 ,5,'',0,0);
        $pdf->Cell(90 ,5,''.$row["voornaam"].' '.$row["naam"].'',0,1);

        
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10 ,5,'',0,0);
        $pdf->Cell(90 ,5,'Email:',0,1);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10 ,5,'',0,0);
        $pdf->Cell(90 ,5,''.$row["gebruikeremail"].'',0,1);

        $pdf->Cell(189 ,10,'',0,1);

        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(110 ,5,'Product',1,0);
        $pdf->Cell(20 ,5,'Aantal',1,0);
        $pdf->Cell(20 ,5,'Prijs',1,0);
        $pdf->Cell(34 ,5,'Subtotaal',1,1);

        $pdf->SetFont('Arial','',12);

        $sql = 'SELECT count(*) AS aantal FROM tblbestellingen INNER JOIN tblartikels ON (tblartikels.artikelnummer = tblbestellingen.artikelnummer) WHERE gebruikernummer = '.$_SESSION["inlognummer"].'';
        $resultaat = $mysqli->query($sql);
        $row = $resultaat->fetch_assoc();

        if ($row["aantal"] == 0){
            header('Location: winkelkar_kijken.php');
        }

        $sql = 'SELECT * FROM tblbestellingen INNER JOIN tblartikels ON (tblartikels.artikelnummer = tblbestellingen.artikelnummer) WHERE gebruikernummer = '.$_SESSION["inlognummer"].'';
        $resultaat = $mysqli->query($sql);

        $winkelkartotaal = 0.00;
        while($row = $resultaat->fetch_assoc()){

            $winkelkartotaal += ($row["artikelprijs"]*$row["artikelaantal"]);

            $pdf->Cell(110 ,5,$row["artikelnaam"],1,0);
            $pdf->Cell(20 ,5,$row["artikelaantal"],1,0, 'R');
            $pdf->Cell(20 ,5,$row["artikelprijs"],1,0, 'R');
            $pdf->Cell(34 ,5,$row["artikelprijs"]*$row["artikelaantal"],1,1,'R');
        }

        $sql = 'SELECT rekeningsaldo FROM tblgebruikers WHERE gebruikernummer = '.$_SESSION["inlognummer"].'';
        $resultaat = $mysqli->query($sql);
        $row = $resultaat->fetch_assoc();

        if ($row["rekeningsaldo"] >= $winkelkartotaal){
            $sql = 'UPDATE tblgebruikers SET rekeningsaldo = rekeningsaldo - '.$winkelkartotaal.' WHERE gebruikernummer = '.$_SESSION["inlognummer"].'';
            $resultaat = $mysqli->query($sql);

            if (!$resultaat){
                header('Location: niet_genoeg_geld.php');
            } else {
                $sql = 'DELETE FROM tblbestellingen WHERE gebruikernummer = '.$_SESSION["inlognummer"].'';
                $resultaat = $mysqli->query($sql);
            }
        } else {
            header('Location: niet_genoeg_geld.php');
        }

        $pdf->Cell(135 ,5,'',0,0);
        $pdf->SetFont('Arial','U',12);
        $pdf->Cell(15 ,5,'Totaal:',0,0);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(4 ,5,'$',1,0);
        $pdf->Cell(30 ,5,$winkelkartotaal,1,1,'R');


        $pdf->Output('my_file.php', 'I');
    } else {
        header('Location: index.php');
    }
?>
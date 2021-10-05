<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    
    
    $fname = $_POST['rfname'];
    $lname = $_POST['rlname'];
    $add = $_POST['addr'];

    $mpdf= new \Mpdf\Mpdf();

    $data = '';
    $data .= '<h1>TEST</h1>';
    
    $data .= "<strong>First Name =".$fname."</strong><br>";
    $data .= "<strong>First Name =".$lname."</strong><br>";
    $data .= "<strong>First Name =".$add."</strong><br>";

    $mpdf->WriteHTML($data);
    $mpdf->SetDisplayMode('fullwidth');
    $mpdf->SetTitle('Barangay Clearance');
    $mpdf->Output("cert-temp.pdf","I");

?>
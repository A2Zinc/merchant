<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('DOMPDF_ENABLE_AUTOLOAD', false);
require_once("./vendor/mpdf/mpdf/src/Mpdf.php");

class Mpdfgenerator {

    public function generate($html) {

        $mpdf = new \Mpdf\Mpdf(['format' => [100, 230]]);
        $mpdf->WriteHTML($html);
        // $mpdf->Output(); exit();
        $fileName = time().".pdf";
        $mpdf->Output('uploads/pdf/'.$fileName,'F');
        return $fileName;
    }
}
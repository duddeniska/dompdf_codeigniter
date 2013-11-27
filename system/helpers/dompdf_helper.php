<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function pdf_create($html, $filename='', $stream=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}


if (!function_exists('savePdf')) {
    
    function savePdf($view, $userid, $filename, $data = "") {
        $CI = get_instance();
        $html = $CI->load->view($view, $data, true);
        $pdfOutput = pdf_create($html, '', false);
        $pathToSaveFile = "files/pdf/$userid";
        
        if (!is_dir($pathToSaveFile)) {
            mkdir($pathToSaveFile, 0777, TRUE);

        }
        write_file("$pathToSaveFile/$filename", $pdfOutput);
    }

}
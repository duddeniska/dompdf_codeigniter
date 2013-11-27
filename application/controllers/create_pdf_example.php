<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_pdf_example extends CI_Controller {

        public function __construct() {
            parent::__construct();
        }
        
public function index()
{

     ### PDF create example
     ### 1. Create folder in project root named files and chmod it 777
     ### 2. Use system/helper/dompdf/ and system/helper/dompdf_helper.php
     ### 3. Add file and dompdf helper to config/autorun.php
     ### 4. Use following example to save
     
    
     //pick a view
     $view = "pdf_test";
     //Session User Id - to save in specific folder
     $userid = 3;
     //filename must passed with extension
     $filename = 'misha.pdf';
     //To render variables in view
     $data['test1'] = 'TEST 1';
     $data['test2'] = 'TEST 2';
     
     savePdf($view, $userid, $filename, $data);
            
}
}


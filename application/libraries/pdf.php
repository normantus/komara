<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Pdf extends Dompdf{

  protected function ci()
    {
        return get_instance();
    }
  
  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
   public function view($folder, $page, $title, $data) {
      $data['title'] = $title;
      $this->ci()->load->view('layout/header', $data);
      $this->ci()->load->view($folder.'/'. $page, $data);
      $this->ci()->load->view('layout/footer');
     }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use setasign\Fpdi\Tcpdf\Fpdi;

require_once APPPATH . 'third_party/tcpdf/autoload.php';

class Tcpdf extends Fpdi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'REPORT MY TICKETING', 0, 1, 'C');
    }

    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

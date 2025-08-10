<?php
use Dompdf\Dompdf;

class Pdf
{
    public function create($html, $filename = 'document.pdf', $stream = true)
    {
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        if ($stream) {
            $dompdf->stream($filename, ["Attachment" => 1]);
        } else {
            return $dompdf->output();
        }
    }
}

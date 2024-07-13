<?php

namespace Config;

use Dompdf\Dompdf;

class DompdfConfig
{
    public static function config(): Dompdf
    {
        $dompdf = new Dompdf();
        // Atur konfigurasi domPDF di sini jika diperlukan
        return $dompdf;
    }
}

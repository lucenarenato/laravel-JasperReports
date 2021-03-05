<?php

namespace App\Http\Controllers;

use App\Relatorio;

class RelatorioController extends Controller {


    public function gerarRelatorioAssociados() {

        $parametros = [];
        $relatorio = new Relatorio();
        $rel = $relatorio->gerar($parametros, 'custumers');
        $hearders = [
            "Content-Type" => "application/pdf",
            "Content-Disposition" => "inline; filename=rel.pdf",
        ];

        if ($rel['status'] == true) {
            return response()->file($rel['path'], $hearders)->deleteFileAfterSend();
        } else {
            return response("", 404, $hearders);
        }

    }

}
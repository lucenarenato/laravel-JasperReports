<?php

namespace App\Http\Controllers;

use PHPJasper\PHPJasper;

class ReportController extends Controller
{
    /**
     * Reporna um array com os parametros de conexão
     * @return Array
     */
    public function getDatabaseConfig()
    {
        return [
            'driver' => env('DB_CONNECTION'),
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_DATABASE'),
            'jdbc_dir' => base_path() . env('JDBC_DIR', '/vendor/lavela/phpjasper/src/JasperStarter/jdbc'),
        ];
    }
    public function index()
    {
        // coloca na variavel o caminho do novo relatório que será gerado
        $output = public_path() . '/reports/' . time() . '_Clientes';
        // instancia um novo objeto JasperPHP

        $report = new PHPJasper;
        //$report = new JasperPHP;
        // chama o método que irá gerar o relatório
        // passamos por parametro:
        // o arquivo do relatório com seu caminho completo
        // o nome do arquivo que será gerado
        // o tipo de saída
        // parametros ( nesse caso não tem nenhum)
        $report->process(
            public_path() . '/reports/Customers.jrxml',
            $output,
            ['pdf'],
            [],
            $this->getDatabaseConfig()
        )->execute();

        $file = $output . '.pdf';
        $path = $file;

        // caso o arquivo não tenha sido gerado retorno um erro 404
        if (!file_exists($file)) {
            abort(404);
        }
        //caso tenha sido gerado pego o conteudo
        $file = file_get_contents($file);
        //deleto o arquivo gerado, pois iremos mandar o conteudo para o navegador
        unlink($path);
        // retornamos o conteudo para o navegador que íra abrir o PDF
        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="cliente.pdf"');

    }

    public function teste()
    {
        $input = public_path() . '/reports/Customers.jrxml'; 
        $output = public_path() . '/reports/' . time() . '_Clientes';
        $options = [
            'format' => ['pdf'],
            'locale' => 'pt_BR',
            'params' => [],
            'db_connection' => [
                'driver' => env('DB_CONNECTION'),
                'host' => env('DB_HOST'),
                'port' => env('DB_PORT'),
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'database' => env('DB_DATABASE'),
                // 'driver' => 'postgres',
                // 'username' => 'DB_USERNAME',
                // 'password' => 'DB_PASSWORD',
                // 'host' => 'DB_HOST',
                // 'database' => 'DB_DATABASE',
                // 'port' => '5432'
            ]
        ];

        $jasper = new PHPJasper;

        $jasper->process(
                $input,
                $output,
                $options
        )->execute();
    }

    public function json()
    {
        $input = '/your_input_path/your_report.jasper';   
        $output = '/your_output_path';

        $data_file = __DIR__ . '/your_data_files_path/your_json_file.json';
        $options = [
            'format' => ['pdf'],
            'params' => [],
            'locale' => 'pt_BR',
            'db_connection' => [
                'driver' => 'json',
                'data_file' => $data_file,
                'json_query' => 'your_json_query'
            ]
        ];

        $jasper = new PHPJasper;

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();
    }
}

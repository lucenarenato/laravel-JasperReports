<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PHPJasper\PHPJasper;

class Relatorio extends Model {

    public function getDatabaseConfig() {
        $jdbc_dir = base_path() . '/vendor/lavela/phpjasper/bin/jasperstarter/jdbc';
        return [
            'driver' => 'generic',
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_DATABASE'),
            'jdbc_driver' => 'org.mariadb.jdbc.Driver',
            'jdbc_url' => 'jdbc:mariadb://localhost:3306/jasper',
            'jdbc_dir' => $jdbc_dir,
        ];
    }

    public function gerar($params, $nomeRel) {
        $input = public_path() . '/reports/' . $nomeRel . '.jrxml';
        $output = public_path() . '/reports/' . time() . '_' . $nomeRel;
        $options = [
            'format' => ['pdf'],
            'locale' => 'pt_BR',
            'params' => $params,
            'db_connection' => $this->getDatabaseConfig(),
        ];

        $jasper = new PHPJasper;
        $jasper->process(
            $input,
            $output,
            $options
        )->execute();

        $path = $output . '.pdf';

        if (!file_exists($path)) {
            return $result = ['status' => false, 'path' => ""];
        } else {
            return $result = ['status' => true, 'path' => $path];
        }

    }

}

/*public function getDatabaseConfig() {
    $jdbc_dir = base_path() . '/vendor/lavela/phpjasper/bin/jasperstarter/jdbc';
    return [
        'driver' => 'generic',
        'host' => env('DB_HOST'),
        'port' => env('DB_PORT'),
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
        'database' => env('DB_DATABASE'),
        'jdbc_driver' => 'com.mysql.jdbc.Driver',
        'jdbc_url' => 'jdbc:mysql://localhost:3306/jasper',
        'jdbc_dir' => $jdbc_dir,
    ];
}*/

/*'jdbc_driver' => 'org.mariadb.jdbc.Driver',
'jdbc_url' => 'jdbc:mariadb://localhost:3306/jasper',*/
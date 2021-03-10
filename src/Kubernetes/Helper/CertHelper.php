<?php
/**
 * Created by AlicFeng at 2021/3/10 上午1:27
 */

namespace AlicFeng\Kubernetes\Helper;


use Symfony\Component\Yaml\Yaml;

class CertHelper
{
    public static function transform(string $cert_path, string $cert_storage_dir, string $type): array
    {
        $content = Yaml::parse(file_get_contents($cert_path));

        if (false === is_dir($cert_storage_dir)) {
            mkdir($cert_storage_dir, 0777, true);
        }

        $client_cert = $cert_storage_dir . DIRECTORY_SEPARATOR . $type . '_client_cert.pem';
        if (false === file_exists($client_cert)) {
            file_put_contents($client_cert, base64_decode($content['users'][0]['user']['client-certificate-data']));
        }

        $client_key = $cert_storage_dir . DIRECTORY_SEPARATOR . $type . '_client_key.pem';
        if (false === file_exists($client_key)) {
            file_put_contents($client_key, base64_decode($content['users'][0]['user']['client-key-data']));
        }

        $ca         = $cert_storage_dir . DIRECTORY_SEPARATOR . $type . '_ca.pem';
        if (false === file_exists($ca)) {
            file_put_contents($ca, base64_decode($content['clusters'][0]['cluster']['certificate-authority-data']));
        }

        $base_uri   = $content['clusters'][0]['cluster']['server'];

        return compact('client_cert', 'client_key', 'ca', 'base_uri');
    }


}

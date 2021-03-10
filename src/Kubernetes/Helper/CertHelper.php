<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes\Helper;

use Symfony\Component\Yaml\Yaml;

class CertHelper
{
    /**
     * @function           decipher
     * @description        证书解码
     * @param string $cert_path        证书路径
     * @param string $cert_storage_dir 证书存储地址
     * @param string $type             类型(k8s | asm)
     * @return array [client_cert client_key ca base_uri]
     * @author             AlicFeng
     */
    public static function decipher(string $cert_path, string $cert_storage_dir, string $type): array
    {
        // 1. 将证书的 yaml 内容转 array
        $content = Yaml::parse(file_get_contents($cert_path));

        // 2. 预备处理存储证书的文件路 不存在则创建
        if (false === is_dir($cert_storage_dir)) {
            mkdir($cert_storage_dir, 0777, true);
        }

        // 3. 解码客户端证书
        $client_cert = $cert_storage_dir . DIRECTORY_SEPARATOR . $type . '_client_cert.pem';
        if (false === file_exists($client_cert)) {
            file_put_contents($client_cert, base64_decode($content['users'][0]['user']['client-certificate-data']));
        }

        // 4. 解码客户端秘钥
        $client_key = $cert_storage_dir . DIRECTORY_SEPARATOR . $type . '_client_key.pem';
        if (false === file_exists($client_key)) {
            file_put_contents($client_key, base64_decode($content['users'][0]['user']['client-key-data']));
        }

        // 5. 解码 CA 证书
        $ca = $cert_storage_dir . DIRECTORY_SEPARATOR . $type . '_ca.pem';
        if (false === file_exists($ca)) {
            file_put_contents($ca, base64_decode($content['clusters'][0]['cluster']['certificate-authority-data']));
        }

        // 6. 获取通讯域地址
        $base_uri = $content['clusters'][0]['cluster']['server'];

        return compact('client_cert', 'client_key', 'ca', 'base_uri');
    }
}

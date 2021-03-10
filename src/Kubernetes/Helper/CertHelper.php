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
//        if (false === file_exists($ca)) {
//        dd($content['clusters'][0]['cluster']['certificate-authority-data']);
//        dump('LS0tLS1CRUdJTiBDRVJUSUZJQ0FURS0tLS0tCk1JSURIRENDQWdTZ0F3SUJBZ0lCQURBTkJna3Foa2lHOXcwQkFRc0ZBREErTVNjd0ZBWURWUVFLRXcxaGJHbGkKWVdKaElHTnNiM1ZrTUE4R0ExVUVDaE1JYUdGdVozcG9iM1V4RXpBUkJnTlZCQU1UQ210MVltVnlibVYwWlhNdwpJQmNOTWpFd016QTVNRFl3TnpBMldoZ1BNakExTVRBek1ESXdOakEzTURaYU1ENHhKekFVQmdOVkJBb1REV0ZzCmFXSmhZbUVnWTJ4dmRXUXdEd1lEVlFRS0V3aG9ZVzVuZW1odmRURVRNQkVHQTFVRUF4TUthM1ZpWlhKdVpYUmwKY3pDQ0FTSXdEUVlKS29aSWh2Y05BUUVCQlFBRGdnRVBBRENDQVFvQ2dnRUJBTGZWWXZaWjZTNzJwOTBvaVM5MApsSHp1YTVYVUFwbTdxcVFRdEdnL05VWlZna01QZUdZWjRCMnhCTjd4STdCZ2srTFdCVG1KR2ZKWU1HcHhlQkdYCmtkTis0K2lhL1pKVkhFa1MyWUVrQmloVFI0S3BNRDIrQnVqM01ZM3pEUm9wVS8wbnNxYS9jUVE1SGRkR093V2cKNlFmclBUZHVrYWtsS2xTNk9oNXRlSmxxbEFMT3I5RFZ4ZERsbkFFUjZidkFzemROb1hzTGZxVzAycVQzeDRVNwp5elJaYmVGNDZsZDlCTWFVYXlWMzN5L2YvQXpPZlVWUXo5YmVlRDRYY3pRMGVsaytYTk1yL3RCSXpCbnd0TzhECjMvZkpiUGVaUE8vd2xVR2luaFFIR3JFSEo5TzJBUlhsYml1SytnNGZhM1dBUjRYZHhjUWZPcWI1bUdKU1N3UGoKZkswQ0F3RUFBYU1qTUNFd0RnWURWUjBQQVFIL0JBUURBZ0trTUE4R0ExVWRFd0VCL3dRRk1BTUJBZjh3RFFZSgpLb1pJaHZjTkFRRUxCUUFEZ2dFQkFLK1FZRFR2VDJibENNRnJCZ0VyNlBId2hSNHMzdDVWNC9veXc5V0dReUEzClBSTnBqWHFJU25tbWU3UGdwQnVBM3VFQjBYcE9vbW1jT0dBM2xKN0NTMkdKc28rMWxvS3VDMUhKOGVsWmZUZ3AKVUd3U3FUeWFFQUwzL0k3REdNWVY4bkdMck9PMWZIb0Zxa1pGOGhFN0JQLzg5NnA3Vk05MTZVdHpzYWc2YmJKegpVZU1yeFNEdnB6Q0Q5NmxJemtuRDRndmdhaGRCQnZMWU0rb0FpZ2FJK3JzS1k1SzBlUWQyZEpWQ0orSjUxSm9FClpSM00xdEc4SEJQb1BnL3BUc1plTXRFSHVIYUlZWjFaNFNMc0lmRmRGSHFRMWViSTNBU09BWHg3cTFHVFBSTCsKdW51MXdEMDQxaHNwNUN2KzZydmJUODFySjdJaEV5aXdPOW1CZExVajdJcz0KLS0tLS1FTkQgQ0VSVElGSUNBVEUtLS0tLQo=');
//        file_put_contents($ca,base64_decode($content['clusters'][0]['cluster']['certificate-authority-data']));
//        dump(('LS0tLS1CRUdJTiBDRVJUSUZJQ0FURS0tLS0tCk1JSURIRENDQWdTZ0F3SUJBZ0lCQURBTkJna3Foa2lHOXcwQkFRc0ZBREErTVNjd0ZBWURWUVFLRXcxaGJHbGkKWVdKaElHTnNiM1ZrTUE4R0ExVUVDaE1JYUdGdVozcG9iM1V4RXpBUkJnTlZCQU1UQ210MVltVnlibVYwWlhNdwpJQmNOTWpFd016QTFNVFV5T0RJNFdoZ1BNakExTVRBeU1qWXhOVEk0TWpoYU1ENHhKekFVQmdOVkJBb1REV0ZzCmFXSmhZbUVnWTJ4dmRXUXdEd1lEVlFRS0V3aG9ZVzVuZW1odmRURVRNQkVHQTFVRUF4TUthM1ZpWlhKdVpYUmwKY3pDQ0FTSXdEUVlKS29aSWh2Y05BUUVCQlFBRGdnRVBBRENDQVFvQ2dnRUJBSmZJZ0NRclh1OCs4M0FMRWpNZwp4SlBKZjZnaDRNcmhuOXJlOFBGN2hoVTdoOEdNY0NTOUhtZ2ZiQWJzTVZSdmVKdFdOa0NoUWlkK3RtQk1qbUpGCkZDOTY0ZTBpRHpJM2FSYitkQitwemh6ZmdqSVZQZ2JrOWRmOWs0Ri9xQWpqeUZnVTY5NFg4WUlpa2lqOUpTRDcKalZ4NjVxL0JnWjBVKzcwS2pabk93a0FYSGorOXF6dE1OMTNLTTgzV0JKV0dkSGJKRjQ0WER1MDdhRnVXZ2I0cwpneHM0VXV1WmI5Slc0TVJvUU4rTnBuY3pRYkhmL2I5cWNnQTVtYlFYanlYdzZiV0p1MzR5d0ZNcW9ON0pXeWRwCmJJRzcvb054eEgxTHpZd1N3WXlQQ2JwNEZKZEFIODQzMEVOYnUwMEJxTE50L3o2c1Qwc3lsV2trRXNibTlTNC8KZXdFQ0F3RUFBYU1qTUNFd0RnWURWUjBQQVFIL0JBUURBZ0trTUE4R0ExVWRFd0VCL3dRRk1BTUJBZjh3RFFZSgpLb1pJaHZjTkFRRUxCUUFEZ2dFQkFBcXpvMk9nRXJPVTFBWjhZU1AxcEd5MlM1Mm1TSmZiWkowYVRKSEF4akRuClpIUUt3czl4QThQZXdGSDU1ME85WEgzdTlISGMvOC80SXZJL0FwZ3N1a1pEYWxOTUdqemx2ZVVQSDFRcFQzVmMKL25OVncrZytJNTRhTnU2aVFUTWNQc2FveDJDdkF6TEttdjdEby9mV1h0eU9EM3hWb3A5QUd1dEZmRFhrbU1ZbQpwd2RIdGZhMTdSRHZRVU94THRQT0NsSHVibmlHc042YWxpZm83SDZoWUNOODBKWGJ4dUlMNUFlSGVTY3ZJbkFvCmRXRzVtT2g4QVVXbXRxOHoxd1orWGxmNDg5Sm9TUGdCQUc3dS9abmd6NkpINlJRVW1SOWxLWXZtMjdpcE5jUkYKNFc5ZkVvTXB0Y3Z4OFdPWWpPVHpWdld0N3JIZElPcGdxdmtOa2xISE5wQT0KLS0tLS1FTkQgQ0VSVElGSUNBVEUtLS0tLQo='));
//        dd(($content['clusters'][0]['cluster']['certificate-authority-data']));
        dd(base64_decode($content['clusters'][0]['cluster']['certificate-authority-data']));
        file_put_contents($ca, base64_decode($content['clusters'][0]['cluster']['certificate-authority-data']));
//        }

        $base_uri   = $content['clusters'][0]['cluster']['server'];

        return compact('client_cert', 'client_key', 'ca', 'base_uri');
    }
}

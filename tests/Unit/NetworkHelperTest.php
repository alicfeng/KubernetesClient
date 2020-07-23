<?php
/**
 * Created by AlicFeng 20-7-23 下午5:29
 */


namespace Tests\Unit;


use AlicFeng\Kubernetes\Helper\NetworkHelper;
use Tests\TestCase;

class NetworkHelperTest extends TestCase
{
    public function testChunkedDecode()
    {
        $data    = '';
        $package = NetworkHelper::chunkedDecode($data);
        $this->assertIsString($package);

        $data    = "HTTP\1.1 200 OK\r\nContent-Type: text\plain\r\nTransfer-Encoding: chunked\r\n\r\n25\r\nThis is the data in the first chunk\r\n\r\n1A\r\nand this is the second one\r\n0\r\n\r\n";
        $package = NetworkHelper::chunkedDecode($data);
    }
}
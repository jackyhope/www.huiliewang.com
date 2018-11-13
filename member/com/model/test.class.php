<?php
use com\hlw\ks\interfaces\TestServiceClient;
class test_controller extends company
{
    public function test_action()
    {
        apiClient::init($appid, $secret);
        $testService  = new TestServiceClient(null);
        apiClient::build($testService);
        echo $testService->test("12133");
        
    }
}

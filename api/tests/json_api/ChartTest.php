<?php

class ChartTest extends CApiTest {

    /**
     * @dataProvider insertChartAccountProvider
     */
    public function testInsertChartAccount($insert_chart_account_request_data)
    {
        $api = new CApiRequest();

        $insert_chart_account_response = $api->request('chart/account', 'POST', $insert_chart_account_request_data, false);
        $this->assertTrue(array_key_exists('id', $insert_chart_account_response));
    }

    public function insertChartAccountProvider() {
        return $this->read_json([
            'chart_account_insert_request'
        ]);
    }

}

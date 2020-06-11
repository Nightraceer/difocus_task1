<?php


use ShopExpress\ApiClient\ApiClient;

class Application
{
    private $_apiClient;

    public function run()
    {
        $limit = 10;
        $currentPage = $this->_getCurrentPage();
        $start = ($currentPage - 1) * $limit;

        $response = $this->_getApiClient()->get('orders', [
            'start' => $start,
            'limit' => $limit
        ]);

        $orders = $response->orders;
        $prevPage = $this->_getPrevPage();
        $nextPage = $this->_getNextPage($response->total, $limit);

        include 'view.php';
    }

    private function _getApiClient()
    {
        if (!$this->_apiClient) {
            $this->_apiClient = new ApiClient(
                'lNwzuV_Gb',
                'admin',
                'http://newshop.kupikupi.org/adm/api/'
            );
        }
        return $this->_apiClient;
    }

    private function _getCurrentPage()
    {
        return isset($_GET['page']) ? $_GET['page'] : 1;
    }

    private function _getNextPage($totalElements, $limitElements)
    {
        $currentPage = $this->_getCurrentPage();
        $currentElements = $limitElements * $currentPage;
        return $totalElements > $currentElements ? $currentPage + 1 : false;
    }

    private function _getPrevPage()
    {
        $currentPage = $this->_getCurrentPage();
        return $currentPage > 1 ? $currentPage - 1 : false;
    }


}
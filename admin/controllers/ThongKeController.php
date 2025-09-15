<?php

class ThongKeController extends BaseController
{
    public function index()
    {
        $model = new ThongKeModel();

        // Lấy dữ liệu thống kê
        $todayRevenue = $model->getTodayRevenue();
        $todayOrders = $model->getTodayOrders();
        $newCustomers = $model->getNewCustomers();

        // Lấy dữ liệu biểu đồ doanh thu
        $chartData = $model->getRevenueChartData();

        // Render giao diện
        $this->render('./views/Pages/thongke.php', array(
            'todayRevenue' => $todayRevenue,
            'todayOrders' => $todayOrders,
            'newCustomers' => $newCustomers,
            'chartData' => $chartData,
        ));
    }
}

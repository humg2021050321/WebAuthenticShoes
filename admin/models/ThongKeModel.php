<?php

class ThongKeModel
{
    private $db;

    public function __construct()
    {
        // Thay 'shop_database' bằng tên cơ sở dữ liệu chính xác của bạn
        $this->db = new mysqli('localhost', 'root', '', 'shoeshop');

        // Kiểm tra kết nối
        if ($this->db->connect_error) {
            die("Kết nối thất bại: " . $this->db->connect_error);
        }
    }

    public function getTodayRevenue()
    {
        $today = date('Y-m-d');
        $query = "SELECT sum(chi_tiet_hoa_don.so_luong * san_pham.gia) as revenue FROM hoa_don 
        INNER JOIN chi_tiet_hoa_don ON hoa_don.id= chi_tiet_hoa_don.id_hoa_don
        inner join san_pham on san_pham.id=chi_tiet_hoa_don.id_san_pham
        WHERE DATE(hoa_don.ngay_dat) = '$today'";
        $result = $this->db->query($query);
        return $result->fetch_assoc()['revenue'] ?? 0;
    }

    public function getTodayOrders()
    {
        $today = date('Y-m-d');
        $query = "SELECT COUNT(*) AS orders FROM hoa_don WHERE DATE(ngay_dat) = '$today'";
        $result = $this->db->query($query);
        return $result->fetch_assoc()['orders'] ?? 0;
    }

    public function getNewCustomers()
    {
        // $today = date('Y-m-d');
        // $query = "SELECT COUNT(*) AS customers FROM users WHERE DATE(created_at) = '$today'";
        // $result = $this->db->query($query);
        // return $result->fetch_assoc()['customers'] ?? 0;
        return 0;
    }

    public function getRevenueChartData()
    {
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $query = "SELECT sum(chi_tiet_hoa_don.so_luong * san_pham.gia) as revenue FROM hoa_don 
        INNER JOIN chi_tiet_hoa_don ON hoa_don.id= chi_tiet_hoa_don.id_hoa_don
        inner join san_pham on san_pham.id=chi_tiet_hoa_don.id_san_pham
        WHERE DATE(hoa_don.ngay_dat) = '$date'";
            $result = $this->db->query($query);
            $chartData[] = $result->fetch_assoc()['revenue'] ?? 0;
        }
        return $chartData;
    }
}

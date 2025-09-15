    <!-- Content -->
    <div class="content">
        <div class="container mt-4">
            <h2>Thống Kê</h2>

            <!-- Tổng quan thống kê -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Doanh thu hôm nay</h5>
                            <p class="card-text"><?= number_format($todayRevenue, 0, ',', '.') ?> VND</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Đơn hàng hôm nay</h5>
                            <p class="card-text"><?= $todayOrders ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Khách hàng mới</h5>
                            <p class="card-text"><?= $newCustomers ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Biểu đồ doanh thu -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['6 ngày trước', '5 ngày trước', '4 ngày trước', '3 ngày trước', '2 ngày trước', 'Hôm qua', 'Hôm nay'],
                datasets: [{
                    label: 'Doanh thu',
                    data: <?= json_encode($chartData) ?>,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                }]
            }
        });
    </script>
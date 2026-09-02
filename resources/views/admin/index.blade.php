@extends('layouts.master')

@section('css')
<!--Chartist Chart CSS -->
<link rel="stylesheet" href="{{ URL::asset('plugins/chartist/css/chartist.min.css') }}">
<style>
    .stat-card {
        transition: transform 0.3s;
    }
    .stat-card:hover {
        transform: translateY(-5px);
    }
    .stat-icon {
        font-size: 32px;
        opacity: 0.7;
    }
    .card-header {
        background: transparent;
        border-bottom: 1px solid #e9ecef;
    }
    .attendance-badge {
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 500;
    }
    .badge-present {
        background: #d4edda;
        color: #155724;
    }
    .badge-late {
        background: #fff3cd;
        color: #856404;
    }
    .badge-absent {
        background: #f8d7da;
        color: #721c24;
    }
</style>
@endsection

@section('breadcrumb')
<div class="col-sm-6 text-left">
    <h4 class="page-title">Dashboard</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Selamat Datang ke Sistem Integrasi HR</li>
    </ol>
</div>
@endsection

@section('content')

<!-- ===== 4 STATISTIK KAD ===== -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Jumlah Pekerja</h6>
                        <h3 class="text-white">{{ $data[0] ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-users stat-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Hadir Hari Ini</h6>
                        <h3 class="text-white">{{ $data[1] ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-check-circle stat-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Lewat Hari Ini</h6>
                        <h3 class="text-white">{{ $data[2] ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-clock stat-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Peratus Kehadiran</h6>
                        <h3 class="text-white">{{ $data[3] ?? 0 }}%</h3>
                    </div>
                    <i class="fas fa-chart-line stat-icon"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== BARIS UTAMA: GRAF + RINGKASAN ===== -->
<div class="row mt-3">
    
    <!-- Kolom Kiri: Graf Kehadiran Bulanan -->
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">📊 Laporan Kehadiran Bulanan</h5>
            </div>
            <div class="card-body">
                <div id="attendanceChartContainer" style="height: 300px;">
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Kolom Kanan: Ringkasan Kehadiran Hari Ini -->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">✅ Ringkasan Hari Ini</h5>
            </div>
            <div class="card-body">
                
                <!-- Hadir -->
                <div class="d-flex justify-content-between align-items-center mb-3 p-2" style="background: #e8f8f5; border-radius: 8px;">
                    <div>
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Hadir</span>
                    </div>
                    <span class="badge bg-success rounded-pill">{{ $data[1] ?? 0 }}</span>
                </div>
                
                <!-- Lewat -->
                <div class="d-flex justify-content-between align-items-center mb-3 p-2" style="background: #fff3e0; border-radius: 8px;">
                    <div>
                        <i class="fas fa-clock text-warning me-2"></i>
                        <span>Lewat</span>
                    </div>
                    <span class="badge bg-warning rounded-pill">{{ $data[2] ?? 0 }}</span>
                </div>
                
                <!-- Tidak Hadir -->
                <div class="d-flex justify-content-between align-items-center mb-3 p-2" style="background: #fdeded; border-radius: 8px;">
                    <div>
                        <i class="fas fa-times-circle text-danger me-2"></i>
                        <span>Tidak Hadir</span>
                    </div>
                    <span class="badge bg-danger rounded-pill">{{ ($data[0] ?? 0) - ($data[1] ?? 0) - ($data[2] ?? 0) }}</span>
                </div>
                
                <!-- Peratus Kehadiran -->
                <div class="mt-3 p-3 text-center" style="background: #e3f2fd; border-radius: 8px;">
                    <p class="mb-1 text-muted">📊 Peratus Kehadiran</p>
                    <h4 class="mb-0 text-primary">{{ $data[3] ?? 0 }}%</h4>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- ===== PERMOHONAN CUTI MENUNGGU (SEMENTARA) ===== -->
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">🏖️ Permohonan Cuti</h5>
            </div>
            <div class="card-body">
                <div class="text-center py-4 text-muted">
                    <i class="fas fa-check-circle fa-2x mb-2"></i>
                    <p>Tiada permohonan cuti menunggu</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<!--Chartist Chart-->
<script src="{{ URL::asset('plugins/chartist/js/chartist.min.js') }}"></script>
<script src="{{ URL::asset('plugins/chartist/js/chartist-plugin-tooltip.min.js') }}"></script>
<!-- peity JS -->
<script src="{{ URL::asset('plugins/peity-chart/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('assets/pages/dashboard.js') }}"></script>

<!-- Chart.js untuk Graf -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('attendanceChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun', 'Jul', 'Ogo', 'Sep', 'Okt', 'Nov', 'Dis'],
            datasets: [{
                label: 'Kehadiran',
                data: @json($monthlyAttendance ?? array_fill(0, 12, 0)),
                backgroundColor: 'rgba(78, 115, 223, 0.7)',
                borderColor: 'rgba(78, 115, 223, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
</script>
@endsection
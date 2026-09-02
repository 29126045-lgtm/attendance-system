<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Integrasi HR</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .welcome-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 40px 35px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 550px;
            width: 100%;
            animation: fadeInUp 0.8s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .welcome-icon {
            font-size: 60px;
            color: #4e73df;
            margin-bottom: 10px;
        }
        
        .welcome-title {
            font-size: 32px;
            font-weight: 700;
            color: #4e73df;
            margin-bottom: 2px;
        }
        
        .welcome-subtitle {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 2px;
        }
        
        .welcome-slogan {
            font-size: 14px;
            color: #858796;
            margin-bottom: 15px;
            font-weight: 400;
        }
        
        .welcome-divider {
            width: 60px;
            height: 3px;
            background: #4e73df;
            margin: 12px auto;
            border-radius: 2px;
        }
        
        .welcome-motto {
            font-size: 14px;
            color: #858796;
            font-style: italic;
            margin-bottom: 20px;
        }
        
        /* Ciri-ciri Sistem */
        .feature-box {
            background: #f8f9fc;
            border-radius: 12px;
            padding: 12px 8px;
            text-align: center;
            border: 1px solid #e9ecef;
            transition: all 0.3s;
        }
        
        .feature-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .feature-box i {
            font-size: 28px;
            color: #4e73df;
            margin-bottom: 5px;
        }
        
        .feature-box p {
            font-size: 11px;
            color: #5a5c69;
            margin: 0;
            font-weight: 600;
        }
        
        .welcome-clock {
            padding: 12px;
            background: #f8f9fc;
            border-radius: 12px;
            margin: 20px 0;
            border: 1px solid #e9ecef;
        }
        
        #welcomeDate {
            font-size: 13px;
            color: #6c757d;
        }
        
        #welcomeTime {
            font-size: 36px;
            font-weight: bold;
            color: #4e73df;
            font-family: 'Courier New', monospace;
        }
        
        .btn-login {
            background: linear-gradient(45deg, #4e73df, #224abe);
            color: white;
            border: none;
            padding: 12px 45px;
            border-radius: 50px;
            font-size: 17px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(78, 115, 223, 0.5);
            color: white;
        }
        
        .welcome-footer {
            margin-top: 20px;
            font-size: 12px;
            color: #adb5bd;
        }

        @media (max-width: 480px) {
            .welcome-card {
                padding: 25px 18px;
            }
            .welcome-title {
                font-size: 24px;
            }
            #welcomeTime {
                font-size: 28px;
            }
            .btn-login {
                padding: 10px 30px;
                font-size: 15px;
            }
            .feature-box i {
                font-size: 22px;
            }
            .feature-box p {
                font-size: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="welcome-card">
        
        <!-- Ikon -->
        <div class="welcome-icon">
            <i class="fas fa-users-cog"></i>
        </div>
        
        <!-- Tajuk -->
        <h1 class="welcome-title">SISTEM INTEGRASI HR</h1>
        <p class="welcome-subtitle">Kawalan Akses & Kehadiran</p>
        <p class="welcome-slogan">Sistem Pengurusan Sumber Manusia yang Lengkap</p>
        
        <!-- Garis Pemisah -->
        <div class="welcome-divider"></div>
        
        <!-- Motto -->
        <p class="welcome-motto">
            <i class="fas fa-quote-left me-1" style="color: #4e73df; font-size: 12px;"></i>
            Pengurusan sumber manusia yang efisien dalam satu platform
            <i class="fas fa-quote-right ms-1" style="color: #4e73df; font-size: 12px;"></i>
        </p>
        
        <!-- Ciri-ciri Sistem -->
        <div class="row g-2 mb-3">
            <div class="col-4">
                <div class="feature-box">
                    <i class="fas fa-rfid"></i>
                    <p>Kawalan Akses</p>
                </div>
            </div>
            <div class="col-4">
                <div class="feature-box">
                    <i class="fas fa-calendar-check"></i>
                    <p>Kehadiran</p>
                </div>
            </div>
            <div class="col-4">
                <div class="feature-box">
                    <i class="fas fa-money-bill-wave"></i>
                    <p>Auto Payroll</p>
                </div>
            </div>
        </div>
        
        <!-- Jam Live -->
        <div class="welcome-clock">
            <div id="welcomeDate"></div>
            <div id="welcomeTime"></div>
        </div>
        
        <!-- Butang Login -->
        <a href="{{ route('login') }}" class="btn-login">
            <i class="fas fa-sign-in-alt me-2"></i> Log Masuk
        </a>
        
        <!-- Footer -->
        <div class="welcome-footer">
            <span>© 2026 Sistem Integrasi HR | ADTEC Taiping</span>
        </div>
        
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JavaScript untuk Jam Live -->
    <script>
        function updateDateTime() {
            const now = new Date();
            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            document.getElementById('welcomeDate').innerHTML = now.toLocaleDateString('ms-MY', dateOptions);
            document.getElementById('welcomeTime').innerHTML = now.toLocaleTimeString('ms-MY');
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>

</body>
</html>
<?php  
session_start(); 

// 1. نظام حماية الدخول وتسجيل الخروج
if (!isset($_SESSION['admin_logged_in'])) {
    header('location:index.php');
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header('location:index.php');
    exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=active1;charset=utf8mb4','root', '');
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة الإدارة | دليل الفعاليات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Cairo', sans-serif; 
            background-color: #f4f7f9; 
            margin: 0;
        }

        /* الناف بار بالأزرق الداكن مثل الشاشة الرئيسية */
        .navbar { 
            background-color: #004085 !important; /* أزرق داكن ملكي */
            padding: 15px 0;
        }

        .content-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        /* رأس الجدول (ID، العنوان...) بالأسود الفاتح/الرمادي الغامق */
        .table thead { 
            background-color: #343a40; /* أسود فاتح (اللون الاحترافي للـ Tables) */
            color: white; 
        }

        .event-img { 
            width: 70px; height: 55px; 
            object-fit: cover; 
            border-radius: 6px; 
            border: 1px solid #ddd;
        }

        /* زر الإضافة بالأزرق المتناسق */
        .btn-add-custom {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            padding: 10px 25px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn-add-custom:hover { background-color: #0056b3; color: white; }

        .btn-logout { color: #ff4d4d; text-decoration: none; font-weight: bold; }
        .btn-logout:hover { color: #cc0000; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark shadow">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="add.php" class="btn-add-custom">+ إضافة فعالية جديدة</a>
        <span class="navbar-brand h3 mb-0 fw-bold">لوحة إدارة الفعاليات</span>
        <div class="d-flex align-items-center">
            <a href="index.php" class="btn btn-outline-light btn-sm me-3">🏠 الرئيسية</a>
            <a href="?action=logout" class="btn btn-danger btn-sm">خروج</a>
        </div>
    </div>
</nav>

<div class="container my-5">
    <div class="content-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>المعاينة</th>
                        <th>العنوان</th>
                        <th>التصنيف</th>
                        <th>التاريخ</th>
                        <th>الموقع</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM evente ORDER BY id DESC");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $imgSrc = "img/" . htmlentities($row['image']) . ".jpg"; 
                    ?>
                    <tr>
                        <td class="text-secondary fw-bold">#<?= $row['id'] ?></td>
                        <td>
                            <img src="<?= $imgSrc ?>" class="event-img" onerror="this.src='img/default.jpg'">
                        </td>
                        <td class="fw-bold"><?= htmlentities($row['title']) ?></td>
                        <td><span class="badge bg-primary rounded-pill"><?= htmlentities($row['category']) ?></span></td>
                        <td><?= $row['event_date'] ?></td>
                        <td class="small text-muted"><?= htmlentities($row['location']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary me-1">تعديل</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('هل تريد حذف هذه الفعالية؟')">حذف</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer class="text-center py-4">
    
</footer>

</body>
</html>
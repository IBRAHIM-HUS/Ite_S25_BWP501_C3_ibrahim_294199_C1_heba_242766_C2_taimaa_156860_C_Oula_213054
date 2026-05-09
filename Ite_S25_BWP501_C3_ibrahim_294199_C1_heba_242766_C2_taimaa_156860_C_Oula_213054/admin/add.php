<?php 
session_start();
// التحقق من تسجيل الدخول
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit();
}
$pdo = new PDO('mysql:host=localhost;dbname=active1;charset=utf8mb4','root', ''); 
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة فعالية</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand">➕ إضافة فعالية جديدة</span>
    </div>
</nav>

<div class="container my-5">

<?php
// عند الإرسال
if (isset($_POST['title']) && isset($_POST['description']) 
    && isset($_POST['category']) && isset($_POST['location']) 
    && isset($_POST['event_date']) && isset($_POST['image'])) {

    // إدخال البيانات
    $sql = "INSERT INTO evente (title, description, category, location, event_date, image) 
            VALUES (:title, :description, :category, :location, :event_date, :image)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':title' => $_POST['title'],
        ':description' => $_POST['description'],
        ':category' => $_POST['category'],
        ':location' => $_POST['location'],
        ':event_date' => $_POST['event_date'],
        ':image' => $_POST['image']
    ));

    $_SESSION['success'] = 'تمت إضافة الفعالية بنجاح';
    header('Location: manager.php');
    return;
}

// عرض الأخطاء
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
    unset($_SESSION['error']);
}
?>

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>إضافة فعالية جديدة</h4>
            </div>

            <div class="card-body">

                <form method="post">

                    <div class="mb-3">
                        <label class="form-label">العنوان</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الوصف</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">التصنيف</label>
                        <input type="text" name="category" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الموقع</label>
                        <input type="text" name="location" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">التاريخ</label>
                        <input type="date" name="event_date" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">رابط الصورة</label>
                        <input type="text" name="image" class="form-control">
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-4">➕ إضافة</button>
                        <a href="manager.php" class="btn btn-secondary px-4">↩ إلغاء</a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>© 2025 دليل فعاليات المدينة</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
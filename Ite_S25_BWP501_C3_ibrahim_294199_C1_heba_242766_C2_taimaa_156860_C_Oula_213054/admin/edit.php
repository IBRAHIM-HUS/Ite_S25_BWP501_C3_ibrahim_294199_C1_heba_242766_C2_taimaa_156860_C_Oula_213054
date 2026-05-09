<?php 
$pdo = new PDO('mysql:host=localhost;dbname=active1;charset=utf8mb4','root', ''); 
session_start();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل فعالية</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow" style="background-color: #004085 !important;">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="add.php" class="btn btn-primary fw-bold">+ إضافة فعالية جديدة</a>
        <span class="navbar-brand h3 mb-0 fw-bold">لوحة إدارة الفعاليات</span>
        <div class="d-flex align-items-center">
            <a href="index.php" class="btn btn-outline-light btn-sm me-3">🏠 الصفحة الرئيسية</a>
            <a href="?action=logout" class="btn btn-danger btn-sm">خروج</a>
        </div>
    </div>
</nav>

<div class="container my-5">

<?php
// عند الضغط على تحديث
if (isset($_POST['title']) && isset($_POST['description']) 
    && isset($_POST['category']) && isset($_POST['location']) 
    && isset($_POST['event_date']) && isset($_POST['image'])) {

    $sql = "UPDATE evente SET 
            title = :title,
            description = :description,
            category = :category,
            location = :location,
            event_date = :event_date,
            image = :image
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':title' => $_POST['title'],
        ':description' => $_POST['description'],
        ':category' => $_POST['category'],
        ':location' => $_POST['location'],
        ':event_date' => $_POST['event_date'],
        ':image' => $_POST['image'],
        ':id' => $_POST['id']
    ));

    $_SESSION['success'] = 'تم التحديث بنجاح';
    header('Location: manager.php');
    return;
}

// التحقق من id
if (!isset($_GET['id'])) {
    $_SESSION['error'] = "معرف غير موجود";
    header('Location: manager.php');
    return;
}

$stmt = $pdo->prepare("SELECT * FROM evente WHERE id = :id");
$stmt->execute([':id' => $_GET['id']]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row === false) {
    $_SESSION['error'] = "بيانات غير صحيحة";
    header('Location: manager.php');
    return;
}

// القيم
$title = htmlentities($row['title']);
$description = htmlentities($row['description']);
$category = htmlentities($row['category']);
$location = htmlentities($row['location']);
$event_date = htmlentities($row['event_date']);
$image = htmlentities($row['image']);
$id = $row['id'];
?>

<!-- رسائل -->
<?php
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
    unset($_SESSION['error']);
}
?>

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>تعديل بيانات الفعالية</h4>
            </div>

            <div class="card-body">

                <form method="post">

                    <input type="hidden" name="id" value="<?= $id ?>">

                    <div class="mb-3">
                        <label class="form-label">العنوان</label>
                        <input type="text" name="title" class="form-control" value="<?= $title ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الوصف</label>
                        <textarea name="description" class="form-control" rows="3"><?= $description ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">التصنيف</label>
                        <input type="text" name="category" class="form-control" value="<?= $category ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الموقع</label>
                        <input type="text" name="location" class="form-control" value="<?= $location ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">التاريخ</label>
                        <input type="date" name="event_date" class="form-control" value="<?= $event_date ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">رابط الصورة</label>
                        <input type="text" name="image" class="form-control" value="<?= $image ?>">
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-4">💾 حفظ التعديلات</button>
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
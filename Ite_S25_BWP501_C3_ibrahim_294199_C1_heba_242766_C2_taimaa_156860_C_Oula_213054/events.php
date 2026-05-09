<?php 
$pdo = new PDO('mysql:host=localhost;dbname=active1;charset=utf8mb4','root', ''); 
session_start();

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category = isset($_GET['category']) ? trim($_GET['category']) : 'all';

$sql = "SELECT * FROM evente WHERE 1";
$params = [];

if ($search !== '') {
    $sql .= " AND title LIKE :search";
    $params[':search'] = "%$search%";
}

if ($category !== '' && $category !== 'all') {
    $sql .= " AND category LIKE :category";
    $params[':category'] = "%$category%";
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الفعاليات - دليل فعاليات المدينة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* التنسيق اللازم للأيقونة الجديدة داخل الزر */
        .btn-icon-img {
            width: 18px; 
            height: 18px; 
            object-fit: contain; 
            vertical-align: middle;
            margin-left: 5px;
        }
        .btn-info {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">
    <img src="img/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-2"> 
    منهل الثقافة
    </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link active" href="events.php">الفعاليات</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">عن الدليل</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">اتصل بنا</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container my-5">
    <h2 class="text-center mb-4">الفعاليات</h2>
    <form method="GET">
        <div class="row mb-4">
            <div class="col-md-5">
                <input type="text" name="search" class="form-control" placeholder="اكتب اسم الفعالية" value="<?= htmlspecialchars($search) ?>">
            </div>
            <div class="col-md-4">
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="all">كل التصنيفات</option>
                    <?php
                    $cats = $pdo->query("SELECT DISTINCT category FROM evente");
                    while ($cat = $cats->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($category == $cat['category']) ? 'selected' : '';
                        echo "<option value='{$cat['category']}' $selected>{$cat['category']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">🔍 بحث</button>
            </div>
        </div>
    </form>

    <div class="row">
        <?php
        $found = false;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $found = true;
            
            $img_name = trim($row['image']);
            $img_src = "img/" . $img_name . ".jpg";

            echo "
            <div class='col-md-4 mb-4'>
                <div class='card h-100 shadow'>
                    <img src='{$img_src}' class='card-img-top' style='height:200px;object-fit:cover;' alt='Event'>
                    <div class='card-body'>
                        <span class='badge bg-primary mb-2'>{$row['category']}</span>
                        <h5>{$row['title']}</h5>
                        <p class='text-muted small'>{$row['description']}</p>
                    </div>
                    <div class='card-footer text-center'>
                        <small>{$row['event_date']}</small><br>
                        <small>{$row['location']}</small><br><br>
                        <a href='event.php?id={$row['id']}' class='btn btn-info btn-sm'>
                            <img src='img/details.png' class='btn-icon-img' alt='icon'>
                            تفاصيل
                        </a>
                    </div>
                </div>
            </div>
            ";
        }
        if (!$found) echo "<p class='text-center text-danger'>لا توجد نتائج</p>";
        ?>
    </div>
</div>
<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row text-center text-md-start">
            <div class="col-md-4 mb-3">
                <h5>منهل الثقافة</h5>
                <p class="small text-muted">منصة شاملة للتعريف بجميع الفعاليات والأنشطة في المدينة.</p>
            </div>
            <div class="col-md-4 mb-3 text-center">
                <h5>روابط سريعة</h5>
                <ul class="list-unstyled small">
                    <li><a href="index.php" class="text-white text-decoration-none">الرئيسية</a></li>
                    <li><a href="events.php" class="text-white text-decoration-none">الفعاليات</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3 text-center text-md-end">
                <h5>تواصل معنا</h5>
                <p class="small mb-0">info@cityevents.com</p>
                <p class="small">0123456789</p>
            </div>
        </div>
        <hr class="border-secondary">
        <div class="text-center small">
            <p class="mb-0">© 2025 منهل الثقافة. جميع الحقوق محفوظة.</p>
            <p class="mb-0 text-primary fw-bold">فريق العمل: إبراهيم الحصري، تيماء الغوش، هبة عبد الفتاح، علا حتاحت</p>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
$pdo = new PDO('mysql:host=localhost;dbname=active1;charset=utf8mb4','root', ''); 
session_start();

// جلب المعرف من الرابط وتأمينه
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل الفعالية - منهل الثقافة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-2">   منهل الثقافة
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">الرئيسية</a></li>
                        <li class="nav-item"><a class="nav-link" href="events.php">الفعاليات</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">عن الدليل</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <div id="eventDetails">
            <?php
            // تنفيذ الاستعلام
            $stmt = $pdo->prepare("SELECT * FROM evente WHERE id = ?");
            $stmt->execute([$id]);
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                // تجهيز مسار الصورة الصحيح (مجلد img + الاسم من القاعدة + .jpg)
                $imageName = trim($row['image']);
                $imagePath = "img/" . $imageName . ".jpg";
            ?>
                <div class="row">
                    <div class="col-md-8">
                        <img src="<?php echo $imagePath; ?>" class="img-fluid rounded mb-4" alt="Event Image" style="width: 100%; max-height: 450px; object-fit: cover;">
                        
                        <h1><?php echo $row['title']; ?></h1>
                        <div class="d-flex align-items-center mb-3 text-muted">
                            <span class="badge bg-primary me-2"><?php echo $row['category']; ?></span>
                            <span class="me-3">📅 <?php echo $row['event_date']; ?></span>
                            <span>📍 <?php echo $row['location']; ?></span>
                        </div>
                        <p class="mt-4 lead"><?php echo $row['description']; ?></p>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">معلومات الفعالية</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>التاريخ:</strong> <?php echo $row['event_date']; ?></p>
                                <hr>
                                <p><strong>المكان:</strong> <?php echo $row['location']; ?></p>
                                <hr>
                                <p><strong>التصنيف:</strong> <?php echo $row['category']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
            } 
            ?>
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="small text-muted">فريق العمل: إبراهيم الحصري، تيماء الغوش، هبة عبد الفتاح، علا حتاحت</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
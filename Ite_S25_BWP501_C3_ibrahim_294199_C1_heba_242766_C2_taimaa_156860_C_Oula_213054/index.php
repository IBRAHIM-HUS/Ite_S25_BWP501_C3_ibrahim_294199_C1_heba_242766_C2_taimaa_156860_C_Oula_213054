<?php 
// 1. بدء الجلسة لتذكر اختيار اللغة
session_start();

// 2. منطق تبديل اللغة
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// 3. تعيين اللغة الافتراضية (العربية) وتضمين ملف اللغة
$lang_file = 'lang_ar.php';
if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') {
    $lang_file = 'lang_en.php';
}
include($lang_file);

// 4. الاتصال بقاعدة البيانات
try {
    $pdo = new PDO('mysql:host=localhost;dbname=active1;charset=utf8mb4','root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("تعذر الاتصال بقاعدة البيانات: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang['html_lang']; ?>" dir="<?php echo $lang['html_dir']; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['page_title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    
    <style>
        .btn-custom {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 6px 16px;
            border-radius: 8px;
            background-color: #00d1ff; 
            border: none;
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn-custom:hover { background-color: #00b8e6; color: #fff; }
        .btn-icon {
            width: 20px;
            height: 20px;
            object-fit: contain;
        }
        .lang-switcher img { width: 25px; height: auto; }
        .event-card-img { height: 200px; object-fit: cover; width: 100%; }
        
        /* تحسين مظهر السلايدر لضمان وضوح النص */
        .carousel-caption {
            background: rgba(0, 0, 0, 0.6);
            right: 0;
            left: 0;
            bottom: 0;
            padding: 30px;
            text-align: center !important;
        }
    </style>
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="img/logo.png" alt="Logo" width="40" height="40" class="me-2"> 
                <?php echo $lang['navbar_brand']; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><?php echo $lang['nav_home']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="events.php"><?php echo $lang['nav_events']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php"><?php echo $lang['nav_about']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php"><?php echo $lang['nav_contact']; ?></a></li>
                    <li class="nav-item d-flex align-items-center lang-switcher ms-lg-3">
                        <a href="index.php?lang=ar" class="nav-link p-1 mx-1"><img src="https://flagcdn.com/w40/sy.png" alt="Ar"></a>
                        <a href="index.php?lang=en" class="nav-link p-1 mx-1"><img src="https://flagcdn.com/w40/us.png" alt="En"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <main class="container my-5">
        <section id="home" class="hero-section">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
               <div class="carousel-inner">
            <?php 
            $stmt_slider = $pdo->query("SELECT * FROM evente ORDER BY id DESC LIMIT 3");
            $first = true; 
            
            while ($row = $stmt_slider->fetch(PDO::FETCH_ASSOC)) {
                $img_name = htmlentities($row['image']); 
                $img_path = "img/" . $img_name . ".jpg";
            ?>
                <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                    <img src="<?php echo $img_path; ?>" class="d-block w-100" style="height: 600px; object-fit: cover;" onerror="this.src='img/default.jpg'">
                    <div class="carousel-caption">
                        <div class="container">
                            <h1 class="display-4 fw-bold text-white"><?php echo htmlentities($row['title']); ?></h1>
                            <p class="lead mb-4 text-white"><?php echo mb_strimwidth(htmlentities($row['description']), 0, 150, "..."); ?></p>
                            <a href="event.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow">
                                <?php echo $lang['hero_button']; ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php 
                $first = false; 
            } ?>
        </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </section>

        <section class="py-5">
            <h2 class="text-center mb-5 fw-bold">أحدث الفعاليات</h2>
            <div class="row">
                <?php
                $stmt = $pdo->query("SELECT * FROM evente ORDER BY id DESC LIMIT 6"); 
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                    $imagePath = "img/" . trim($row['image']) . ".jpg";
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden">
                        <a href="event.php?id=<?php echo $row['id']; ?>">
                            <img src="<?php echo $imagePath; ?>" class="event-card-img" alt="Event Image">
                        </a>
                        <div class="card-body text-center">
                            <span class="badge bg-soft-primary text-primary mb-2"><?php echo $row['category']; ?></span>
                            <h5 class="card-title fw-bold"><?php echo $row['title']; ?></h5>
                            <p class="small text-muted mb-4">📅 <?php echo $row['event_date']; ?></p>
                            <a href="event.php?id=<?php echo $row['id']; ?>" class="btn-custom">
                                <img src="img/details.png" class="btn-icon" alt="icon">
                                <span>تفاصيل</span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>

        <section id="team" class="py-5 bg-light rounded-4">
            <div class="container text-center">
                <h2 class="mb-5 fw-bold"><?php echo $lang['team_title']; ?></h2>
                <div class="row">
                    <?php 
                    $team = [
                        ['id' => 1, 'img' => 'member1.png'],
                        ['id' => 2, 'img' => 'member2.png'],
                        ['id' => 3, 'img' => 'member3.png'],
                        ['id' => 4, 'img' => 'member4.png']
                    ];
                    foreach ($team as $m): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 bg-transparent">
                            <img src="img/<?php echo $m['img']; ?>" class="rounded-circle mx-auto mb-3 shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                            <h6 class="fw-bold"><?php echo $lang['team_member_'.$m['id'].'_name']; ?></h6>
                            <p class="small text-primary mb-0"><?php echo $lang['team_member_'.$m['id'].'_role']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><?php echo $lang['navbar_brand']; ?></h5>
                    <p class="text-muted small">منصة شاملة للتعريف بجميع الفعاليات والأنشطة في المدينة.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white text-decoration-none">الرئيسية</a></li>
                        <li><a href="events.php" class="text-white text-decoration-none">الفعاليات</a></li>
                        <li><a href="about.php" class="text-white text-decoration-none">عن الدليل</a></li>
                        <li><a href="contact.php" class="text-white text-decoration-none">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>تواصل معنا</h5>
                    <p class="small mb-1">البريد الإلكتروني: ibrahimworkonlune01@gmail.com</p>
                    <p class="small mb-3">الهاتف: 0934473760</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="text-center">
                <p class="small text-muted mb-0">تم إنشاء هذا الموقع كجزء من مشروع مقرر BWP401</p>
                <p class="small text-muted">فريق العمل: إبراهيم الحصري، تيماء الغوش، هبة عبد الفتاح، علا حتاحت</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
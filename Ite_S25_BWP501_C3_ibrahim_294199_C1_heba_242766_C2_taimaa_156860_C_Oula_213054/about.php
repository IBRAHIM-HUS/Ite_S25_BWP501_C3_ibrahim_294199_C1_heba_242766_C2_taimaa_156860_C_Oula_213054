<?php 
session_start();
include('lang_ar.php');
$lang_file = 'lang_ar.php';
if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') {
    $lang_file = 'lang_en.php';
}
include($lang_file);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عن الدليل - دليل فعاليات المدينة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="index.php">
    <img src="img/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-2"> 
    منهل الثقافة
    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="events.php">الفعاليات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">عن الدليل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">اتصل بنا</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <!-- عن الدليل -->
        <section class="mb-5">
            <h1 class="text-center mb-4">عن دليل فعاليات المدينة</h1>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="text-primary">رؤيتنا</h2>
                    <p>أن نكون المنصة الأولى والمرجع الأساسي لجميع الفعاليات والأنشطة في المدينة، نسعى لتعزيز الحياة الثقافية والاجتماعية من خلال توفير معلومات شاملة ودقيقة عن جميع الأحداث.</p>

                    <h2 class="text-primary mt-4">رسالتنا</h2>
                    <p>تسهيل الوصول إلى المعلومات حول الفعاليات المختلفة، ودعم المنظمين في الترويج لفعالياتهم، وتمكين أفراد المجتمع من المشاركة في الأنشطة التي تثرى حياتهم وتوسع مداركهم.</p>
                </div>
                <div class="col-md-6">
                    <img src="img/event5.jpg" alt="عن دليل فعاليات المدينة" class="img-fluid rounded">
                </div>
            </div>
        </section>
    <!-- فريق العمل -->
     <section class="team-section py-5">
    <div class="container">
        <h2 class="text-center mb-5"><?php echo $lang['team_title']; ?></h2>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card team-card h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <img src="img/member1.png" alt="Member" class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;">
                        <h5><?php echo $lang['team_member_1_name']; ?></h5>
                        <p class="text-primary"><?php echo $lang['team_member_1_role']; ?></p>
                        <p class="small text-muted"><?php echo $lang['team_member_1_desc']; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card team-card h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <img src="img/member2.png" alt="Member" class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;">
                        <h5><?php echo $lang['team_member_2_name']; ?></h5>
                        <p class="text-primary"><?php echo $lang['team_member_2_role']; ?></p>
                        <p class="small text-muted"><?php echo $lang['team_member_2_desc']; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card team-card h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <img src="img/member3.png" alt="Member" class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;">
                        <h5><?php echo $lang['team_member_3_name']; ?></h5>
                        <p class="text-primary"><?php echo $lang['team_member_3_role']; ?></p>
                        <p class="small text-muted"><?php echo $lang['team_member_3_desc']; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card team-card h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <img src="img/member4.png" alt="Member" class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;">
                        <h5><?php echo $lang['team_member_4_name']; ?></h5>
                        <p class="text-primary"><?php echo $lang['team_member_4_role']; ?></p>
                        <p class="small text-muted"><?php echo $lang['team_member_4_desc']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- السياسات -->
        <section class="mb-5">
            <h2 class="text-center mb-4">سياسات الدليل</h2>
            <div class="accordion" id="policiesAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#policyOne" aria-expanded="true" aria-controls="policyOne">
                            معايير إضافة الفعاليات
                        </button>
                    </h2>
                    <div id="policyOne" class="accordion-collapse collapse show" data-bs-parent="#policiesAccordion">
                        <div class="accordion-body">
                            <ul>
                                <li>يجب أن تكون الفعالية مفتوحة للجمهور أو جزء منها.</li>
                                <li>يجب أن تكون المعلومات المقدمة دقيقة وكاملة.</li>
                                <li>يجب أن تلتزم الفعالية بالقوانين والأنظمة المحلية.</li>
                                <li>يجب ألا تتعارض الفعالية مع القيم المجتمعية.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#policyTwo" aria-expanded="false" aria-controls="policyTwo">
                            سياسة الخصوصية
                        </button>
                    </h2>
                    <div id="policyTwo" class="accordion-collapse collapse" data-bs-parent="#policiesAccordion">
                        <div class="accordion-body">
                            <p>نحن نحترم خصوصيتك ونسعى لحماية بياناتك الشخصية. لا نشارك معلوماتك مع أطراف ثالثة دون موافقتك إلا في الحالات التي يتطلبها القانون.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#policyThree" aria-expanded="false" aria-controls="policyThree">
                            كيفية إضافة فعالية
                        </button>
                    </h2>
                    <div id="policyThree" class="accordion-collapse collapse" data-bs-parent="#policiesAccordion">
                        <div class="accordion-body">
                            <ol>
                                <li>اذهب إلى صفحة "اتصل بنا".</li>
                                <li>املأ النموذج بالمعلومات المطلوبة.</li>
                                <li>أرفق صورة مناسبة للفعالية.</li>
                                <li>سيتم مراجعة طلبك خلال 48 ساعة.</li>
                                <li>سيتم إعلامك بقبول أو رفض إضافة الفعالية.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>دليل فعاليات المدينة</h5>
                    <p>منصة شاملة للتعريف بجميع الفعاليات والأنشطة في المدينة.</p>
                </div>
                <div class="col-md-4">
                    <h5>روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white">الرئيسية</a></li>
                        <li><a href="events.php" class="text-white">الفعاليات</a></li>
                        <li><a href="about.php" class="text-white">عن الدليل</a></li>
                        <li><a href="contact.php" class="text-white">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>تواصل معنا</h5>
                    <p>البريد الإلكتروني: ibrahimworkonline01@cityevents.com</p>
                    <p> الهاتف: 0934473760</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">© 2026 دليل فعاليات المدينة. جميع الحقوق محفوظة.</p>
                <p>تم إنشاء هذا الموقع كجزء من مشروع مقرر BWP401</p>
                <p>فريق العمل: إبراهيم الحصري، تيماء الغوش، هبة عبد الفتاح، علا حتاحت</p>            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>
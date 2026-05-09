<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اتصل بنا - دليل فعاليات المدينة</title>
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
        <h1 class="text-center mb-4">اتصل بنا</h1>

        <div class="row">
            <div class="col-md-8">
                <!-- رسائل النجاح/الخطأ -->
                <div id="formMessages"></div>

                <!-- نموذج الاتصال -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">أرسل رسالة</h5>
                    </div>
                    <div class="card-body">
                        <form id="contactForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">الاسم الكامل</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">الموضوع</label>
                                <select class="form-select" id="subject">
                                    <option value="استفسار">استفسار عام</option>
                                    <option value="مقترح">مقترح</option>
                                    <option value="شكوى">شكوى</option>
                                    <option value="فعالية">إضافة فعالية</option>
                                    <option value="تعاون">فرص تعاون</option>
                                    <option value="أخرى">أخرى</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">الرسالة</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">إرسال الرسالة</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- معلومات التواصل -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">معلومات التواصل</h5>
                    </div>
                    <div class="card-body">
                        <p><i class="fas fa-envelope me-2 text-primary"></i> <strong>البريد الإلكتروني:</strong> ibrahimworkonline01@gmail.com</p>
                        <p><i class="fas fa-phone me-2 text-primary"></i> <strong>الهاتف:</strong> 0934473760</p>
                        <p><i class="fas fa-map-marker-alt me-2 text-primary"></i> <strong>العنوان:</strong> دمشق - الميدان - حقلة</p>
                    </div>
                </div>

                <!-- وسائل التواصل الاجتماعي -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">وسائل التواصل الاجتماعي</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <a href="#" class="btn btn-outline-primary btn-social">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-social">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-social">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-social">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- أوقات العمل -->
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">أوقات العمل</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>الأحد - الخميس:</strong> 11:00 ص - 7:00 م</p>
                        <p><strong>الجمعة والسبت:</strong> مغلق</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- خريطة الموقع -->
        <div class="card mt-5">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">خريطة الموقع</h5>
            </div>
            <div class="card-body">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.231831553158!2d46.67278227599606!3d24.831122277956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee3e9c2e7c2b5%3A0x2d3d2e3d3e3d3e3d!2sRiyadh%2C%20Saudi%20Arabia!5e0!3m2!1sen!2sus!4v1633456789012!5m2!1sen!2sus"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
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
                    <p>البريد الإلكتروني: ibrahimworkonlune01@gmail.com</p>
                    <p>الهاتف: 0934473760</p>
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
                <p>فريق العمل: إبراهيم الحصري، تيماء الغوش، هبة عبد الفتاح، علا حتاحت</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>
// بيانات وهمية للفعاليات (سيتم استبدالها بقاعدة بيانات حقيقية في التطبيق النهائي)
const eventsData = [{
        id: 2,
        title: "ماراثون المدينة السنوي",
        date: "2025-10-20",
        time: "08:00",
        location: "المنتزه المركزي",
        category: "رياضة",
        image: "img/event2.jpg",
        description: "انضم إلى آلاف المشاركين في ماراثون هذا العام لمسافات متنوعة تناسب جميع المستويات.",
        featured: true
    },
    {
        id: 3,
        title: "معرض الكتاب",
        date: "2025-10-25",
        time: "10:00",
        location: "مركز المعارض",
        category: "ثقافة",
        image: "img/event3.jpg",
        description: "أكبر معرض للكتاب في المنطقة، يضم آلاف العناوين ودور النشر المحلية والعالمية.",
        featured: true
    },
    {
        id: 4,
        title: "ندوة التكنولوجيا والابتكار",
        date: "2025-10-18",
        time: "16:00",
        location: "قاعة المؤتمرات",
        category: "تعليم",
        image: "img/event4.jpg",
        description: "ندوة تناقش أحدث trends في عالم التكنولوجيا والابتكار بمشاركة خبراء ومتحدثين مرموقين.",
        featured: false
    },
    {
        id: 5,
        title: "عرض مسرحي: الليلة الكبيرة",
        date: "2025-10-22",
        time: "20:00",
        location: "المسرح الوطني",
        category: "ترفيه",
        image: "img/event5.jpg",
        description: "عرض مسرحي كوميدي من تأليف وإخراج نخبة من الفنانين المحليين.",
        featured: false
    },
    {
        id: 6,
        title: "ورشة عمل الفنون التشكيلية",
        date: "2025-10-19",
        time: "14:00",
        location: "مركز الفنون",
        category: "ثقافة",
        image: "img/event6.jpg",
        description: "ورشة عملية لتعليم أساسيات الرسم والتلوين بتقنيات مختلفة للمبتدئين والمحترفين.",
        featured: false
    }
];

// دالة لعرض الفعاليات البارزة
function displayFeaturedEvents() {
    const featuredEventsContainer = document.getElementById('featuredEvents');
    const featuredEvents = eventsData.filter(event => event.featured);

    featuredEventsContainer.innerHTML = '';

    featuredEvents.forEach(event => {
        const eventCard = `
            <div class="col-md-4 mb-4">
                <div class="card h-100 event-card" data-id="${event.id}">
                    <img src="${event.image}" class="card-img-top" alt="${event.title}">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">${event.category}</span>
                        <h5 class="card-title">${event.title}</h5>
                        <p class="card-text">${event.description.substring(0, 100)}...</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <small class="text-muted"><i class="far fa-calendar-alt me-1"></i> ${event.date} | <i class="far fa-clock me-1"></i> ${event.time}</small>
                        <br>
                        <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i> ${event.location}</small>
                    </div>
                </div>
            </div>
        `;
        featuredEventsContainer.innerHTML += eventCard;
    });

    // إضافة حدث النقر لفتح صفحة التفاصيل
    document.querySelectorAll('.event-card').forEach(card => {
        card.addEventListener('click', () => {
            const eventId = card.getAttribute('data-id');
            window.location.href = `event.html?id=${eventId}`;
        });
    });
}

// دالة لعرض أحدث الفعاليات
function displayLatestEvents() {
    const latestEventsContainer = document.getElementById('latestEvents');
    // نعرض فقط الفعاليات غير البارزة
    const latestEvents = eventsData.filter(event => !event.featured);

    latestEventsContainer.innerHTML = '';

    latestEvents.forEach(event => {
        const eventCard = `
            <div class="col-md-4 mb-4">
                <div class="card h-100 event-card" data-id="${event.id}">
                    <img src="${event.image}" class="card-img-top" alt="${event.title}">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">${event.category}</span>
                        <h5 class="card-title">${event.title}</h5>
                        <p class="card-text">${event.description.substring(0, 100)}...</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <small class="text-muted"><i class="far fa-calendar-alt me-1"></i> ${event.date} | <i class="far fa-clock me-1"></i> ${event.time}</small>
                        <br>
                        <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i> ${event.location}</small>
                    </div>
                </div>
            </div>
        `;
        latestEventsContainer.innerHTML += eventCard;
    });

    // إضافة حدث النقر لفتح صفحة التفاصيل
    document.querySelectorAll('.event-card').forEach(card => {
        card.addEventListener('click', () => {
            const eventId = card.getAttribute('data-id');
            window.location.href = `event.php?id=${eventId}`;
        });
    });
}

// دالة لتصفية الفعاليات حسب التصنيف
function setupCategoryFilters() {
    document.querySelectorAll('.category-filter').forEach(button => {
        button.addEventListener('click', () => {
            const category = button.getAttribute('data-category');
            filterEvents(category);
        });
    });
}

function filterEvents(category) {
    const events = document.querySelectorAll('.event-card');

    events.forEach(event => {
        const eventCategory = event.querySelector('.badge').textContent;

        if (category === 'all' || eventCategory === category) {
            event.parentElement.style.display = 'block';
        } else {
            event.parentElement.style.display = 'none';
        }
    });
}

// دالة للتحقق من صحة النموذج في صفحة اتصل بنا
function validateContactForm() {
    const form = document.getElementById('contactForm');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        let isValid = true;
        let errorMessage = '';

        if (name === '') {
            isValid = false;
            errorMessage += 'الاسم مطلوب.<br>';
        }

        if (email === '' || !emailRegex.test(email)) {
            isValid = false;
            errorMessage += 'البريد الإلكتروني غير صحيح.<br>';
        }

        if (message === '') {
            isValid = false;
            errorMessage += 'الرسالة مطلوبة.<br>';
        }

        if (isValid) {
            // إظهار رسالة النجاح باستخدام Bootstrap Alert
            const successAlert = `
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>تم الإرسال بنجاح!</strong> شكراً لتواصلك معنا، سنرد عليك في أقرب وقت.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            document.getElementById('formMessages').innerHTML = successAlert;
            form.reset();
        } else {
            // إظهار رسالة الخطأ
            const errorAlert = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>خطأ في الإرسال:</strong><br> ${errorMessage}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            document.getElementById('formMessages').innerHTML = errorAlert;
        }
    });
}

// تهيئة جميع المكونات عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', function() {
    // تهيئة الصفحة الرئيسية
    if (document.getElementById('featuredEvents')) {
        displayFeaturedEvents();
        displayLatestEvents();
        setupCategoryFilters();
    }

    // تهيئة نموذج الاتصال
    validateContactForm();

    // تهيئة صفحة تفاصيل الفعالية
    if (document.getElementById('eventDetails')) {
        displayEventDetails();
    }

    // تهيئة صفحة جميع الفعاليات
    if (document.getElementById('allEvents')) {
        displayAllEvents();
        setupEventFilters();
    }
});

// دالة لعرض تفاصيل الفعالية (لصفحة event.html)
function displayEventDetails() {
    const urlParams = new URLSearchParams(window.location.search);
    const eventId = urlParams.get('id');

    if (!eventId) {
        document.getElementById('eventDetails').innerHTML = `
            <div class="alert alert-danger" role="alert">
                لم يتم العثور على الفعالية المطلوبة.
            </div>
        `;
        return;
    }

    const event = eventsData.find(e => e.id == eventId);

    if (!event) {
        document.getElementById('eventDetails').innerHTML = `
            <div class="alert alert-danger" role="alert">
                لم يتم العثور على الفعالية المطلوبة.
            </div>
        `;
        return;
    }

    document.getElementById('eventDetails').innerHTML = `
        <div class="row">
            <div class="col-md-8">
                <img src="${event.image}" class="img-fluid rounded mb-4" alt="${event.title}">
                <h1>${event.title}</h1>
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-primary me-2">${event.category}</span>
                    <span class="text-muted"><i class="far fa-calendar-alt me-1"></i> ${event.date}</span>
                    <span class="text-muted ms-3"><i class="far fa-clock me-1"></i> ${event.time}</span>
                    <span class="text-muted ms-3"><i class="fas fa-map-marker-alt me-1"></i> ${event.location}</span>
                </div>
                <p>${event.description}</p>
                
                <div class="d-flex mt-4">
                    <button class="btn btn-primary me-2" id="addToCalendar"><i class="far fa-calendar-plus me-1"></i> أضف إلى التقويم</button>
                    <button class="btn btn-outline-primary" id="shareEvent"><i class="fas fa-share-alt me-1"></i> مشاركة</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">معلومات الفعالية</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>التاريخ:</strong> ${event.date}</p>
                        <p><strong>الوقت:</strong> ${event.time}</p>
                        <p><strong>المكان:</strong> ${event.location}</p>
                        <p><strong>التصنيف:</strong> ${event.category}</p>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">فعاليات ذات صلة</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            ${getRelatedEvents(event.id, event.category).map(relatedEvent => `
                                <a href="event.html?id=${relatedEvent.id}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">${relatedEvent.title}</h6>
                                        <small>${relatedEvent.date}</small>
                                    </div>
                                    <small class="text-muted">${relatedEvent.location}</small>
                                </a>
                            `).join('')}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // إضافة أحداث للأزرار
    document.getElementById('addToCalendar')?.addEventListener('click', function() {
        alert('تمت إضافة الفعالية إلى تقويمك');
    });
    
    document.getElementById('shareEvent')?.addEventListener('click', function() {
        if (navigator.share) {
            navigator.share({
                title: event.title,
                text: event.description,
                url: window.location.href
            })
            .catch(error => {
                console.log('Error sharing:', error);
            });
        } else {
            alert('مشاركة الرابط: ' + window.location.href);
        }
    });
}

// دالة للحصول على فعاليات ذات صلة
function getRelatedEvents(currentEventId, category) {
    return eventsData
        .filter(event => event.id != currentEventId && event.category === category)
        .slice(0, 3);
}

// دالة لعرض جميع الفعاليات (لصفحة events.html)
function displayAllEvents() {
    const eventsContainer = document.getElementById('allEvents');
    
    eventsData.forEach(event => {
        const eventCard = `
            <div class="col-md-6 col-lg-4 mb-4" data-category="${event.category}">
                <div class="card h-100 event-card" data-id="${event.id}">
                    <img src="${event.image}" class="card-img-top" alt="${event.title}">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">${event.category}</span>
                        <h5 class="card-title">${event.title}</h5>
                        <p class="card-text">${event.description.substring(0, 100)}...</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted"><i class="far fa-calendar-alt me-1"></i> ${event.date}</small>
                            <a href="event.php?id=${event.id}" class="btn btn-sm btn-primary">التفاصيل</a>
                        </div>
                    </div>
                </div>
            </div>
        `;
        eventsContainer.innerHTML += eventCard;
    });
}

// دالة لإعداد فلاتر الفعاليات في صفحة events.html
function setupEventFilters() {
    const categoryFilter = document.getElementById('categoryFilter');
    const dateFilter = document.getElementById('dateFilter');
    const searchInput = document.getElementById('searchInput');
    
    if (categoryFilter) {
        categoryFilter.addEventListener('change', filterAllEvents);
    }
    
    if (dateFilter) {
        dateFilter.addEventListener('change', filterAllEvents);
    }
    
    if (searchInput) {
        searchInput.addEventListener('keyup', filterAllEvents);
    }
}

function filterAllEvents() {
    const categoryValue = document.getElementById('categoryFilter')?.value || 'all';
    const dateValue = document.getElementById('dateFilter')?.value || '';
    const searchValue = document.getElementById('searchInput')?.value.toLowerCase() || '';
    
    const eventCards = document.querySelectorAll('#allEvents > div');
    
    eventCards.forEach(card => {
        const eventCategory = card.getAttribute('data-category');
        const eventDate = card.querySelector('.card-footer small')?.textContent.split(' ')[1] || '';
        const eventTitle = card.querySelector('.card-title')?.textContent.toLowerCase() || '';
        const eventDescription = card.querySelector('.card-text')?.textContent.toLowerCase() || '';
        
        const categoryMatch = categoryValue === 'all' || eventCategory === categoryValue;
        const dateMatch = !dateValue || eventDate === dateValue;
        const searchMatch = !searchValue || 
                           eventTitle.includes(searchValue) || 
                           eventDescription.includes(searchValue);
        
        if (categoryMatch && dateMatch && searchMatch) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
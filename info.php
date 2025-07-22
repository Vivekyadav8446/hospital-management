<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .feature-card {
            transition: transform 0.3s;
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }
        .department-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #0d6efd;
        }
    </style>
</head>
<body>
<?php include("include/header.php"); ?>

<!-- Hero Section -->
<section class="hero-section text-center mb-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Welcome to Our Hospital</h1>
        <p class="lead">Providing exceptional healthcare services with compassion and excellence</p>
    </div>
</section>

<!-- About Hospital Management -->
<section class="container mb-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="mb-4">About Our Hospital Management</h2>
            <p class="lead">Our hospital management system is designed to deliver efficient, patient-centered care through innovative technology and best practices.</p>
            <p>We combine administrative expertise with medical excellence to ensure seamless operations across all departments. Our management team works tirelessly to maintain the highest standards of healthcare delivery while optimizing resources and improving patient outcomes.</p>
        </div>
        <div class="col-lg-6">
            <img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                 alt="Hospital Management" class="img-fluid rounded shadow">
        </div>
    </div>
</section>

<!-- Key Features -->
<section class="bg-light py-5 mb-5">
    <div class="container">
        <h2 class="text-center mb-5">Our Key Features</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card p-4 h-100">
                    <div class="department-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h3>24/7 Emergency Care</h3>
                    <p>Fully equipped emergency department staffed with experienced professionals ready to handle any medical crisis.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card p-4 h-100">
                    <div class="department-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h3>Expert Medical Team</h3>
                    <p>Board-certified physicians, surgeons, and specialists providing comprehensive care across all medical disciplines.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card p-4 h-100">
                    <div class="department-icon">
                        <i class="bi bi-hospital"></i>
                    </div>
                    <h3>Advanced Facilities</h3>
                    <p>State-of-the-art diagnostic equipment, modern operation theaters, and comfortable patient rooms.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card p-4 h-100">
                    <div class="department-icon">
                        <i class="bi bi-file-earmark-medical"></i>
                    </div>
                    <h3>Electronic Health Records</h3>
                    <p>Secure digital records system ensuring seamless information flow between departments and providers.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card p-4 h-100">
                    <div class="department-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <h3>Online Appointment System</h3>
                    <p>Convenient scheduling platform allowing patients to book appointments anytime, anywhere.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card p-4 h-100">
                    <div class="department-icon">
                        <i class="bi bi-activity"></i>
                    </div>
                    <h3>Preventive Care Programs</h3>
                    <p>Comprehensive wellness initiatives including health screenings, vaccinations, and lifestyle counseling.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hospital Departments -->
<section class="container mb-5">
    <h2 class="text-center mb-5">Our Specialized Departments</h2>
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="card feature-card p-4 h-100">
                <div class="department-icon">
                    <i class="bi bi-heart"></i>
                </div>
                <h4>Cardiology</h4>
                <p>Comprehensive heart care including diagnostic tests, interventions, and rehabilitation programs.</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card feature-card p-4 h-100">
                <div class="department-icon">
                    <i class="bi bi-lungs"></i>
                </div>
                <h4>Pulmonology</h4>
                <p>Specialized care for respiratory conditions including asthma, COPD, and sleep disorders.</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card feature-card p-4 h-100">
                <div class="department-icon">
                    <i class="bi bi-bandaid"></i>
                </div>
                <h4>Orthopedics</h4>
                <p>Advanced treatment for bone and joint disorders, including sports injuries and arthritis.</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card feature-card p-4 h-100">
                <div class="department-icon">
                    <i class="bi bi-gender-ambiguous"></i>
                </div>
                <h4>Pediatrics</h4>
                <p>Compassionate care for infants, children, and adolescents with specialized pediatric services.</p>
            </div>
        </div>
    </div>
</section>

<!-- Quality Assurance -->
<section class="bg-info text-white py-5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2>Quality Assurance & Accreditation</h2>
                <p class="lead">Our hospital maintains the highest standards of care through rigorous quality control measures and holds accreditation from leading healthcare organizations.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <button class="btn btn-outline-light btn-lg">View Our Certifications</button>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="container mb-5">
    <h2 class="text-center mb-5">Patient Testimonials</h2>
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>"The care I received was exceptional. The doctors took time to explain everything and the staff was very supportive."</p>
                        <footer class="blockquote-footer">Sarah Johnson</footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>"The facilities are world-class and the treatment I got helped me recover faster than I expected."</p>
                        <footer class="blockquote-footer">Michael Chen</footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>"From emergency to follow-up care, every aspect of my treatment was handled professionally and compassionately."</p>
                        <footer class="blockquote-footer">Priya Patel</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <h4>Contact Information</h4>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> 123 Medical Drive, Health City</li>
                    <li class="mb-2"><i class="bi bi-telephone me-2"></i> (123) 456-7890</li>
                    <li class="mb-2"><i class="bi bi-envelope me-2"></i> info@hospitalmanagement.com</li>
                </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <h4>Opening Hours</h4>
                <ul class="list-unstyled">
                    <li class="mb-2">Emergency: 24/7</li>
                    <li class="mb-2">OPD: 8:00 AM - 8:00 PM</li>
                    <li class="mb-2">Pharmacy: 7:00 AM - 11:00 PM</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Quick Links</h4>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-decoration-none">Find a Doctor</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none">Book an Appointment</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none">Patient Portal</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
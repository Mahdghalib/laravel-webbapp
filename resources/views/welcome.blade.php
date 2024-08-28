@extends('layouts.app')

@section('title')
    Welcome to OCP Space
@endsection

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
    <div class="container">
        <div class="navbar-left">
            <a class="navbar-brand" href="#">
                <img src="{{ url('images/pp.png') }}" alt="OCP logo" id="logo" >
            </a>
        </div>
        <div class="navbar-right d-flex align-items-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about-section">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services-section">Services and Solutions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cta-section">Customer</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="btn btn-primary ml-3" href="{{ url('/login') }}">Admin</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="btn btn-primary ml-3" href="{{ url('admin/home') }}">Home</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="hero-section" style="background-image: url('/images/lla.png'); background-size: cover; background-position: left; height: 100vh; color: white; display: flex; align-items: center;">
    <div class="container text-center">
        <p class="lead"></p>
        <div class="mt-5">
            <a href="#explore" class="btn btn-link text-white">DEFILER POUR EXPLORER <i class="fas fa-arrow-down"></i></a>
        </div>
    </div>
</div>

<div id="explore" class="container-fluid py-5 background-transition">
    <div class="row justify-content-center mb-5">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>

    <div id="about-section" class="row mb-5">
        <div class="col-md-10 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #004D40; color: white;">
                    <h4>About OCP</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">OCP was founded in Morocco in 1920 as the Office Chérifien des Phosphates. We started with a single mine at Khouribga. Our operations now span five continents, and we work throughout the value chain, from mining and manufacturing to education and community development.
                    OCP began phosphate production in March 1921 in Khouribga, with exports via the port at Casablanca later that year. A second mine opened in Youssoufia in 1931, and a third in Benguerir in 1976. The company also diversified into phosphate processing, opening chemical facilities in Safi (1965) and Jorf Lasfar (1984).
                    In 2008, the company became the OCP Group S.A., owned by the Moroccan Government and the Banque Populaire du Maroc. Our continued success has depended on relationships with our community, a commitment to lessening our impact on our precious environment, and the opportunity to partner with innovative local businesses.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="services-section" class="row mb-5">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #00897B; color: white;">
                    <h5>High-Quality Products</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Providing top-tier phosphate-based fertilizers...</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #00897B; color: white;">
                    <h5>Sustainable Practices</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Committed to environmentally responsible operations...</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #00897B; color: white;">
                    <h5>Innovative Solutions</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Leading in research and development...</p>
                </div>
            </div>
        </div>
    </div>

   
    <div id="cta-section" class="row justify-content-center mt-5">
        <div class="col-md-8 text-center">
            <div class="card shadow-sm">
                <div class="card-body" style="background-color: #004D40; color: white;">
                    <h4>We need your feedback, feel free!</h4>
                    <p class="mb-4 text-white-50">Become a part of OCP's global community...</p>
                    <a href="{{ url('/feedback') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-user-plus mr-2"></i> Let us know more
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p class="mb-0">&copy; {{ date('Y') }} OCP. All rights reserved.</p>
        <p class="mb-0">Phone: +212 5376-00000 | Email: contact@ocpgroup.ma</p>
        <p class="mb-0">Website: <a href="https://www.ocpgroup.ma" class="text-white">www.ocpgroup.ma</a></p>
      
        <div class="social-links mt-3">
            <a href="https://www.facebook.com/OCPGroup" class="text-white" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/OCPGroup" class="text-white" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.linkedin.com/company/ocpgroup" class="text-white" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.instagram.com/ocpgroup/" class="text-white" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>


<script>

document.querySelectorAll('.nav-card').forEach(card => {
    card.addEventListener('click', function() {
        document.querySelector(this.getAttribute('data-target')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>

<style>

body {
    background-color: #E0E0E0;
}

.hero-section {
    background: url('/images/fif.jpg') no-repeat center center;
    background-size: cover;
}

/
.navbar {
    background-color: #004D40;
}

.navbar .navbar-left {
    flex: 1;
}


.navbar .navbar-right {
    display: flex;
    align-items: left;
}

.navbar .nav-link {
    color: white;
}

.navbar .btn-primary {
    background-color: #00897B;
    border-color: #00897B;
}

.card {
    position: relative;
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
}


.card-header {
    background: linear-gradient(135deg, #004D40, #00796B);
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 1.5rem;
    font-weight: bold;
    border-bottom: none;
    transition: background 0.3s ease;
}


.card-body {
    padding: 20px;
    text-align: center;
    font-size: 1rem;
    color: #555;
    opacity: 1;
    transform: translateY(0);
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.social-links a {
    margin: 0 10px;
    font-size: 1.5rem;
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: #00897B; 
}


footer {
    background-color: #333;
    color: #fff;
}

footer p {
    margin: 0;
    font-size: 0.9rem;
}



.card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
}

.card:hover .card-header {
    background: linear-gradient(135deg, #00796B, #004D40);
}

.card:hover .card-body {
    opacity: 0.9;
    transform: translateY(-10px);
}

.card:hover .card-footer {
    background-color: #004D40;
    color: white;
}


.card .btn-primary {
    background-color: #00897B;
    border-color: #00897B;
    border-radius: 30px;
    padding: 10px 30px;
    font-size: 1rem;
    transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 137, 123, 0.4);
}

.card .btn-primary:hover {
    background-color: #004D40;
    box-shadow: 0 8px 20px rgba(0, 77, 64, 0.4);
    transform: translateY(-3px);
}

.card-header i {
    font-size: 2rem;
    margin-bottom: 10px;
    color: white;
    display: block;
    transition: transform 0.3s ease;
}

.card:hover .card-header i {
    transform: rotate(360deg);
}


.card-body p {
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 20px;
}

.card-footer a {
    color: #00897B;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.card-footer a:hover {
    color: #004D40;
}


.background-transition {
    transition: background-color 0.4s ease;
}

.background-transition:hover {
    background-color: #013220; 
}

#logo {
    width: 60px;
    height: 60px;
}

#welcome-text {
    width: 100px;
    height: 100px;
}


footer {
    background-color: #333;
    color: #fff;
}

footer p {
    margin: 0;
    font-size: 0.9rem;
}
</style>
@endsection








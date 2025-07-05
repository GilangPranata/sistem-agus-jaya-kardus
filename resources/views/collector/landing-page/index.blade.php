<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pt Agus Jaya Kardus - Premium Secondhand Cardboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: #8B4513;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .logo:hover {
            color: #A0522D;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        nav a:hover {
            color: #8B4513;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #8B4513;
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        .hero {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 120px 0 80px;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            color: #8B4513;
            opacity: 0;
            animation: fadeInUp 1s ease forwards;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #666;
            opacity: 0;
            animation: fadeInUp 1s ease 0.3s forwards;
        }

        .cta-button {
            background: #8B4513;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            opacity: 0;
            animation: fadeInUp 1s ease 0.6s forwards;
        }

        .cta-button:hover {
            background: #A0522D;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
        }

        .features {
            padding: 80px 0;
            background: #ffffff;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
        }

        .feature-card {
            text-align: center;
            padding: 2rem;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #f0f0f0;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            color: #8B4513;
            margin-bottom: 1rem;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #8B4513;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            text-align: center;
            color: #666;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .about {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            margin-top: 3rem;
        }

        .about-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .stat-item {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #8B4513;
        }

        .contact {
            padding: 80px 0;
            background: #ffffff;
        }

        .contact-form {
            max-width: 600px;
            margin: 3rem auto 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #8B4513;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 2rem 0;
        }

        .mobile-menu {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .about-content {
                grid-template-columns: 1fr;
            }
            
            nav ul {
                display: none;
            }
            
            .mobile-menu {
                display: block;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="#" class="logo">Pt Agus Jaya Kardus</a>
                <nav>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">Products</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </nav>
                <button class="mobile-menu">☰</button>
            </div>
        </div>
    </header>

    <section class="hero" id="home">
        <div class="container">
            <h1>Premium Secondhand Cardboard</h1>
            <p>Quality recycled cardboard for all your packaging and creative needs. Sustainable, affordable, and reliable.</p>
            <a href="#contact" class="cta-button">Shop Now</a>
        </div>
    </section>

    <section class="features" id="features">
        <div class="container">
            <h2 class="section-title">Why Choose Pt Agus Jaya Kardus?</h2>
            <p class="section-subtitle">We provide the highest quality secondhand cardboard with unmatched service and sustainability</p>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📦</div>
                    <h3>Quality Guaranteed</h3>
                    <p>Every piece of cardboard is carefully inspected and sorted to ensure it meets our high standards for your projects.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🌱</div>
                    <h3>Eco-Friendly</h3>
                    <p>Reduce waste and your carbon footprint by choosing our sustainable secondhand cardboard solutions.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Affordable Pricing</h3>
                    <p>Get premium cardboard at a fraction of the cost of new materials without compromising on quality.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="container">
            <h2 class="section-title">About Pt Agus Jaya Kardus</h2>
            <p class="section-subtitle">Your trusted partner in sustainable packaging solutions</p>
            
            <div class="about-content">
                <div class="about-text">
                    <p>At Pt Agus Jaya Kardus, we believe that sustainability and quality can go hand in hand. Our mission is to provide businesses and individuals with premium secondhand cardboard that not only meets their needs but also contributes to a more sustainable future.</p>
                    
                    <p>We carefully source, inspect, and categorize our cardboard to ensure you receive materials that are perfect for your specific requirements, whether it's for moving, crafting, or business packaging.</p>
                </div>
                
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div>Happy Customers</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div>Tons Recycled</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">5★</div>
                        <div>Average Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <div class="container">
            <h2 class="section-title">Get In Touch</h2>
            <p class="section-subtitle">Ready to make your order? Contact us today for a quote or to learn more about our products</p>
            
            <form class="contact-form" onsubmit="handleSubmit(event)">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required placeholder="Tell us about your cardboard needs..."></textarea>
                </div>
                
                <button type="submit" class="cta-button">Send Message</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2025 Pt Agus Jaya Kardus. All rights reserved. | Sustainable cardboard solutions for a better tomorrow.</p>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = '#ffffff';
                header.style.backdropFilter = 'none';
            }
        });

        // Form submission handler
        function handleSubmit(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            
            // Simple form validation and feedback
            const name = formData.get('name');
            const email = formData.get('email');
            const message = formData.get('message');
            
            if (name && email && message) {
                alert(`Thank you ${name}! Your message has been received. We'll get back to you at ${email} shortly.`);
                form.reset();
            }
        }

        // Add floating animation to feature cards
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-card').forEach(card => {
            observer.observe(card);
        });

        // Counter animation for stats
        function animateCounter(element, target) {
            let count = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                count += increment;
                if (count >= target) {
                    element.textContent = target.toLocaleString() + (target >= 1000 ? '+' : '★');
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(count).toLocaleString();
                }
            }, 20);
        }

        // Trigger counter animation when stats section is visible
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(stat => {
                        const text = stat.textContent;
                        if (text.includes('K')) {
                            animateCounter(stat, 10000);
                        } else if (text.includes('★')) {
                            animateCounter(stat, 5);
                        } else {
                            animateCounter(stat, 500);
                        }
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }
    </script>
</body>
</html>
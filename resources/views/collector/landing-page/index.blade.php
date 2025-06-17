<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plastic Used Good - Transforming Waste into Value</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            color: white;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            background: linear-gradient(45deg, #10b981, #06d6a0);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { filter: drop-shadow(0 0 5px rgba(16, 185, 129, 0.5)); }
            to { filter: drop-shadow(0 0 20px rgba(16, 185, 129, 0.8)); }
        }

        .login-btn {
            background: linear-gradient(45deg, #10b981, #06d6a0);
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.4);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
            top: -50%;
            left: -50%;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #ffffff, #10b981);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: slideUp 1s ease-out;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: slideUp 1s ease-out 0.2s both;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .cta-button {
            background: linear-gradient(45deg, #10b981, #06d6a0);
            border: none;
            padding: 18px 36px;
            border-radius: 30px;
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            animation: slideUp 1s ease-out 0.4s both;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
        }

        /* Overview Section */
        .overview {
            padding: 100px 0;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            margin: 50px 0;
            border-radius: 20px;
        }

        .overview h2 {
            font-size: 3rem;
            text-align: center;
            margin-bottom: 3rem;
            background: linear-gradient(45deg, #10b981, #06d6a0);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .overview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .overview-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .overview-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .overview-text {
            font-size: 1.2rem;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0.9;
        }

        /* Features Section */
        .features {
            padding: 100px 0;
        }

        .features h2 {
            font-size: 3rem;
            text-align: center;
            margin-bottom: 3rem;
            background: linear-gradient(45deg, #10b981, #06d6a0);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .feature-card {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(6, 214, 160, 0.1));
            padding: 40px;
            border-radius: 20px;
            border: 1px solid rgba(16, 185, 129, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(16, 185, 129, 0.3);
            border-color: rgba(16, 185, 129, 0.6);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #10b981, #06d6a0);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #10b981;
        }

        .feature-card p {
            opacity: 0.9;
            line-height: 1.7;
        }

        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.3);
            padding: 50px 0;
            text-align: center;
            margin-top: 100px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.2rem;
            }
            
            .overview h2,
            .features h2 {
                font-size: 2rem;
            }
            
            nav {
                padding: 0.5rem 0;
            }
            
            .logo {
                font-size: 1.5rem;
            }
        }

        /* Scroll animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <header>
        <nav class="container">
            <div class="logo">PT. Agus Jaya Kardus</div>
            <a href="{{ route('login') }}" class="login-btn" >Login</a>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Transform Waste<br>Into Value</h1>
                    <p>Revolutionary platform connecting plastic waste with sustainable solutions for a greener tomorrow</p>
                    <button class="cta-button" onclick="scrollToOverview()">Discover More</button>
                </div>
            </div>
        </section>

        <!-- Overview Section -->
        <section class="overview fade-in" id="overview">
            <div class="container">
                <h2>Our Mission</h2>
                <p class="overview-text">
                    Plastic Used Good is revolutionizing the circular economy by creating an intelligent marketplace that transforms plastic waste into valuable resources. We bridge the gap between waste generators and recycling innovators, fostering sustainable communities while driving environmental impact.
                </p>
                <div class="overview-grid">
                    <div class="overview-card">
                        <h3>🌍 Environmental Impact</h3>
                        <p>Reducing plastic waste in landfills and oceans by 85% through our innovative recycling network</p>
                    </div>
                    <div class="overview-card">
                        <h3>💼 Economic Value</h3>
                        <p>Creating new revenue streams from waste materials while supporting green job creation</p>
                    </div>
                    <div class="overview-card">
                        <h3>🔄 Circular Economy</h3>
                        <p>Enabling complete material lifecycle management through advanced tracking and optimization</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features fade-in" id="features">
            <div class="container">
                <h2>Platform Features</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">📊</div>
                        <h3>Smart Analytics</h3>
                        <p>Advanced AI-powered analytics track waste patterns, optimize collection routes, and predict recycling demand with machine learning algorithms.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🔗</div>
                        <h3>Supply Chain Integration</h3>
                        <p>Seamlessly connect waste generators, processors, and manufacturers through our integrated supply chain management system.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">💰</div>
                        <h3>Dynamic Pricing</h3>
                        <p>Real-time market pricing based on material quality, location, and demand ensures fair compensation for all participants.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🛡️</div>
                        <h3>Quality Assurance</h3>
                        <p>Blockchain-verified quality certificates and traceability ensure material integrity throughout the recycling process.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">📱</div>
                        <h3>Mobile Platform</h3>
                        <p>User-friendly mobile app for waste collection scheduling, real-time tracking, and instant payments.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🌱</div>
                        <h3>Impact Tracking</h3>
                        <p>Comprehensive environmental impact measurement showing CO2 reduction, energy savings, and waste diversion metrics.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 Plastic Used Good. Building a sustainable future, one piece of plastic at a time.</p>
        </div>
    </footer>

    <script>
        // Scroll animations
        function handleScrollAnimations() {
            const elements = document.querySelectorAll('.fade-in');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('visible');
                }
            });
        }

        window.addEventListener('scroll', handleScrollAnimations);
        handleScrollAnimations(); // Initial check

        // Smooth scrolling
        function scrollToOverview() {
            document.getElementById('overview').scrollIntoView({ 
                behavior: 'smooth' 
            });
        }

        // Login functionality
        function showLogin() {
            alert('Login functionality would connect to your authentication system here!');
        }

        // Header background on scroll
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(15, 23, 42, 0.98)';
            } else {
                header.style.background = 'rgba(15, 23, 42, 0.95)';
            }
        });

        // Feature cards hover effect enhancement
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        :root {
            --bg-color: #0c0e12;
            --text-color: #f3f4f6;
            --text-muted: #9ca3af;
            --accent-color: #ff2d20;
            --accent-glow: rgba(255, 45, 32, 0.3);
            --card-bg: rgba(255, 255, 255, 0.03);
            --card-border: rgba(255, 255, 255, 0.08);
            --glass-blur: 12px;
            --font-main: 'Inter', sans-serif;
            --font-heading: 'Outfit', sans-serif;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @media (prefers-color-scheme: light) {
            :root {
                --bg-color: #f9fafb;
                --text-color: #111827;
                --text-muted: #4b5563;
                --card-bg: rgba(0, 0, 0, 0.02);
                --card-border: rgba(0, 0, 0, 0.05);
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-main);
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Mesh Gradient Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 10% 20%, rgba(255, 45, 32, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(255, 45, 32, 0.05) 0%, transparent 40%);
            z-index: -1;
            pointer-events: none;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            padding: 4rem 2rem;
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.8s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        header {
            margin-bottom: 4rem;
        }

        .logo-container {
            margin-bottom: 2rem;
            display: flex;
            justify-content: center;
        }

        .logo {
            width: 80px;
            height: 80px;
            filter: drop-shadow(0 0 20px var(--accent-glow));
        }

        h1 {
            font-family: var(--font-heading);
            font-size: clamp(2.5rem, 8vw, 4.5rem);
            font-weight: 700;
            letter-spacing: -0.03em;
            margin-bottom: 1.5rem;
            background: linear-gradient(to bottom right, var(--text-color), var(--text-muted));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-text {
            font-size: clamp(1.1rem, 3vw, 1.35rem);
            color: var(--text-muted);
            max-width: 700px;
            margin: 0 auto 3.5rem;
            font-weight: 300;
        }

        .auth-links {
            display: flex;
            gap: 1.25rem;
            justify-content: center;
            margin-bottom: 6rem;
        }

        .btn {
            padding: 0.85rem 2rem;
            border-radius: 99px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background-color: var(--accent-color);
            color: white;
            box-shadow: 0 4px 25px var(--accent-glow);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 40px var(--accent-glow);
            background-color: #ff3e32;
        }

        .btn-secondary {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            color: var(--text-color);
            backdrop-filter: blur(var(--glass-blur));
        }

        .btn-secondary:hover {
            background: var(--card-border);
            transform: translateY(-3px);
            border-color: rgba(255, 255, 255, 0.2);
        }

        /* Grid Layout */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            width: 100%;
        }

        .card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 32px;
            padding: 2.5rem;
            text-align: left;
            text-decoration: none;
            color: inherit;
            backdrop-filter: blur(var(--glass-blur));
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            gap: 1rem;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-8px);
            border-color: rgba(255, 45, 32, 0.4);
            background: rgba(255, 255, 255, 0.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .card-icon {
            width: 48px;
            height: 48px;
            background: rgba(255, 45, 32, 0.1);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.5rem;
            transition: var(--transition);
        }

        .card:hover .card-icon {
            background: var(--accent-color);
            transform: scale(1.1) rotate(-5deg);
        }

        .card-icon svg {
            width: 24px;
            height: 24px;
            fill: var(--accent-color);
            transition: var(--transition);
        }

        .card:hover .card-icon svg {
            fill: white;
        }

        .card h3 {
            font-family: var(--font-heading);
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--text-color);
        }

        .card p {
            font-size: 1rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .card-footer {
            margin-top: auto;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--accent-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            opacity: 0;
            transform: translateX(-10px);
            transition: var(--transition);
        }

        .card:hover .card-footer {
            opacity: 1;
            transform: translateX(0);
        }

        .footer {
            margin-top: 6rem;
            font-size: 0.9rem;
            color: var(--text-muted);
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        @media (max-width: 640px) {
            .container {
                padding: 3rem 1.5rem;
            }
            .auth-links {
                flex-direction: column;
                align-items: stretch;
            }
            .btn {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class=\"container\">
        <header>
            <div class=\"logo-container\">
                <svg class=\"logo\" viewBox=\"0 0 62 65\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                    <path d=\"M61.8548 14.6253L29.7533 0.138246C29.1131 -0.150135 28.3619 -0.149434 27.7377 0.141324L0.413781 14.3644C0.126435 14.5147 -0.0210085 14.7958 0.00192535 15.0628C0.0248591 15.3298 0.201201 15.5492 0.441951 15.6133L31.3323 23.3641C31.5714 23.4241 31.8159 23.3214 31.9169 23.1118L61.8548 14.6253Z\" fill=\"#FF2D20\"/>
                    <path d=\"M61.5609 18.5308C61.3201 18.4667 61.1037 18.5772 61.0264 18.7758L31.3323 41.5204C31.1852 41.6331 31.0217 41.7101 30.85 41.7483L0.441951 51.5292C0.201201 51.5933 0.0248592 51.8127 0.0019255 52.0797C-0.020959 52.3467 0.126485 52.6278 0.413781 52.7781L27.7377 67.0012C28.3619 67.2919 29.1131 67.2912 29.7533 67.0028L61.5609 18.5308Z\" fill=\"#FF2D20\"/>
                    <path d=\"M31.3323 23.3641V41.5204L61.5609 18.5308C61.543 18.5262 61.5251 18.522 61.5072 18.5182L31.3323 23.3641Z\" fill=\"#B91C1C\"/>
                </svg>
            </div>
            <h1>The PHP Framework for Artisan</h1>
            <p class=\"hero-text\">Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.</p>
        </header>

        @if (Route::has('login'))
            <div class=\"auth-links\">
                @auth
                    <a href=\"{{ url('/dashboard') }}\" class=\"btn btn-primary\">Dashboard</a>
                @else
                    <a href=\"{{ route('login') }}\" class=\"btn btn-secondary\">Log in</a>

                    @if (Route::has('register'))
                        <a href=\"{{ route('register') }}\" class=\"btn btn-primary\">Get Started</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class=\"grid\">
            <a href=\"https://laravel.com/docs\" class=\"card\" target=\"_blank\">
                <div class=\"card-icon\">
                    <svg viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z\"/></svg>
                </div>
                <h3>Documentation</h3>
                <p>Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our entire documentation.</p>
                <div class=\"card-footer\">Read Docs →</div>
            </a>

            <a href=\"https://laracasts.com\" class=\"card\" target=\"_blank\">
                <div class=\"card-icon\">
                    <svg viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14l-5-5h10l-5 5z\"/></svg>
                </div>
                <h3>Laracasts</h3>
                <p>Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Massively level up your development skills in the process.</p>
                <div class=\"card-footer\">Start Watching →</div>
            </a>

            <a href=\"https://laravel-news.com\" class=\"card\" target=\"_blank\">
                <div class=\"card-icon\">
                    <svg viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-5 14H4v-4h11v4zm5 0h-4v-4h4v4zm0-5H4V6h16v7z\"/></svg>
                </div>
                <h3>Laravel News</h3>
                <p>Stay up to date with the latest and greatest news in the Laravel ecosystem. Community driven portal of all things Laravel.</p>
                <div class=\"card-footer\">Read News →</div>
            </a>

            <a href=\"https://forge.laravel.com\" class=\"card\" target=\"_blank\">
                <div class=\"card-icon\">
                    <svg viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M12 2L4.5 20.29l.71.71L12 18l6.79 3 .71-.71z\"/></svg>
                </div>
                <h3>Laravel Forge</h3>
                <p>Painlessly bridge the gap between your code and the server. Deploy and manage your web applications with zero downtime.</p>
                <div class=\"card-footer\">Explore Forge →</div>
            </a>
        </div>

        <footer class=\"footer\">
            <span>Laravel v{{ Illuminate\Foundation\Application::VERSION }}</span>
            <span>PHP v{{ PHP_VERSION }}</span>
        </footer>
    </div>
</body>
</html>

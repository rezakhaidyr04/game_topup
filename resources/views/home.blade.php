<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Game TopUp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Rajdhani', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0f0f23 100%);
            background-attachment: fixed;
            color: #e2e8f0;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Colorful Background Pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(30, 58, 138, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(37, 99, 235, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(6, 182, 212, 0.1) 0%, transparent 50%),
                repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(30, 58, 138, 0.03) 2px, rgba(30, 58, 138, 0.03) 4px),
                repeating-linear-gradient(90deg, transparent, transparent 2px, rgba(37, 99, 235, 0.03) 2px, rgba(37, 99, 235, 0.03) 4px);
            z-index: 0;
            pointer-events: none;
            opacity: 0.6;
        }

        /* Gentle Floating Shapes */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(100, 116, 139, 0.3);
            border-radius: 50%;
            animation: gentleFloat 25s infinite ease-in-out;
        }

        @keyframes gentleFloat {
            0%, 100% { transform: translateY(0) translateX(0); opacity: 0; }
            10% { opacity: 0.3; }
            90% { opacity: 0.3; }
            100% { transform: translateY(-100vh) translateX(50px); opacity: 0; }
        }

        /* Elegant Header */
        header {
            background: linear-gradient(135deg, rgba(15, 15, 35, 0.98) 0%, rgba(26, 26, 62, 0.98) 100%);
            border-bottom: 1px solid rgba(37, 99, 235, 0.3);
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 24px rgba(30, 58, 138, 0.2);
            backdrop-filter: blur(20px);
            position: relative;
            z-index: 10;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(37, 99, 235, 0.6), rgba(6, 182, 212, 0.6), transparent);
            opacity: 0.8;
        }

        .logo-header {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            font-weight: 900;
            background: linear-gradient(135deg, #3b82f6, #2563eb, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            transition: all 0.3s ease;
            filter: drop-shadow(0 0 15px rgba(37, 99, 235, 0.3));
        }

        .logo-header:hover {
            background: linear-gradient(135deg, #60a5fa, #3b82f6, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 0 25px rgba(37, 99, 235, 0.5));
        }

        .logo-header i {
            color: #3b82f6;
            transition: all 0.3s ease;
            filter: drop-shadow(0 0 10px rgba(37, 99, 235, 0.5));
        }

        .logo-header:hover i {
            color: #60a5fa;
            transform: rotate(15deg);
            filter: drop-shadow(0 0 15px rgba(37, 99, 235, 0.8));
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-links a::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #06b6d4);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::before {
            width: 100%;
        }

        .nav-links a:hover {
            color: #60a5fa;
        }

        .user-greeting {
            color: #cbd5e1;
            font-size: 1rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.15), rgba(37, 99, 235, 0.15));
            border-radius: 8px;
            border: 1px solid rgba(37, 99, 235, 0.4);
        }

        .btn-logout {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: #fff;
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 1px solid rgba(37, 99, 235, 0.5);
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-color: rgba(59, 130, 246, 0.6);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.5);
        }

        .container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
        }

        .welcome-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.6) 0%, rgba(15, 23, 42, 0.6) 100%);
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(37, 99, 235, 0.4);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(20px);
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #3b82f6, #2563eb, #06b6d4, transparent);
            opacity: 0.8;
        }

        .welcome-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(37, 99, 235, 0.05), transparent);
            transition: left 0.8s ease;
        }

        .welcome-card:hover::after {
            left: 100%;
        }

        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.8rem;
            margin-bottom: 0.8rem;
            background: linear-gradient(135deg, #fff, #60a5fa, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 3px;
            filter: drop-shadow(0 2px 10px rgba(37, 99, 235, 0.3));
        }

        .subtitle {
            color: #94a3b8;
            font-size: 1.2rem;
            margin-bottom: 2rem;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2rem;
            margin-top: 2.5rem;
        }

        .action-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.5) 0%, rgba(15, 23, 42, 0.5) 100%);
            border: 2px solid rgba(37, 99, 235, 0.4);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .action-card:hover::before {
            opacity: 1;
        }

        .action-card:nth-child(1) {
            border-color: rgba(6, 182, 212, 0.5);
        }

        .action-card:nth-child(1):hover {
            border-color: #06b6d4;
            box-shadow: 0 12px 30px rgba(6, 182, 212, 0.4);
        }

        .action-card:nth-child(1)::before {
            background: linear-gradient(90deg, #06b6d4, #22d3ee);
        }

        .action-card:nth-child(2) {
            border-color: rgba(6, 182, 212, 0.5);
        }

        .action-card:nth-child(2):hover {
            border-color: #06b6d4;
            box-shadow: 0 12px 30px rgba(6, 182, 212, 0.4);
        }

        .action-card:nth-child(2)::before {
            background: linear-gradient(90deg, #06b6d4, #22d3ee);
        }

        .action-card:nth-child(3) {
            border-color: rgba(6, 182, 212, 0.5);
        }

        .action-card:nth-child(3):hover {
            border-color: #06b6d4;
            box-shadow: 0 12px 30px rgba(6, 182, 212, 0.4);
        }

        .action-card:nth-child(3)::before {
            background: linear-gradient(90deg, #06b6d4, #22d3ee);
        }

        .action-card:nth-child(4) {
            border-color: rgba(6, 182, 212, 0.5);
        }

        .action-card:nth-child(4):hover {
            border-color: #06b6d4;
            box-shadow: 0 12px 30px rgba(6, 182, 212, 0.4);
        }

        .action-card:nth-child(4)::before {
            background: linear-gradient(90deg, #06b6d4, #22d3ee);
        }

        .action-card:hover {
            transform: translateY(-8px);
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(15, 23, 42, 0.7) 100%);
        }

        .action-card .icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: inline-block;
            transition: all 0.4s ease;
            position: relative;
            z-index: 1;
            color: #06b6d4;
        }

        .action-card:hover .icon {
            transform: scale(1.15) translateY(-5px);
        }

        .action-card h3 {
            color: #e2e8f0;
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            z-index: 1;
        }

        .action-card p {
            color: #94a3b8;
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
            position: relative;
            z-index: 1;
        }

        .action-card a {
            display: inline-block;
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .action-card a:hover {
            color: #e2e8f0;
        }

        .section {
            margin-top: 3rem;
            position: relative;
        }

        .section h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.2rem;
            margin-bottom: 2.5rem;
            background: linear-gradient(135deg, #fff, #60a5fa, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 900;
            display: flex;
            align-items: center;
            gap: 1rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            position: relative;
            padding-bottom: 1rem;
        }

        .section h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 120px;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #2563eb, transparent);
        }

        .section h2 i {
            color: #3b82f6;
            font-size: 2rem;
            animation: iconBounce 2s ease-in-out infinite;
            filter: drop-shadow(0 0 10px rgba(59, 130, 246, 0.5));
        }

        @keyframes iconBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .game-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 2rem;
            margin-bottom: 3rem;
            padding: 1rem 0;
        }

        .game-card {
            background: linear-gradient(145deg, rgba(30, 41, 59, 0.7) 0%, rgba(15, 23, 42, 0.9) 100%);
            border: 2px solid rgba(37, 99, 235, 0.4);
            border-radius: 20px;
            padding: 0;
            text-align: center;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(15px);
        }

        /* Diagonal stripe pattern */
        .game-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(37, 99, 235, 0.03) 10px,
                rgba(37, 99, 235, 0.03) 20px
            );
            opacity: 0;
            transition: opacity 0.5s;
            z-index: 1;
        }

        /* Glowing border effect with blue gradient */
        .game-card::after {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, #3b82f6, #2563eb, #06b6d4, #3b82f6);
            background-size: 200% 200%;
            border-radius: 20px;
            opacity: 0;
            z-index: -1;
            transition: opacity 0.5s;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .game-card:hover::before {
            opacity: 1;
        }

        .game-card:hover::after {
            opacity: 0.6;
        }

        .game-card:hover {
            transform: translateY(-15px) scale(1.03);
            border-color: rgba(59, 130, 246, 0.8);
            box-shadow: 0 20px 50px rgba(37, 99, 235, 0.4),
                        0 0 30px rgba(6, 182, 212, 0.3);
        }

        /* Game card image container */
        .game-card-image {
            width: 100%;
            height: 160px;
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.2), rgba(37, 99, 235, 0.2), rgba(6, 182, 212, 0.2));
            border-radius: 18px 18px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            margin-bottom: 0;
        }

        .game-card-image::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 0%, rgba(15, 23, 42, 0.8) 100%);
            z-index: 1;
            pointer-events: none;
        }

        /* Game image wrapper */
        .game-image-wrapper {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .game-image-wrapper img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.5));
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .game-card:hover .game-image-wrapper img {
            transform: scale(1.1);
            filter: drop-shadow(0 8px 20px rgba(100, 116, 139, 0.6));
        }

        /* Default icon style when no image */
        .game-icon-default {
            font-size: 4.5rem;
            color: #64748b;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.5));
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 2;
        }

        .game-card:hover .game-icon-default {
            transform: scale(1.15);
            color: #94a3b8;
            filter: drop-shadow(0 8px 20px rgba(100, 116, 139, 0.6));
        }

        /* Badge for popular/trending */
        .game-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: #fff;
            padding: 0.35rem 0.9rem;
            border-radius: 20px;
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            z-index: 10;
            border: 1px solid rgba(59, 130, 246, 0.6);
            box-shadow: 0 2px 10px rgba(37, 99, 235, 0.5);
            backdrop-filter: blur(10px);
        }

        .game-card-content {
            padding: 1.2rem 1.5rem 1.5rem;
            position: relative;
            z-index: 2;
        }



        .game-card h4 {
            color: #fff;
            margin-bottom: 0.5rem;
            font-size: 1.15rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.3s ease;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .game-card:hover h4 {
            color: #fff;
            transform: translateX(2px);
        }

        .game-card p {
            color: #94a3b8;
            font-size: 0.85rem;
            margin-bottom: 1rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .game-card:hover p {
            color: #cbd5e1;
        }

        /* Game info bar */
        .game-info {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.75rem;
            color: #64748b;
        }

        .game-info span {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .game-info i {
            font-size: 0.85rem;
        }

        .btn-topup {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: #fff;
            padding: 0.9rem 1.5rem;
            border: 1px solid rgba(59, 130, 246, 0.5);
            border-radius: 10px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 800;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            position: relative;
            overflow: hidden;
            z-index: 1;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-topup::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-topup:hover::before {
            left: 100%;
        }

        .btn-topup::after {
            content: '→';
            margin-left: 0.3rem;
            transition: transform 0.3s ease;
        }

        .btn-topup:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
            border-color: rgba(96, 165, 250, 0.8);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.5),
                        0 0 20px rgba(59, 130, 246, 0.4);
        }

        .btn-topup:hover::after {
            transform: translateX(4px);
        }

        .profile-icon-link {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid rgba(37, 99, 235, 0.5);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
        }

        .profile-icon-link::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.4s, height 0.4s;
        }

        .profile-icon-link:hover::before {
            width: 100%;
            height: 100%;
        }

        .profile-icon-link:hover {
            transform: scale(1.1);
            border-color: rgba(59, 130, 246, 0.8);
            background: linear-gradient(135deg, #60a5fa, #22d3ee);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.6);
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 1.5rem;
            }

            .container {
                padding: 0 1rem;
            }

            h1 {
                font-size: 2rem;
            }

            .game-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 1.5rem;
            }

            .quick-actions {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background Particles -->
    <div class="particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 2.5s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 4.5s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 1.5s;"></div>
    </div>

    <header>
        <div class="logo-header">
            <i class="fas fa-gamepad"></i>
            GameTopup
        </div>
        <div class="nav-links">
            <span class="user-greeting">Halo, {{ auth()->user()->name }}! 👋</span>
            <a href="{{ route('topup.index') }}">Top Up</a>
            <a href="{{ route('profile') }}" class="profile-icon-link" title="Profile Saya">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </header>

    <div class="container">
        <div class="welcome-card">
            <h1>🎮 Selamat Datang! 🎮</h1>
            <p class="subtitle">⚡ Nikmati kemudahan top up game favorit Anda kapan saja ⚡</p>
            
            <div class="quick-actions">
                <div class="action-card">
                    <div class="icon"><i class="fas fa-wallet"></i></div>
                    <h3>Top Up Sekarang</h3>
                    <p>Isi saldo game Anda dengan cepat</p>
                    <a href="{{ route('topup.index') }}">Mulai Topup →</a>
                </div>
                <div class="action-card">
                    <div class="icon"><i class="fas fa-coins"></i></div>
                    <h3>Lihat Saldo</h3>
                    <p>Cek saldo akun Anda</p>
                    <a href="{{ route('saldo.index') }}">Lihat Saldo →</a>
                </div>
                <div class="action-card">
                    <div class="icon"><i class="fas fa-history"></i></div>
                    <h3>Riwayat</h3>
                    <p>Lihat histori pembelian</p>
                    <a href="{{ route('topup.index') }}">Lihat Riwayat →</a>
                </div>
                <div class="action-card">
                    <div class="icon"><i class="fas fa-sliders-h"></i></div>
                    <h3>Pengaturan</h3>
                    <p>Kelola akun Anda</p>
                    <a href="{{ url('/settings') }}">Pengaturan →</a>
                </div>
            </div>
        </div>

        <div class="section">
            <h2><i class="fas fa-fire"></i> Game Populer</h2>
            <div class="game-grid">
                @forelse ($games->take(6) as $game)
                    <div class="game-card">
                        <div class="game-card-image">
                            <span class="game-badge">POPULAR</span>
                            @php
                                $gameImages = [
                                    'Mobile Legends' => 'ml.png',
                                    'PUBG Mobile' => 'PUBG.png',
                                    'Free Fire' => 'FF.png',
                                    'Genshin Impact' => 'GENSHIN.png',
                                    'Call of Duty Mobile' => 'COD.png',
                                    'Arena of Valor' => 'AOV.png',
                                    'Honkai Star Rail' => 'HONKAI.png',
                                    'Valorant' => 'valo.png',
                                ];
                                $imgFile = $gameImages[$game->name] ?? null;
                            @endphp
                            
                            @if ($imgFile && file_exists(public_path('images/games/' . $imgFile)))
                                <div class="game-image-wrapper">
                                    <img src="{{ asset('images/games/' . $imgFile) }}" alt="{{ $game->name }}">
                                </div>
                            @else
                                <div class="game-icon-default">{{ $game->icon }}</div>
                            @endif
                        </div>
                        
                        <div class="game-card-content">
                            <h4>{{ $game->name }}</h4>
                            <p>Top Up {{ $game->currency_type }}</p>
                            <div class="game-info">
                                <span><i class="fas fa-bolt"></i> Instan</span>
                                <span><i class="fas fa-shield-alt"></i> Aman</span>
                            </div>
                            <a href="{{ route('topup.show', $game) }}" class="btn-topup">Topup Sekarang</a>
                        </div>
                    </div>
                @empty
                    <p style="color: #94a3b8; grid-column: 1/-1; text-align: center; padding: 3rem;">Belum ada game tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>

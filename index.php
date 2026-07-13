<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Educación Financiera - Gabriela</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #051409; /* Глубокий темно-зеленый/черный фон */
            background-image: 
                radial-gradient(circle at 50% 0%, rgba(20, 80, 30, 0.4) 0%, transparent 70%),
                radial-gradient(circle at 50% 100%, rgba(10, 40, 15, 0.8) 0%, transparent 70%);
            color: #ffffff;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
        }

        .mobile-container {
            width: 100%;
            max-width: 480px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.8);
            background: rgba(0, 0, 0, 0.4);
            overflow-x: hidden;
        }

        .captcha-screen {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
            background-color: #051409;
            position: relative;
            z-index: 50;
        }

        .captcha-box {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            width: 100%;
            max-width: 300px;
            transition: transform 0.2s;
        }

        .captcha-box:active { transform: scale(0.98); }

        .checkbox-fake {
            width: 28px;
            height: 28px;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }

        .hero-title {
            font-size: 1.6rem;
            line-height: 1.3;
            font-weight: 800;
            text-align: center;
            color: #ffffff;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .text-gold {
            color: #ffd700;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        }

        .btn-option {
            background: rgba(10, 40, 15, 0.6);
            border: 1px solid rgba(34, 197, 94, 0.4);
            color: #ffffff;
            width: 100%;
            padding: 16px;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.2s;
        }

        .btn-option:hover {
            border-color: #22c55e;
            background: rgba(21, 128, 61, 0.4);
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.2);
        }

        .btn-option:active {
            transform: scale(0.98);
        }

        .btn-telegram {
            background: linear-gradient(135deg, #10b981 0%, #047857 100%);
            color: white;
            width: 100%;
            padding: 18px;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 800;
            text-transform: uppercase;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.4);
            text-decoration: none;
            margin-top: 20px;
            border: 1px solid #34d399;
            animation: pulse-green 2s infinite;
        }

        @keyframes pulse-green {
            0% { transform: scale(1); box-shadow: 0 0 20px rgba(16, 185, 129, 0.4); }
            50% { transform: scale(1.02); box-shadow: 0 0 30px rgba(16, 185, 129, 0.7); }
            100% { transform: scale(1); box-shadow: 0 0 20px rgba(16, 185, 129, 0.4); }
        }

        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #3498db;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
            display: none;
        }

        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        .hidden { display: none !important; }
    </style>
</head>
<body>

<div class="mobile-container">
    
    <div id="captchaScreen" class="captcha-screen">
        <svg class="w-16 h-16 text-green-500 mb-6 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
        <h2 class="text-xl font-bold text-gray-200 mb-8 text-center">Verificación de Acceso</h2>
        
        <div class="captcha-box" onclick="verifyCaptcha()">
            <div class="checkbox-fake" id="captchaCheck">
                <div class="spinner" id="captchaSpinner"></div>
                <svg id="captchaCheckmark" class="w-6 h-6 text-green-500 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <span class="text-gray-700 font-bold text-sm">No soy un robot</span>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/RecaptchaLogo.svg/1200px-RecaptchaLogo.svg.png" 
                 alt="reCaptcha" class="w-7 h-7 ml-auto opacity-60">
        </div>
        <p class="text-xs text-gray-500 mt-6 text-center max-w-xs">Verificación necesaria para proteger el acceso a la comunidad VIP.</p>
    </div>

    <div id="mainContent" class="hidden flex-1 flex flex-col p-4 relative z-10">
        
        <!-- Header -->
        <div class="text-center mb-4 mt-2">
            <span class="inline-block bg-green-900/50 border border-green-500/30 text-green-400 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                Comunidad Oficial • Bolivia
            </span>
        </div>

        <!-- Hero Image (Твоя картинка) -->
        <div class="mb-5">
            <img src="photo_2026-06-10_05-18-24.jpg" 
                 onerror="this.src='https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'" 
                 alt="Gabriela Linares" 
                 class="w-full rounded-2xl shadow-[0_0_20px_rgba(34,197,94,0.3)] border border-green-500/20 object-cover">
        </div>

        <h1 class="hero-title">
            El método para generar <span class="text-gold">ingresos extra</span> desde tu celular
        </h1>

        <!-- Story / Intro -->
        <div class="glass-panel mb-6">
            <p class="mb-3 text-gray-200">Hola, soy Gabriela 👋</p>
            <p class="mb-3 text-gray-300 text-sm leading-relaxed">
                Si estás aquí, es porque buscas una forma real de mejorar tu economía. <b>Mi asesoría es 100% gratuita.</b> Mi meta es expandir el equipo de inversores en el país.
            </p>
            <p class="text-green-400 font-semibold text-sm">
                * Solo necesitas internet y capital para fondear tu propia cuenta. Si tú ganas, ganamos todos.
            </p>
        </div>

        <div id="quizSection" class="mt-auto">
            <h3 class="text-center font-bold text-white mb-2 uppercase tracking-wide text-sm">Paso 1: Selección de Perfil</h3>
            <p class="text-center text-xs text-gray-400 mb-4">
                ¿Con qué capital puedes iniciar en TU cuenta hoy?
            </p>

            <button onclick="showResult('VIP Plus')" class="btn-option group">
                <div class="flex flex-col text-left">
                    <span class="text-white font-bold group-hover:text-green-400 transition-colors">Nivel VIP</span>
                    <span class="text-xs text-gray-400">Acceso prioritario</span>
                </div>
                <span class="text-gold font-bold">> Bs. 10,000</span>
            </button>
            
            <button onclick="showResult('Intermedio')" class="btn-option group">
                <div class="flex flex-col text-left">
                    <span class="text-white font-bold group-hover:text-green-400 transition-colors">Nivel Intermedio</span>
                    <span class="text-xs text-gray-400">Recomendado</span>
                </div>
                <span class="text-gold font-bold">Bs. 1,000 - 9,999</span>
            </button>
            
            <button onclick="showResult('Principiante')" class="btn-option group">
                <div class="flex flex-col text-left">
                    <span class="text-white font-bold group-hover:text-green-400 transition-colors">Nivel Principiante</span>
                    <span class="text-xs text-gray-400">Para iniciar</span>
                </div>
                <span class="text-gold font-bold">Bs. 100 - 999</span>
            </button>
        </div>

        <div id="resultSection" class="glass-panel hidden mt-auto">
            <div class="bg-green-500/20 border border-green-500/50 p-4 rounded-xl mb-4 text-center">
                <svg class="w-10 h-10 text-green-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="font-bold text-green-400 text-xl tracking-wide uppercase">¡Perfil Aprobado!</h3>
                <p class="text-sm text-gray-300 mt-1">Cumples con los requisitos para iniciar hoy.</p>
            </div>

            <p class="text-sm text-center mb-4 text-gray-200">
                Paso 2: Únete a mi canal privado y escríbeme para recibir las instrucciones paso a paso.
            </p>

            <a href="https://t.me/ТУТ_ССЫЛКА_НА_КАНАЛ" class="btn-telegram">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196 1.006.128.832.94z"/>
                </svg>
                ACCEDER AL CANAL VIP
            </a>
            <p class="text-center text-yellow-500/80 text-xs mt-4 font-semibold animate-pulse">⚡ Quedan solo 3 cupos disponibles hoy</p>
        </div>

    </div>
</div>

<script>
    function verifyCaptcha() {
        const spinner = document.getElementById('captchaSpinner');
        const checkmark = document.getElementById('captchaCheckmark');
        
        spinner.style.display = 'block';
        
        setTimeout(() => {
            spinner.style.display = 'none';
            checkmark.classList.remove('hidden');
            
            setTimeout(() => {
                document.getElementById('captchaScreen').style.opacity = '0';
                document.getElementById('captchaScreen').style.transition = 'opacity 0.5s ease';
                
                setTimeout(() => {
                    document.getElementById('captchaScreen').classList.add('hidden');
                    document.getElementById('mainContent').classList.remove('hidden');
                    // Добавляем плавное появление основного контента
                    document.getElementById('mainContent').style.animation = 'fadeIn 0.8s ease forwards';
                    window.scrollTo(0, 0);
                }, 500);
            }, 600);
            
        }, 1200);
    }

    function showResult(level) {
        document.getElementById('quizSection').style.display = 'none';
        const resultSection = document.getElementById('resultSection');
        resultSection.classList.remove('hidden');
        resultSection.style.animation = 'fadeIn 0.5s ease forwards';
        resultSection.scrollIntoView({ behavior: 'smooth', block: 'end' });
    }

    // Добавляем стили анимации динамически
    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
</script>

</body>
</html>

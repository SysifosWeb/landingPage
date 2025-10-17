
<!DOCTYPE html>
<html class="dark" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>SysifosWeb - Sinapsys</title>
  <meta name="description" content="Especialistas en desarrollo de software, aplicaciones web y soluciones digitales en Chile. Laravel, Vue.js, React y más. Cotiza tu proyecto gratis.">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="canonical" href="https://sysifosweb.cl/sinapsys">
  <meta property="og:title" content="SysifosWeb | Sinapsys">
  <meta property="og:description" content="Especialistas en desarrollo de software, aplicaciones web y soluciones digitales en Chile. Laravel, Vue.js, React y más. Cotiza tu proyecto gratis.">
  <meta property="og:image" content="https://sysifosweb.cl/storage/logos/logo-simple-min.jpg">
  <meta property="og:image:width" content="600">
  <meta property="og:image:height" content="600">
  <meta property="og:url" content="https://sysifosweb.cl/sinapsys">
  <meta property="og:type" content="website">
  <meta name="fb:app_id" content="1215450019494398">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="SysifosWeb - Sinapsys">
  <meta name="twitter:description" content="Especialistas en desarrollo de software, aplicaciones web y soluciones digitales en Chile. Laravel, Vue.js, React y más. Cotiza tu proyecto gratis.">
  <meta name="twitter:image" content="https://sysifosweb.cl/storage/logos/logo-simple-min.png">

<link href="{{asset('storage/logos/logo-simple-min.png')}}" rel="icon" type="image/x-icon"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&amp;display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
<script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            primary: {
              DEFAULT: "#4F46E5",
              light: "#6366F1",
              dark: "#4338CA"
            },
            secondary: "#EC4899",
            'background-light': '#F9FAFB',
            'background-dark': '#111827',
            'card-light': '#FFFFFF',
            'card-dark': '#1F2937',
            'text-light': '#1F2937',
            'text-dark': '#F9FAFB',
            'text-muted-light': '#6B7280',
            'text-muted-dark': '#9CA3AF'
          },
          fontFamily: {
            display: "Inter, sans-serif",
          },
          borderRadius: {
            DEFAULT: "0.5rem",
            lg: "0.75rem",
            xl: "1rem",
            full: "9999px",
          },
          boxShadow: {
            'glow': '0 0 20px 5px rgba(79, 70, 229, 0.5), 0 0 10px 2px rgba(236, 72, 153, 0.5)',
          },
          keyframes: {
            'aurora': {
              '0%': { backgroundPosition: '0% 50%' },
              '50%': { backgroundPosition: '100% 50%' },
              '100%': { backgroundPosition: '0% 50%' },
            },
            'float': {
                '0%, 100%': { transform: 'translateY(0px)' },
                '50%': { transform: 'translateY(-10px)' },
            }
          },
          animation: {
            'aurora': 'aurora 20s ease infinite',
            'float': 'float 6s ease-in-out infinite',
          }
        },
      },
    };
  </script>
<style type="text/tailwindcss">
    body {
      background-color: #F9FAFB;
    }
    .dark body {
      background: #111827;
    }
    .aurora-background {
       background: linear-gradient(-45deg, #4F46E5, #EC4899, #10B981, #3B82F6);
       background-size: 400% 400%;
    }
    .link-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
    .link-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    .dark .link-card:hover {
         box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.2), 0 4px 6px -2px rgba(236, 72, 153, 0.1);
    }
  </style>
</head>
  <body class="font-display bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark selection:bg-primary/30">
    <div class="relative min-h-screen w-full flex items-center justify-center p-4 overflow-hidden">
      <div class="absolute inset-0 w-full h-full aurora-background animate-aurora opacity-10 dark:opacity-20 blur-3xl"></div>
      <div class="relative z-10 w-full max-w-2xl mx-auto">
        <div class="flex flex-col items-center gap-6 text-center">
          <div class="relative w-40 h-40 animate-float">
            <div class="absolute inset-0 rounded-full bg-cover bg-center shadow-lg" style='background-image: url("{{asset('storage/logos/logo-simple-min.png')}}");'></div>
            <div class="absolute inset-0 rounded-full ring-4 ring-primary/50 ring-offset-4 ring-offset-background-dark animate-pulse"></div>
          </div>
          <div class="flex flex-col items-center">
            <h1 class="text-4xl md:text-5xl font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary tracking-tight">SysifosWeb</h1>
            <p class="text-xl text-text-muted-light dark:text-text-muted-dark mt-2">Innovación y Desarrollo de Software a Medida</p>
          </div>
        </div>
        <div class="mt-8 bg-card-light dark:bg-card-dark p-8 rounded-xl shadow-md text-center">
          <h2 class="text-2xl font-bold text-text-light dark:text-text-dark">Nuestra Misión</h2>
          <p class="text-text-muted-light dark:text-text-muted-dark mt-4">En SysifosWeb, nuestra misión es convertir las ideas de nuestros clientes en soluciones digitales a medida, innovadoras y escalables. Nos dedicamos a potenciar el éxito de cada proyecto mediante la tecnología, la creatividad y un compromiso absoluto con la calidad y la satisfacción del cliente.</p>
          <a 
            class="mt-6 inline-flex items-center gap-1 bg-primary hover:bg-primary-light text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 shadow-lg hover:shadow-primary/50 transform hover:scale-105"
            href="https://wa.me/56949109970?text=¡Hola!%20Quiero%20más%20información%20sobre%20sus%20servicios"
            target="_blank"
          >
            <span>Contacta con nosotros</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-7 h-7 fill-white">
                <path d="M476.9 161.1C435 119.1 379.2 96 319.9 96C197.5 96 97.9 195.6 97.9 318C97.9 357.1 108.1 395.3 127.5 429L96 544L213.7 513.1C246.1 530.8 282.6 540.1 319.8 540.1L319.9 540.1C442.2 540.1 544 440.5 544 318.1C544 258.8 518.8 203.1 476.9 161.1zM319.9 502.7C286.7 502.7 254.2 493.8 225.9 477L219.2 473L149.4 491.3L168 423.2L163.6 416.2C145.1 386.8 135.4 352.9 135.4 318C135.4 216.3 218.2 133.5 320 133.5C369.3 133.5 415.6 152.7 450.4 187.6C485.2 222.5 506.6 268.8 506.5 318.1C506.5 419.9 421.6 502.7 319.9 502.7zM421.1 364.5C415.6 361.7 388.3 348.3 383.2 346.5C378.1 344.6 374.4 343.7 370.7 349.3C367 354.9 356.4 367.3 353.1 371.1C349.9 374.8 346.6 375.3 341.1 372.5C308.5 356.2 287.1 343.4 265.6 306.5C259.9 296.7 271.3 297.4 281.9 276.2C283.7 272.5 282.8 269.3 281.4 266.5C280 263.7 268.9 236.4 264.3 225.3C259.8 214.5 255.2 216 251.8 215.8C248.6 215.6 244.9 215.6 241.2 215.6C237.5 215.6 231.5 217 226.4 222.5C221.3 228.1 207 241.5 207 268.8C207 296.1 226.9 322.5 229.6 326.2C232.4 329.9 268.7 385.9 324.4 410C359.6 425.2 373.4 426.5 391 423.9C401.7 422.3 423.8 410.5 428.4 397.5C433 384.5 433 373.4 431.6 371.1C430.3 368.6 426.6 367.2 421.1 364.5z"/>
              </svg>
          </a>
        </div>
       <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 py-10">
  <!-- Página Web -->
  <a class="link-card group flex items-center justify-between p-6 bg-card-light dark:bg-card-dark rounded-xl shadow-md" 
     href="https://sysifosweb.cl/" target="_blank">
    <div class="flex items-center gap-4">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </div>
      <div>
        <p class="font-bold text-lg text-text-light dark:text-text-dark">Página Web</p>
        <p class="text-sm text-text-muted-light dark:text-text-muted-dark">Visita nuestro sitio principal.</p>
      </div>
    </div>
    <svg class="w-6 h-6 text-text-muted-light dark:text-text-muted-dark opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform group-hover:translate-x-1" fill="currentColor" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
      <path d="M181.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L164.69,128,98.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,181.66,133.66Z"></path>
    </svg>
  </a>

  <!-- Portafolio -->
  <a class="link-card group flex items-center justify-between p-6 bg-card-light dark:bg-card-dark rounded-xl shadow-md" 
     href="https://sysifosweb.cl/portfolio" target="_blank">
    <div class="flex items-center gap-4">
      <div class="p-3 bg-green-500/10 rounded-full text-green-500">
        <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M6 7V6a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1h3a1 1 0 0 1 1 1v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a1 1 0 0 1 1-1h3zm2-1v1h8V6H8zm-3 3v10h14V9H5z"/>
        </svg>
      </div>
      <div>
        <p class="font-bold text-lg text-text-light dark:text-text-dark">Portafolio</p>
        <p class="text-sm text-text-muted-light dark:text-text-muted-dark">Mira nuestros proyectos destacados.</p>
      </div>
    </div>

    <svg class="w-6 h-6 text-text-muted-light dark:text-text-muted-dark opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform group-hover:translate-x-1" fill="currentColor" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
      <path d="M181.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L164.69,128,98.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,181.66,133.66Z"></path>
    </svg>
  </a>

  <!-- Instagram -->
  <a class="link-card group flex items-center justify-between p-6 bg-card-light dark:bg-card-dark rounded-xl shadow-md" 
     href="https://www.instagram.com/sysifosweb_/" target="_blank">
    <div class="flex items-center gap-4">
      <div class="p-3 bg-secondary/10 rounded-full text-secondary">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
          <path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24ZM216,176a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z"></path>
        </svg>
      </div>
      <div>
        <p class="font-bold text-lg text-text-light dark:text-text-dark">Instagram</p>
        <p class="text-sm text-text-muted-light dark:text-text-muted-dark">Síguenos para ver más.</p>
      </div>
    </div>
    <svg class="w-6 h-6 text-text-muted-light dark:text-text-muted-dark opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform group-hover:translate-x-1" fill="currentColor" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
      <path d="M181.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L164.69,128,98.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,181.66,133.66Z"></path>
    </svg>
  </a>

  <!-- LinkedIn -->
  <a class="link-card group flex items-center justify-between p-6 bg-card-light dark:bg-card-dark rounded-xl shadow-md" 
     href="https://www.linkedin.com/company/sysifos-web" target="_blank">
    <div class="flex items-center gap-4">
      <div class="p-3 bg-blue-500/10 rounded-full text-blue-500">
      <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 640 640" xmlns="http://www.w3.org/2000/svg">
        <path d="M512 96L127.9 96C110.3 96 96 110.5 96 128.3L96 511.7C96 529.5 110.3 544 127.9 544L512 544C529.6 544 544 529.5 544 511.7L544 128.3C544 110.5 529.6 96 512 96zM231.4 480L165 480L165 266.2L231.5 266.2L231.5 480L231.4 480zM198.2 160C219.5 160 236.7 177.2 236.7 198.5C236.7 219.8 219.5 237 198.2 237C176.9 237 159.7 219.8 159.7 198.5C159.7 177.2 176.9 160 198.2 160zM480.3 480L413.9 480L413.9 376C413.9 351.2 413.4 319.3 379.4 319.3C344.8 319.3 339.5 346.3 339.5 374.2L339.5 480L273.1 480L273.1 266.2L336.8 266.2L336.8 295.4L337.7 295.4C346.6 278.6 368.3 260.9 400.6 260.9C467.8 260.9 480.3 305.2 480.3 362.8L480.3 480z"/>
      </svg>
      </div>
      <div>
        <p class="font-bold text-lg text-text-light dark:text-text-dark">LinkedIn</p>
        <p class="text-sm text-text-muted-light dark:text-text-muted-dark">Conectemos.</p>
      </div>
    </div>
    <svg class="w-6 h-6 text-text-muted-light dark:text-text-muted-dark opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform group-hover:translate-x-1" fill="currentColor" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
      <path d="M181.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L164.69,128,98.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,181.66,133.66Z"></path>
    </svg>

  </a>
</div>

      </div>
    </div>

  </body>
</html>
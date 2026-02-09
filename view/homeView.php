<?php
    $pageId = 'home';
    require_once HEADER;
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Lato:wght@300;400;700&display=swap');

    :root {
        --flambeau-gold: #c5a059; 
        --flambeau-dark: #1a1a1a;       
        --flambeau-light: #f8f5f2;   
        --card-bg: #ffffff;          
        --shadow: 0 10px 30px rgba(0,0,0,0.08); 
    }

    body {
        font-family: 'Lato', sans-serif;
        color: var(--flambeau-dark);
        background-color: var(--flambeau-light); 
    }

    a.card-link {
        text-decoration: none; 
        color: inherit;        
        display: block;     
        height: 100%;
    }


    .hero-content {
        position: relative;
        z-index: 2; /* Encima del overlay */
        text-align: center;
    }

    h1.brand-title {
        font-family: 'Playfair Display', serif;
        font-size: 5rem;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3); /* Sombra al texto */
    }

    p.brand-subtitle {
        font-size: 1.5rem;
        font-weight: 300;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 2.5rem;
        opacity: 0.9;
    }

    .btn-flambeau {
        background-color: transparent;
        color: #fff;
        padding: 14px 40px;
        border-radius: 0; /* Botones cuadrados son más minimalistas */
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 3px;
        transition: all 0.3s ease;
        border: 2px solid #fff;
        text-decoration: none;
        display: inline-block;
    }

    .btn-flambeau:hover {
        background-color: #fff;
        color: #000;
        text-decoration: none;
    }

    /* --- SECCIÓN HISTORIA --- */
    .story-section h3 {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        font-size: 3rem;
        color: var(--flambeau-gold);
        margin-bottom: 1.5rem;
    }
    
    .story-text {
        font-size: 1.15rem;
        line-height: 1.9;
        max-width: 750px;
        margin: 0 auto;
        color: #555;
    }

    /* --- TARJETAS --- */
    .feature-card {
        background-color: var(--card-bg);
        padding: 3rem 2rem;
        transition: all 0.4s ease;
        border-radius: 4px; /* Bordes sutiles */
        height: 100%;
        border: 1px solid rgba(0,0,0,0.03);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow);
    }

    .icon-box {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        color: var(--flambeau-gold);
        height: 60px;
        width: 60px;
        line-height: 60px;
        border-radius: 50%;
        background-color: #fcfbf9; /* Círculo suave detrás del icono */
        margin-left: auto;
        margin-right: auto;
        transition: all 0.3s ease;
    }

    .feature-card:hover .icon-box {
        background-color: var(--flambeau-gold);
        color: white;
    }

    .feature-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: var(--flambeau-dark);
    }

    .feature-text {
        font-size: 0.95rem;
        color: #666;
    }
</style>

<div class="container-fluid p-0">
    <div class="hero-section">
        <div class="hero-overlay"></div> <div class="hero-content">
            <h1 class="brand-title">Le Flambeau</h1>
            <p class="brand-subtitle">Aromas que cuentan historias</p>
            <a href="index.php?c=vela&f=index" class="btn-flambeau">Descubrir Colección</a>
        </div>
    </div>
</div>

<div class="container mb-5">
    
    <div class="mt-5 mb-5 text-center story-section">
        <h3>Nuestra Esencia</h3>
        <p class="story-text">
            Creemos en el poder de la luz tenue. Cada vela de <strong>Le Flambeau</strong> 
            es vertida a mano utilizando ingredientes botánicos y cera de soja sostenible. 
            No vendemos solo un producto, diseñamos el ambiente donde suceden tus mejores recuerdos.
        </p>
    </div>

    <div class="row text-center mt-5 pb-5">
        <div class="col-md-4 mb-4">
            <div class="feature-card">
                <div class="icon-box">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h4 class="feature-title">Nuestro Atelier</h4>
                <p class="feature-text">Un espacio sensorial diseñado para que experimentes cada fragancia antes de elegirla.</p>
            </div>
        </div>

      <div class="col-md-4 mb-4">
            <a href="https://wa.me/593999999999?text=Hola%20Le%20Flambeau,%20quisiera%20asesoría%20sobre%20sus%20velas." 
               target="_blank" 
               class="card-link">
               
                <div class="feature-card">
                    <div class="icon-box">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h4 class="feature-title">Venta Asistida</h4>
                    <p class="feature-text">¿Buscas un regalo? Haz clic aquí para chatear con nosotros y encontrar el aroma perfecto.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <div class="feature-card">
                <div class="icon-box">
                    <i class="fab fa-instagram"></i>
                </div>
                <h4 class="feature-title">Inspiración Diaria</h4>
                <p class="feature-text">Únete a nuestra comunidad. Tips de decoración, cuidado de velas y estilo de vida.</p>
            </div>
        </div>
    </div>
</div>

<?php require_once FOOTER; ?>
<!DOCTYPE html>
<html lang="es">

<?php
    $pageId = $pageId ?? null;
    $c = strtolower((string)($_GET['c'] ?? ''));
    $f = strtolower((string)($_GET['f'] ?? ''));
    $p = (string)($_GET['p'] ?? '');

    // Base path real según la URL actual (sirve tanto en XAMPP /MVC-PHP como en Docker /)
    $scriptName = (string)($_SERVER['SCRIPT_NAME'] ?? '');
    $basePath = str_replace('\\', '/', dirname($scriptName));
    $basePath = $basePath === '.' ? '' : rtrim($basePath, '/');

    // Rutas de assets (sin depender de BASE_URL, que suele variar entre entornos)
    $homePhotoPath = $basePath . '/assets/images/background/scented-burning-candle-with-cinnamon-and-anise-photo.jpg';
    $animatedBgPath = $basePath . '/assets/images/background/arromanticabackground.gif';

    $isHome = $pageId === 'home'
        || (($c === '' || $c === 'index') && ($f === '' || $f === 'index') && $p === '');

    // Home usa foto; el resto (catálogo/categorías/velas) usa GIF animado.
    $showGif = !$isHome && ($p === 'catalogo' || in_array($c, ['categoria', 'vela', 'index'], true));

    $bodyClassParts = [];
    if ($isHome) {
        $bodyClassParts[] = 'site-photo';
        $bodyClassParts[] = 'page-home';
    } elseif ($showGif) {
        $bodyClassParts[] = 'site-gif';
    }
    $bodyClass = trim(implode(' ', $bodyClassParts));

    // Fallback inline por si el CSS no carga o hay problemas de ruta.
    $bgPath = $isHome ? $homePhotoPath : $animatedBgPath;
    $bgGradient = $isHome
        ? 'linear-gradient(180deg, rgba(18, 18, 20, 0.62), rgba(18, 18, 20, 0.35))'
        : 'linear-gradient(180deg, rgba(8, 8, 10, 0.78), rgba(8, 8, 10, 0.62))';

    $bodyStyle = ($isHome || $showGif)
        ? "background-image: {$bgGradient}, url('" . htmlspecialchars($bgPath, ENT_QUOTES, 'UTF-8') . "');"
            . 'background-size: cover;'
            . 'background-position: center;'
            . 'background-repeat: no-repeat;'
            . 'background-attachment: fixed;'
        : '';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo htmlspecialchars($basePath, ENT_QUOTES, 'UTF-8'); ?>/assets/css/bootstrap.min.css"
        rel="stylesheet">
    <link href="<?php echo htmlspecialchars($basePath, ENT_QUOTES, 'UTF-8'); ?>/assets/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
    <title>Candles_Le Flambeau</title>
</head>

<body class="<?php echo htmlspecialchars($bodyClass, ENT_QUOTES, 'UTF-8'); ?>" style="<?php echo $bodyStyle; ?>">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="<?php echo htmlspecialchars($basePath, ENT_QUOTES, 'UTF-8'); ?>/index.php">
            <i class="fas fa-fire"></i> Candles_Le Flambeau
        </a>

        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link"
                    href="<?php echo htmlspecialchars($basePath, ENT_QUOTES, 'UTF-8'); ?>/index.php?c=index&f=index&p=catalogo">Catálogo</a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link"
                    href="<?php echo htmlspecialchars($basePath, ENT_QUOTES, 'UTF-8'); ?>/index.php?c=Categoria&f=index">Categorias</a>
            </li>
            <li class="nav-item"><a class="nav-link"
                    href="<?php echo htmlspecialchars($basePath, ENT_QUOTES, 'UTF-8'); ?>/index.php?c=Vela&f=index">Velas</a>
            </li>
        </ul>
    </nav>

    <main class="container" style="padding-top: 90px;">
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Nexum</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/logo.svg" class="d-inline-block align-top" width="30" height="30">
                Nexum
            </a>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Regolamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contatti</a>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <button type="button" class="btn btn-outline-light mx-1">Login</button>
                    <button type="button" class="btn btn-light mx-1">Registrati</button>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container col-8 px-4 py-5">
        <div class="row flex-row align-items-center g-5 py-5">
            <div class="col-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Benvenuto su Nexum!</h1>
                <p class="lead">Nexum è un servizio di microblogging che ti permette di creare un blog personale su un
                    tema a tua scelta e condividerlo con i tuoi amici</p>
                <div class="d-grid gap-2 d-flex justify-content-start">
                    <button type="button" class="btn btn-outline-dark btn-lg px-4 me-2">Login</button>
                    <button type="button" class="btn btn-dark btn-lg px-4">Registrati</button>
                </div>
            </div>
            <div class="col-6">
                <img src="assets/bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                    loading="lazy" width="700" height="500">
            </div>
        </div>
    </div>

    <div class="container px-4 py-5" id="features">
        <h2 class="pb-2 border-bottom">Features</h2>
        <div class="row g-4 py-5 row-cols-3">
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#collection"></use>
                    </svg>
                </div>
                <h3 class="fs-2">Blog</h3>
                <p>Ogni utente può creare e gestire uno o più blog su un tema a sua scelta.</p>
            </div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                </div>
                <h3 class="fs-2">Amici</h3>
                <p>Puoi deciderti di renderti visibile a tutti o solo al gruppo dei tuoi a amici, inoltre puoi anche
                    decidere chi può accedere ai tuoi blog.</p>
            </div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#toggles2"></use>
                    </svg>
                </div>
                <h3 class="fs-2">Messaggi</h3>
                <p>Comunicazioni importanti come la pubblicazione di un nuovo post o richieste di amicia ti vengono
                    segnalate attraverso un sistema di messaggistica</p>
            </div>
        </div>
    </div>

    <div class="container px-4 py-5" id="features">
        <h2 class="pb-2 border-bottom">Linee guida della comunità</h2>
        <ul>
            <li>Regola ajasojdasojdoasjsoas</li>
            <li>Regola ajasojdasojdoasjsoas</li>
            <li>Regola ajasojdasojdoasjsoas</li>
            <li>Regola ajasojdasojdoasjsoas</li>
            <li>Regola ajasojdasojdoasjsoas</li>
        </ul>
    </div>

    <footer class="text-center text-lg-start bg-dark text-muted">
        <section class="pt-3">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Nexum S.r.l
                        </h6>
                        <p>
                            Nexum S.r.l è la società che gestisce e finanzia la piattaforma Nexum.
                        </p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Home</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Features</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Regolamento</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Contatti</a>
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contatti</h6>
                        <p>Via Brecce Bianche 12, Ancona, Italia</p>
                        <p>nexum@gian.im</p>
                        <p>+39 3271234567</p>
                        <p>+39 0882123456</p>
                    </div>
                </div>
        </section>

        <div class="text-center p-4">
            © 2022 Copyright: Nexum S.r.l
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

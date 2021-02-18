<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Rudi Usman</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= $navbar1 ?>" id="home" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $navbar2 ?>" id="about" onclick="myFunction()"
                            href="/pages/About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $navbar3; ?>" id="contact" href="/pages/Contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $navbar4; ?>" id="komik" href="/komik">Komik</a>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</nav>
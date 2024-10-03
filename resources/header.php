<header>
    <nav id="navbarHeader" class="navbar navbar-expand-lg bg-light fixed-top shadow" data-bs-theme="light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./assets/img/logo.png" alt="logo" height="50px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarHeaderColapse" aria-controls="navBarHeaderColapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navBarHeaderColapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php if(date('Y-m-d') == date($_SESSION[NOME_SESSAO]['dataevento'])){ ?>
                    <li class="nav-item align-self-center">
                        <a class="nav-link text-uppercase px-3 baloo btn-principal rounded-3" href="./?page=login">AO VIVO</a>
                    </li>
                    <?php } ?>
                    <li class="nav-item align-self-center">
                        <a class="nav-link text-uppercase baloo" href="./?page=home" >home</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link text-uppercase baloo" href="./?page=subscribe">Cadastro</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link text-uppercase baloo" target="_blank" href="<?= $officialSite ?>" >Site oficial</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link text-uppercase baloo" href="./?page=suporte">Suporte</a>
                    </li>
                    <li class="nav-item align-self-center d-none">
                        <a class="nav-link text-uppercase baloo" href="./?page=logout" id="navLogout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
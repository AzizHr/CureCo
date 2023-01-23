<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT ?>"><b>CureCo</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if (!isset($_SESSION['admin_id'])): ?>
            <?php endif ?>
            <?php if (isset($_SESSION['admin_id'])) : ?>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                naaaani
            </ul>
                <ul class="navbar-nav mx-auto d-flex gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href=""><?php echo $_SESSION['admin_name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark" href="<?php echo URLROOT ?>admins/logout">Logout</a>
                    </li>
                </ul>
            <?php endif ?>
        </div>
    </div>
</nav>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <form action="" method="post">
                    <div class="input-group">
                        <!-- <span class="input-group-text text-body" name="cari"><i class="fas fa-search" aria-hidden="true"></i></span> -->
                        <input type="text" class="form-control" name="cari" placeholder="Cari Hotel...">
                        <button class="btn-light" style="border-radius: 0 7px 7px 0;"><i class="fas fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                        <!-- <div class="dropdown mb-3">
                            <a href="" class="nav-link dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                            </a>
                            <span class="d-sm-inline d-none">
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-address-card"></i> About
                                        </a>
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="fas fa-sign-out-alt"></i> LogOut
                                        </a>
                                    </li>
                                </ul>
                        </div> -->
                        <i class="fa fa-user me-sm-1"></i>
                        <?php
                        echo $_SESSION['username'];
                        ?>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
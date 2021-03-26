<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HGC Dashboard</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" /> 
    <!-- Custom CSS -->
    <link  href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"  rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" />
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">HGC Dashboard</a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>/apps">Apps</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>/posts">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>/categories">Categories</a>
                    </li>
                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Left links -->

                <!-- Search form -->
                <form class="d-flex input-group w-auto">
                    <?php if($this->session->userdata('logged_in')) : ?>
                    <a href="<?php echo base_url(); ?>posts/create">
                        <button class="btn btn-outline-light" type="button">
                            Create Post
                        </button>
                    </a>
                    <a href="<?php echo base_url(); ?>categories/create">
                        <button class="btn btn-outline-light" type="button">
                            Create Category
                        </button>
                    </a>
                    <a href="<?php echo base_url(); ?>users/logout">
                        <button class="btn btn-outline-light" type="button">
                            Logout
                        </button>
                    </a>
                    <?php endif; ?>
                    <?php if(!$this->session->userdata('logged_in')) : ?>
                    <a href="<?php echo base_url(); ?>users/register">
                        <button class="btn btn-outline-light" type="button">
                            Register
                        </button>
                    </a>
                    <a href="<?php echo base_url(); ?>users/login">
                        <button class="btn btn-outline-light" type="button">
                            Login
                        </button>
                    </a>
                    <?php endif; ?>
                </form>
                </form>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
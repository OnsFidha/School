<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" /> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
  </head>

  <body>
      <script> 
        <?php if($this->session->flashdata('erreur')) { ?>
        var msg=<?php echo json_encode($this->session->flashdata('erreur'))  ?>;
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: msg,
            })
        <?php } ?>
        <?php if($this->session->flashdata('status')) { ?>
        var msg=<?php echo json_encode($this->session->flashdata('status'))  ?>;
            Swal.fire(msg)
        <?php } ?>
    </script>
     
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
    
        <!-- Menu 11 -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo"> 
            <a href="<?php echo base_url('admin') ?>" class="app-brand-link">
             
              <span class="app-brand-logo demo ">
                <img src="..\..\assets\img\icons\logo\logo1.png" style="width:130px; height: 80px;margin-left:35px ;">
          </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
                <li class="menu-item ">
                  <a href="index.html" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">éléves</div>
                  </a>
                </li>
            <!-- Layouts -->
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">parents</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('listeEnseignants') ?>" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">enseignants</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('listeComptes') ?>" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">comptes</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-container.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Container">demandes</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-fluid.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Fluid">classes</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('listeMatieres') ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Blank">matiéres</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Blank">clubs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Blank">emplois</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Blank">bulletins des notes</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Blank">menu cantine</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Blank">caisses</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Blank">réclamations</div>
                  </a>
                </li>
          </ul>
        </aside>
        <!-- / Menu -->
      
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"> <?=   $this->session->userdata('auth_user')['nom'];      $this->session->userdata('auth_user')['prenom'];?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?php echo base_url('modifier') ?>">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">modifier mon profil</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?php echo base_url('adminPageContr/logout')?>">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">déconnecter</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item" style='margin-right: 15px;margin-left: 15px;'>    <?=   $this->session->userdata('auth_user')['role']; ?>   </li>
                     <!-- log out -->
                  <li>   <a href="<?= base_url('logout')?>"> <i class="bx bx-log-out" ></i></a>
                  </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
          <head>
            <style>
              body {
                background-image: url("../../assets/img/backgrounds/bg2.png");
                background-repeat: no-repeat;
                background-size: cover;
              }
            </style>
          </head>

          <!-- / Navbar 11-->


 
 




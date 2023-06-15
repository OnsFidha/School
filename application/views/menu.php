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
    
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  </head>

  <body><!-- alert-->
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
                <img src="..\..\assets\img\icons\logo\logo.png" style="width:20%;margin-left:35px ;">
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
                  <a href="<?php echo base_url('eleve/liste') ?>" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"  fill="currentColor"><path d="M16 15a1 1 0 0 0-1-1H9c-.551 0-1 .448-1 1v2h8v-2zm-8 4h8v3H8z"></path><path d="M21 12c0-2.967-2.167-5.432-5-5.91V5c0-1.654-1.346-3-3-3h-2C9.346 2 8 3.346 8 5v1.09C5.167 6.568 3 9.033 3 12v8c0 1.103.897 2 2 2h1v-7c0-1.654 1.346-3 3-3h6c1.654 0 3 1.346 3 3v7h1c1.103 0 2-.897 2-2v-8zM10 5c0-.552.449-1 1-1h2a1 1 0 0 1 1 1v1h-4V5z"></path></svg>
                    <div style='padding-left:5px' >  Elèves</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('parent/liste') ?>" class="menu-link ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"  fill="currentColor"><circle cx="6" cy="4" r="2"></circle><path d="M9 7H3a1 1 0 0 0-1 1v7h2v7h4v-7h2V8a1 1 0 0 0-1-1z"></path><circle cx="17" cy="4" r="2"></circle><path d="M20.21 7.73a1 1 0 0 0-1-.73h-4.5a1 1 0 0 0-1 .73L12 14h2l-1 4h2v4h4v-4h2l-1-4h2z"></path></svg>
                    <div style='padding-left:5px'>Parents</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('listeEnseignants') ?>" class="menu-link ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-video3" viewBox="0 0 16 16">
                    <path d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z"/>
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z"/>
                  </svg>
                    <div style='padding-left:5px'>Enseignants</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('listeComptes') ?>" class="menu-link ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                  </svg>
                    <div style='padding-left:5px'>Comptes</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('demande/liste') ?>" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                  </svg>
                    <div style='padding-left:5px'>Demandes</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php  echo base_url('listeClasses')?>" class="menu-link">
                    <svg xmlns="http://www.w3.org/2000/svg"  width="23" height="23" fill="currentColor"  id="Layer_1" data-name="Layer 1" viewBox="0 0 119.8 122.88"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>classroom</title><path class="cls-1" d="M21.38,0a10.1,10.1,0,1,1-10.1,10.09A10.09,10.09,0,0,1,21.38,0ZM97.67,86.17a8.77,8.77,0,1,1-8.76,8.77,8.77,8.77,0,0,1,8.76-8.77Zm-69.73,0a8.77,8.77,0,1,1-8.76,8.77,8.77,8.77,0,0,1,8.76-8.77ZM22.43,105a11.12,11.12,0,0,0-5.58,2.23A17.86,17.86,0,0,0,12,113.51a21,21,0,0,0-2,8.35l-.15,1h7.52l.12-1.33a10.69,10.69,0,0,1,.81-3.88,6.33,6.33,0,0,1,1-1.69l.14,6.9H36.36l.08-4.59v.3l.05-2.61a6.33,6.33,0,0,1,1,1.69,10.69,10.69,0,0,1,.81,3.88l.12,1.33H39a4.44,4.44,0,0,1,0-.63l.14-1a34.63,34.63,0,0,1,.7-5A24.78,24.78,0,0,1,41.76,111l.28-.57A11.63,11.63,0,0,0,33.37,105c-3-.24-8,0-10.94,0ZM62.81,83.48a9.41,9.41,0,1,1-9.41,9.4,9.4,9.4,0,0,1,9.41-9.4Zm-5.92,20.17a12,12,0,0,0-6,2.4,19.27,19.27,0,0,0-5.19,6.77,22.62,22.62,0,0,0-2.15,9l-.16,1.09h8.08l.13-1.43a11.6,11.6,0,0,1,.87-4.16,6.87,6.87,0,0,1,1.09-1.82l.15,7.41H71.84l.09-4.92v.32l.06-2.81a7.44,7.44,0,0,1,1.09,1.82,11.82,11.82,0,0,1,.87,4.16l.13,1.43h8.07L82,121.79a22.46,22.46,0,0,0-2.15-9c-2.63-5.56-6-8.5-11.21-9.11-3.19-.26-8.54,0-11.74-.06ZM92.16,105a11.11,11.11,0,0,0-5.59,2.23,16.27,16.27,0,0,0-3,3.24l.25.52a24.3,24.3,0,0,1,1.86,5.31,33.32,33.32,0,0,1,.69,5l.11.72a4.74,4.74,0,0,1,.08.86h.58l.12-1.33a10.92,10.92,0,0,1,.82-3.88,6.31,6.31,0,0,1,1-1.69l.14,6.9h16.88l.08-4.59v.3l.06-2.61a6.58,6.58,0,0,1,1,1.69,10.69,10.69,0,0,1,.81,3.88l.12,1.33h7.53l-.15-1a20.81,20.81,0,0,0-2-8.35c-2.45-5.18-5.62-7.92-10.44-8.49-3-.24-8,0-10.93,0ZM51.35,37.14,62.66,25.27a1.75,1.75,0,0,1,2.54,2.41L54.54,38.86a4.77,4.77,0,0,1-3.71,7.81v13.9h55.63V15.67H50.83V37l.52.1ZM75.91,72.32V64.2H39.37a1.82,1.82,0,1,1,0-3.63H47.2V46.05l-9.06-1.74a4.75,4.75,0,0,1-3-1.9L31.25,37.1v.14l-.31,17.7,3.89,22.28,1,7.4a2.16,2.16,0,0,1,0,.35,12.65,12.65,0,0,0-10.51-2.46L21.37,59.9,17,85.15c-1,5.46-9.87,5.5-9.94-1.12L12,55.13,11.6,37.57h0l-.07-3a7.68,7.68,0,0,0-1.16,2A12.43,12.43,0,0,0,9.43,41L8.57,52.25v.18h0v0l0,.08v.06h0v.16h0v.33h0v.09l0,0v.05h0v0l0,0v.1h0v0l0,0v0l0,0v0l0,0v0l0,0v0l0,0,0,0v0l0,0v0c-1.68,2.32-5.85,3-7.41,0v0h0v-.09l0,0v0h0v-.07l0-.06v-.07h0v0l0-.09v-.09h0v-.07l0-.1V53h0v0l0-.11v-.07h0v-.09l0-.08V52.5h0v0l0-.14v-.08a72.15,72.15,0,0,1,.8-10.9C1.48,32,6.25,22.51,16.45,21.75c3-.22,6.06.08,9,.08a16.1,16.1,0,0,1,5.8,1A4.74,4.74,0,0,1,34,24.65l7.7,10.63,5.49,1.06V15.67H39.37a1.82,1.82,0,1,1,0-3.63H75.62V6.76a1.82,1.82,0,1,1,3.63,0V12h38.54a1.82,1.82,0,1,1,0,3.63h-7.73v44.9H118a1.82,1.82,0,1,1,0,3.63H79.5v8.31c.1.06.16.13.26.19L91.09,83.46a1.61,1.61,0,0,1,.33.42A13.39,13.39,0,0,0,89,85.71l-.27.24-.09.1L79.5,77.44v7.84a1.82,1.82,0,0,1-3.63,0V77.09L71,81.77A13.69,13.69,0,0,0,67.67,80l8.24-7.67Z"/></svg>
                    <div style='padding-left:5px'>Classes</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('listeMatieres') ?>" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                    <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                  </svg>
                    <div style='padding-left:5px'>Matiéres</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('club/liste') ?>" class="menu-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dribbble" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 0C3.584 0 0 3.584 0 8s3.584 8 8 8c4.408 0 8-3.584 8-8s-3.592-8-8-8zm5.284 3.688a6.802 6.802 0 0 1 1.545 4.251c-.226-.043-2.482-.503-4.755-.217-.052-.112-.096-.234-.148-.355-.139-.33-.295-.668-.451-.99 2.516-1.023 3.662-2.498 3.81-2.69zM8 1.18c1.735 0 3.323.65 4.53 1.718-.122.174-1.155 1.553-3.584 2.464-1.12-2.056-2.36-3.74-2.551-4A6.95 6.95 0 0 1 8 1.18zm-2.907.642A43.123 43.123 0 0 1 7.627 5.77c-3.193.85-6.013.833-6.317.833a6.865 6.865 0 0 1 3.783-4.78zM1.163 8.01V7.8c.295.01 3.61.053 7.02-.971.199.381.381.772.555 1.162l-.27.078c-3.522 1.137-5.396 4.243-5.553 4.504a6.817 6.817 0 0 1-1.752-4.564zM8 14.837a6.785 6.785 0 0 1-4.19-1.44c.12-.252 1.509-2.924 5.361-4.269.018-.009.026-.009.044-.017a28.246 28.246 0 0 1 1.457 5.18A6.722 6.722 0 0 1 8 14.837zm3.81-1.171c-.07-.417-.435-2.412-1.328-4.868 2.143-.338 4.017.217 4.251.295a6.774 6.774 0 0 1-2.924 4.573z"/>
                    </svg>
                    <div style='padding-left:5px'>Clubs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('listeEmplois') ?>" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 506.49"><path fill-rule="nonzero" d="M294.24 17.11C294.24 7.69 303.52 0 315.1 0c11.57 0 20.87 7.65 20.87 17.11v74.85c0 9.42-9.3 17.11-20.87 17.11-11.58 0-20.86-7.65-20.86-17.11V17.11zm58.81 301.55h17.92c3.27 0 5.96 2.69 5.96 5.96v56.84h48.21c3.3 0 5.99 2.7 5.99 5.98v17.92c0 3.31-2.69 5.98-5.99 5.98h-78.09v-86.72c0-3.27 2.7-5.96 6-5.96zm24.77-80.55c36.98 0 70.56 15.04 94.83 39.35C496.96 301.7 512 335.25 512 372.31c0 37.02-15.02 70.61-39.3 94.88l-.68.64c-24.23 23.88-57.5 38.66-94.2 38.66-37.06 0-70.61-15.04-94.88-39.31l-.64-.69c-23.9-24.24-38.68-57.53-38.68-94.18 0-37.06 15.04-70.61 39.32-94.88 24.27-24.28 57.85-39.32 94.88-39.32zm78.74 55.41c-20.09-20.11-47.96-32.58-78.74-32.58-30.75 0-58.61 12.47-78.75 32.62-20.15 20.14-32.62 48-32.62 78.75 0 30.5 12.25 58.14 32.02 78.19l.6.55c20.14 20.14 48 32.62 78.75 32.62 30.48 0 58.12-12.26 78.21-32.03l.54-.58c20.15-20.15 32.61-48 32.61-78.75s-12.48-58.61-32.62-78.79zM56.8 242.28c-1.17 0-2.23-5.2-2.23-11.56 0-6.39.92-11.54 2.23-11.54h56.94c1.18 0 2.24 5.2 2.24 11.54 0 6.38-.92 11.56-2.24 11.56H56.8zm90.77 0c-1.17 0-2.23-5.2-2.23-11.56 0-6.39.92-11.54 2.23-11.54h56.94c1.18 0 2.24 5.2 2.24 11.54 0 6.38-.92 11.56-2.24 11.56h-56.94zm90.77 0c-1.16 0-2.22-5.2-2.22-11.56 0-6.39.92-11.54 2.22-11.54h56.94c1.19 0 2.25 5.15 2.25 11.49-5.7 3.55-11.2 7.44-16.43 11.61h-42.76zm-181.4 66.24c-1.18 0-2.24-5.2-2.24-11.57 0-6.38.93-11.58 2.24-11.58h56.94c1.18 0 2.22 5.2 2.22 11.58 0 6.37-.91 11.57-2.22 11.57H56.94zm90.77 0c-1.18 0-2.24-5.2-2.24-11.57 0-6.38.93-11.58 2.24-11.58h56.94c1.18 0 2.23 5.2 2.23 11.58 0 6.37-.92 11.57-2.23 11.57h-56.94zM57.06 374.8c-1.18 0-2.24-5.2-2.24-11.58 0-6.37.94-11.57 2.24-11.57H114c1.19 0 2.24 5.2 2.24 11.57 0 6.38-.93 11.58-2.24 11.58H57.06zm90.78 0c-1.19 0-2.25-5.2-2.25-11.58 0-6.37.94-11.57 2.25-11.57h56.94c1.18 0 2.24 5.2 2.24 11.57 0 6.38-.94 11.58-2.24 11.58h-56.94zM106.83 17.11C106.83 7.69 116.1 0 127.69 0c11.57 0 20.86 7.65 20.86 17.11v74.85c0 9.42-9.34 17.11-20.86 17.11-11.59 0-20.86-7.65-20.86-17.11V17.11zM22.97 163.64h397.39V77.46c0-2.94-1.19-5.53-3.09-7.43-1.9-1.9-4.59-3.08-7.42-3.08h-38.1c-6.39 0-11.59-5.2-11.59-11.57 0-6.38 5.2-11.58 11.59-11.58h38.1c9.32 0 17.7 3.77 23.82 9.89 6.12 6.13 9.88 14.49 9.88 23.82v136.81c-7.61-2.62-15.41-4.73-23.44-6.29v-21.38h.25H22.97v223.17c0 2.94 1.18 5.52 3.08 7.42 1.91 1.9 4.61 3.09 7.44 3.09h188.85c2.16 8.01 4.86 15.83 8.11 23.35H33.71c-9.3 0-17.7-3.75-23.84-9.89C3.75 427.72 0 419.36 0 410.02V77.55c0-9.29 3.75-17.7 9.87-23.82 6.14-6.13 14.5-9.88 23.84-9.88h40.67c6.38 0 11.57 5.2 11.57 11.56C85.95 61.8 80.76 67 74.38 67H33.71c-2.96 0-5.54 1.18-7.44 3.08-1.9 1.9-3.09 4.59-3.09 7.43v86.16h-.21v-.03zm158.95-96.69c-6.39 0-11.57-5.2-11.57-11.57 0-6.38 5.18-11.58 11.57-11.58h77.55c6.39 0 11.57 5.2 11.57 11.58 0 6.37-5.18 11.57-11.57 11.57h-77.55z"/></svg>
                    <div style='padding-left:5px'>Emplois</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
                  </svg>
                    <div style='padding-left:5px'>Bulletins des notes</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('menu/liste') ?>" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor"  width="20" height="20" viewBox="0 0 24 24" ><path d="M21 10H3a1 1 0 0 0-1 1 10 10 0 0 0 5 8.66V21a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1.34A10 10 0 0 0 22 11a1 1 0 0 0-1-1zm-5.45 8.16a1 1 0 0 0-.55.9V20H9v-.94a1 1 0 0 0-.55-.9A8 8 0 0 1 4.06 12h15.88a8 8 0 0 1-4.39 6.16zM9 9V7.93a4.53 4.53 0 0 0-1.28-3.15A2.49 2.49 0 0 1 7 3V2H5v1a4.53 4.53 0 0 0 1.28 3.17A2.49 2.49 0 0 1 7 7.93V9zm4 0V7.93a4.53 4.53 0 0 0-1.28-3.15A2.49 2.49 0 0 1 11 3V2H9v1a4.53 4.53 0 0 0 1.28 3.15A2.49 2.49 0 0 1 11 7.93V9zm4 0V7.93a4.53 4.53 0 0 0-1.28-3.15A2.49 2.49 0 0 1 15 3V2h-2v1a4.53 4.53 0 0 0 1.28 3.15A2.49 2.49 0 0 1 15 7.93V9z"></path></svg>
                    <div style='padding-left:5px'>Menu cantine</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                      <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                      <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                      <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                    </svg>
                    <div style='padding-left:5px'>Caisses</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                    <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                  </svg>
                    <div style='padding-left:5px'>Réclamations</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url('listeEvenement') ?>" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                    <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                  </svg>
                    <div style='padding-left:5px'>Evènements</div>
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
                            <small class="text-muted"> </small>
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


 
 




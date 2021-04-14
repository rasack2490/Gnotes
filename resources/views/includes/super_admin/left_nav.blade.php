  <!-- Sidebar - Brand -->
  <a class="sidebar-brand align-items-center justify-content-center mb-5" href="index.html">


                <img src="assets/img/logo.png" alt="" class="logo">

                <!--div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </!--div>
                <div-- class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div-->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestion utilisateurs
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-plus-square"></i>
                    <span>Ajouter</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                        <a class="collapse-item" href="{{URL::route('addprof')}}">Professeur</a>
                        <a class="collapse-item" href="{{URL::route('addstudent')}}">Eleve</a>
                        <a class="collapse-item" href="cards.html">Classe</a>
                        <a class="collapse-item" href="cards.html">Matiere</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-view-list"></i>
                    <span>Listes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                        <a class="collapse-item" href="utilities-color.html">Professeurs</a>
                        <a class="collapse-item" href="utilities-border.html">Eleves</a>
                        <a class="collapse-item" href="utilities-animation.html">Classes</a>
                        <a class="collapse-item" href="utilities-other.html">Matieres</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestion année scolaire
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseyear"
                    aria-expanded="true" aria-controls="collapseyear">
                    <i class="bi bi-bookmark-plus"></i>
                    <span>Definir</span>
                </a>
                <div id="collapseyear" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#collapseUtilities">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                        <a class="collapse-item" href="{{URL::route('addyear')}}">Année scolaire</a>
                    </div>
                </div>
            </li>


            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


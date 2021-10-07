        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link " href="{{route('lesRdv')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu text-white">LES RDV</span></a>
                        </li>


                        <li class="sidebar-item">

                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">lES DEMANDES </span></a>

                            <ul aria-expanded="false" class="collapse  first-level">

                                <li class="sidebar-item"><a href="{{route('lesDemandes')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> EN ATTENTE </span></a></li>
                                <li class="sidebar-item"><a href="{{route('lesDemandes')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> EN COUR </span></a></li>
                                <li class="sidebar-item"><a href="{{route('lesDemandes')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> CLOTUREE </span></a></li>

                            </ul>

                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                            href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span
                                class="hide-menu">ACTION  </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i
                                        class="mdi mdi-emoticon"></i><span class="hide-menu"> ACTION 1
                                    </span></a></li>
                            <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i
                                        class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> ACTION 2
                                        Icons </span></a></li>
                        </ul>
                    </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">UTILISATEUR </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">

                                <li class="sidebar-item"><a href="authentication-register.html" class="sidebar-link">
                                    <i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> CREER UN COMPTE </span></a></li>
                                        <li class="sidebar-item"><a href="authentication-register.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> LISTE DES UTILISATEUR
                                        </span></a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

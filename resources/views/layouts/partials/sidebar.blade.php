<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{url('admin/dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                          
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('product.index') }}"> Product List</a>
                                    <a class="nav-link" href="{{ route('category.index') }}">Category List</a>
                                    
                                </nav>
                            </div>



                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePeoples" aria-expanded="false" aria-controls="collapsePeoples">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Peoples
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePeoples" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('users.index')}}">View Users</a>
                                    <a class="nav-link" href="{{route('roles.index')}}">View Roles</a>
                                    <a class="nav-link" href="{{route('permissions.index')}}">View Permissions</a>
                                    <!-- <a class="nav-link" href="layout-static.html">Customers List</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Suppliers List</a> -->
                                </nav>
                          
                                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSales" aria-expanded="false" aria-controls="collapseSales">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Sales
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseSales" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('users.index')}}">Purchase List</a>
                                    <a class="nav-link" href="{{route('roles.index')}}">Sales List</a>
                                </nav>
                          
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                         
                    </div> -->
                    </div>
                    <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: {{ Auth::user()->name }}</div>
                        
                    </div>
                </nav>
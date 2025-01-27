

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav" style="color:white">
                <a class="nav-link" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-tablet"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                    Properties
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('listings') }}">Listings</a>
                        <a class="nav-link" href="{{ route('maintenance') }}">Maintenance Issues</a>
                        <a class="nav-link" href="{{ route('editScreen') }}">Edit Listing</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    Tenants
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('currentTenant') }}">Current Tenants</a>
                        <a class="nav-link" href="{{ route('editTScreen') }}">Edit Tenants</a>             
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUpload" aria-expanded="false" aria-controls="collapseUpload">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                    Upload Document
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUpload" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('showTenantUpload') }}">Tenant</a>
                        <a class="nav-link" href="{{ route('showMaintenanceUpload') }}">Maintenance</a>
                        <a class="nav-link" href="{{ route('showPropertyUpload') }}">Property</a>            
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSelect" aria-expanded="false" aria-controls="collapseSelect">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                    Select Document
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSelect" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('showTenantSelect') }}">Tenant</a>
                        <a class="nav-link" href="{{ route('showMaintenanceSelect') }}">Maintenance</a>
                        <a class="nav-link" href="{{ route('showPropertySelect') }}">Properties</a>            
                    </nav>
                </div>
                
                            
            </div>
        </div>
    </nav>
</div>



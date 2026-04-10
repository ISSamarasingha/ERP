     <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
         <div class="sb-sidenav-menu">
             <div class="nav">

                 <a class="nav-link" href="{{ url('admin/dashboard') }}">
                     <div class="sb-nav-link-icon"><i class="fas fa-gauge"></i></div>
                     Dashboard
                 </a>
                 <div class="sb-sidenav-menu-heading">Overview</div>
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers"
                     aria-expanded="false" aria-controls="collapseUsers">
                     <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
                     Users
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse" id="collapseUsers" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav">
                         <a class="nav-link" href="{{ url('admin/users/view') }}">View Users</a>
                     </nav>
                 </div>
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                     data-bs-target="#collapseCustomers" aria-expanded="false" aria-controls="collapseCustomers">
                     <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                     Customers
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse" id="collapseCustomers" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav">
                         @if (auth()->user()->role == 'admin')
                             <a class="nav-link" href="{{ url('admin/customers/create') }}">Create Customers</a>
                         @endif
                         <a class="nav-link" href="{{ url('admin/customers/view') }}">View Customers</a>
                     </nav>
                 </div>


                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                     data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                     <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                     Products
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse" id="collapseProducts" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav">
                         @if (auth()->user()->role == 'admin')
                             <a class="nav-link" href="{{ url('admin/products/create') }}">Create Products</a>
                         @endif
                         <a class="nav-link" href="{{ url('admin/products/view') }}">View Products</a>
                     </nav>
                 </div>
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                     data-bs-target="#collapseInvoices" aria-expanded="false" aria-controls="collapseInvoices">
                     <div class="sb-nav-link-icon"><i class="fas fa-file-invoice"></i></div>
                     Invoices
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse" id="collapseInvoices" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav">
                         <a class="nav-link" href="{{ url('admin/invoices/create') }}">Create Invoices</a>
                         <a class="nav-link" href="{{ route('invoices.list') }}">View Invoices</a>
                     </nav>
                 </div>
             </div>
         </div>
         <div class="sb-sidenav-footer">
             <div class="small">Logged in as:</div>
             {{ Auth::user()->role }}
         </div>
     </nav>

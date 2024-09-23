 <!-- Sidebar -->
 <div class="sidebar" id="sidebar">
     <div class="sidebar-inner slimscroll">
         <div id="sidebar-menu" class="sidebar-menu">
             <ul>
                 <li class="active">
                     <a href="dashboard.html"><i class="fa-solid fa-house"></i>
                         <span>Dashboard</span></a>
                 </li>
                 <li class="submenu">
                     <a href="#"><i class="fa-solid fa-passport"></i> <span>CMS</span>
                         <span class="menu-arrow"></span></a>
                     <ul>
                         <li>
                             <a href="courier-type.html">Courier Type</a>
                         </li>
                         <li>
                             <a href="certification.html">Certification</a>
                         </li>
                         <li>
                             <a href="activation.html">Activation Charge</a>
                         </li>
                     </ul>
                 </li>
                 <li class="">
                     <a href="#"><i class="fa-solid fa-question-circle"></i>
                         <span>FAQ</span></a>
                 </li>
                 <li class="submenu">
                     <a href="product.html"><i class="fa-solid fa-passport"></i> <span>Product</span>
                         <span class="menu-arrow"></span></a>
                     <ul>
                         <li>
                             <a href="category.html">Category</a>
                         </li>
                         <li>
                             <a href="subcategory.html">Sub Category</a>
                         </li>
                         <li>
                             <a href="{{route('admin.listproduct')}}">Products</a>
                         </li>
                     </ul>
                 </li>
                 <li class="">
                     <a href="#"><i
                             class="fa-solid fa-users-line"></i><span>Testimonial</span></a>
                 </li>
                 <li class="">
                     <a href="order.html"><i class="fa-solid fa-cart-shopping"></i><span>Order</span></a>
                 </li>
                 <li class="submenu">
                     <a href="#"><i class="fa-solid fa-gear"></i> <span>System</span> <span
                             class="menu-arrow"></span></a>
                     <ul>
                         <li>
                             <a href="#">Banner</a>
                         </li>
                         <li>
                             <a class="" href="#">Pages</a>
                         </li>
                         <li>
                             <a class="" href="#">Order status</a>
                         </li>
                         <li>
                             <a href="setting.html">Setting</a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="fa-solid fa-right-from-bracket"></i>
                         <span>Logout</span>
                     </a>

                     <!-- Hidden form to handle logout -->
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>


                 </li>
             </ul>
         </div>
     </div>
 </div>
 <!-- /Sidebar -->
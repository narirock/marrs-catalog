<!-- HEADER -->
<header style="position: relative; z-index: 100;">
    <!-- TOP HEADER -->
    <div id="top-header">
       <div class="container">
          <div class="row justify-content-between">
             <div class="col-lg-6">
                <ul class="social-top-links">
                   <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                   <li><a href="#"><i class="fab fa-instagran"></i></a>
                   </li>
                   <li><a href=""><i class="fab fa-twitter"></i></a></li>
                   <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
             </div>
             <div class="col-lg-6 text-end">
                <ul class="header-links ">
                   <!-- pull-right -->
                   <li><a href="/login"><i class="fa fa-user"></i> Entre/Cadastre-se</a></li>
                </ul>
             </div>
          </div>
       </div>
    </div>
    <!-- /TOP HEADER -->
    <!-- MAIN HEADER -->
    <div id="header">
       <!-- container -->
       <div class="container">
          <!-- row -->
          <div class="row">
             <!-- LOGO -->
             <div class="col-md-3">
                <div class="header-logo">
                   <a href="/" class="logo">
                   <img src="/site/images/logo-white.svg" width="200" alt="">
                   </a>
                </div>
             </div>
             <!-- /LOGO -->
             <!-- SEARCH BAR -->
             <div class="col-md-6">
                <div class="header-search">
                   <form action="/search">
                      <div class="autocomplete">
                         <input id="myInput" class="input" placeholder="Busque produtos"
                            value="">
                         <button id='button-search' class="search-btn"
                            onclick="search('myInput')">Buscar</button>
                      </div>
                   </form>
                </div>
             </div>
             <!-- /SEARCH BAR -->
             <!-- ACCOUNT -->
             <div class="col-md-3 clearfix">
                <div class="header-ctn">
                     <!-- Menu Toogle -->
                   <div class="header-ctn-account">
                       <div class="item">
                           <h2><i class="fas fa-user-circle"></i></h2>
                       </div>
                       <div class="item">
                        <span>Minha conta</span>
                        <p>Acesse para comprar</p>
                       </div>

                    </div>
                 <!-- /Menu Toogle -->
                   <!-- Cart -->
                   <div class="dropdown">
                      <a class="" href="javascript:void(0)" data-toggle="dropdown" aria-expanded="true" onclick="openRightMenu()">
                         <h2><i class="fa fa-shopping-cart"></i></h2>
                         {{-- <span>Sua sacola</span> --}}
                         <div class="qty">0</div>
                      </a>
                   </div>
                   <!-- /Cart -->

                </div>
             </div>
             <!-- /ACCOUNT -->
          </div>
          <!-- row -->
       </div>
       <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
 </header>
 <!-- /HEADER -->


 <main id="cart-backdrop" class="cart-backdrop" onclick="closeRightMenu()"></main>
 <!-- Mobile Header -->
 <div class="wsmobileheader clearfix ">
    <a id="wsnavtoggle" class="wsanimated-arrow icon-menu-mobile"><i class="fas fa-bars"></i></a>
    <!-- <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a> -->
    <!-- <span class="smllogo"><img src="images/menu-logo.png" width="80" alt="" /></span> -->
    <!--  <a href="tel:123456789" class="callusbtn"><i class="fas fa-phone"></i></a>
       <a href="tel:123456789" class="callusbtn"><i class="fas fa-phone"></i></a> -->
    <div class="icons-menu-mobile">
       <a href="/client"><i class="fas fa-user-circle"></i></a>
       <a href="#" onclick="openRightMenu()"><i class="fas fa-shopping-cart"></i><sup>0</sup></a>
    </div>
 </div>
 <!-- Mobile Header -->
 <div class="wsmainfull clearfix" style="position: relative; z-index: 100;">
    <div class="wsmainwp clearfix">
       <div class="desktoplogo"><a href="/"><img src="@" alt=""></a></div>
       <!--Main Menu HTML Code-->
       <nav class="wsmenu clearfix">
          <ul class="wsmenu-list">
             <div class="menu-profile-mobile">
                <a href="/login">
                   <div class="item">
                      <img src="/templates/store2/new/img/icons/user.png" width="34" alt="">
                   </div>
                   <div class="item">
                      <h4>Entre ou cadastre-se</h4>
                   </div>
                </a>
             </div>
             <li aria-haspopup="true" class="has-dropdown">
                <a href="#">Departamentos <span class="wsarrow"></span></a>
                <ul class="sub-menu">
                   <li aria-haspopup="true">
                      <a href="#">
                      <i class="fas fa-angle-right"></i>Computadores
                      </a>
                      <ul class="sub-menu">
                         <li aria-haspopup="true"><a
                            href="/search?term=&departments=2"><i
                            class="fas fa-angle-right"></i>Hardwares</a>
                         </li>
                         <li aria-haspopup="true"><a
                            href="/search?term=&departments=6"><i
                            class="fas fa-angle-right"></i>Pc Gamer</a>
                         </li>
                         <li aria-haspopup="true"><a
                            href="/search?term=&departments=12"><i
                            class="fas fa-angle-right"></i>PCs</a>
                         </li>
                         <li aria-haspopup="true"><a
                            href="/search?term=&departments=15"><i
                            class="fas fa-angle-right"></i>Monitores</a>
                         </li>
                      </ul>
                   </li>
                   <li aria-haspopup="true">
                      <a href="#">
                      <i class="fas fa-angle-right"></i>Hardwares
                      </a>
                      <ul class="sub-menu">
                         <li aria-haspopup="true"><a
                            href="/search?term=&departments=8"><i
                            class="fas fa-angle-right"></i>Motherboards</a>
                         </li>
                         <li aria-haspopup="true"><a
                            href="/search?term=&departments=9"><i
                            class="fas fa-angle-right"></i>Processadores</a>
                         </li>
                         <li aria-haspopup="true"><a
                            href="/search?term=&departments=10"><i
                            class="fas fa-angle-right"></i>Memória Ram</a>
                         </li>
                         <li aria-haspopup="true"><a
                            href="/search?term=&departments=11"><i
                            class="fas fa-angle-right"></i>SSD &amp; HD</a>
                         </li>
                      </ul>
                   </li>
                   <li aria-haspopup="true">
                      <a href="/search?term=&departments=3">
                      <i class="fas fa-angle-right"></i>Home Office
                      </a>
                   </li>
                   <li aria-haspopup="true">
                      <a href="/search?term=&departments=4">
                      <i class="fas fa-angle-right"></i>Smartphones
                      </a>
                   </li>
                   <li aria-haspopup="true">
                      <a href="/search?term=&departments=5">
                      <i class="fas fa-angle-right"></i>Games
                      </a>
                   </li>
                </ul>
             </li>
             <li aria-haspopup="true" class="has-dropdown">
                <a href="">Computadores <span class="wsarrow"></span></a>
                <div class="wsmegamenu clearfix halfmenu">
                   <div class="container-fluid">
                      <div class="row">
                         <ul class="col-lg-3 col-md-12 col-xs-12 link-list">
                            <!--<li class="title">Product Header</li>!-->
                            <li>
                               <a href="/search?term=&departments=2"
                                  class="name-department">
                               Hardwares
                               </a>
                               <a href="#">
                               <i
                                  class="fas fa-angle-right"></i>Hardwares
                               </a>
                               <ul class="sub-menu">
                                  <li aria-haspopup="true"><a
                                     href="/search?term=&departments=8"><i
                                     class="fas fa-angle-right"></i>Motherboards</a>
                                  </li>
                                  <li aria-haspopup="true"><a
                                     href="/search?term=&departments=9"><i
                                     class="fas fa-angle-right"></i>Processadores</a>
                                  </li>
                                  <li aria-haspopup="true"><a
                                     href="/search?term=&departments=10"><i
                                     class="fas fa-angle-right"></i>Memória Ram</a>
                                  </li>
                                  <li aria-haspopup="true"><a
                                     href="/search?term=&departments=11"><i
                                     class="fas fa-angle-right"></i>SSD &amp; HD</a>
                                  </li>
                               </ul>
                            </li>
                         </ul>
                         <ul class="col-lg-3 col-md-12 col-xs-12 link-list">
                            <!--<li class="title">Product Header</li>!-->
                            <li>
                               <a href="/search?term=&departments=6"
                                  class="name-department">
                               Pc Gamer
                               </a>
                               <a href="#">
                               <i
                                  class="fas fa-angle-right"></i>Pc Gamer
                               </a>
                               <ul class="sub-menu">
                                  <li aria-haspopup="true"><a
                                     href="/search?term=&departments=7"><i
                                     class="fas fa-angle-right"></i>Notebook Gamer</a>
                                  </li>
                               </ul>
                            </li>
                         </ul>
                         <ul class="col-lg-3 col-md-12 col-xs-12 link-list">
                            <!--<li class="title">Product Header</li>!-->
                            <li>
                               <a href="/search?term=&departments=12"
                                  class="name-department">
                               PCs
                               </a>
                               <a href="#">
                               <i
                                  class="fas fa-angle-right"></i>PCs
                               </a>
                               <ul class="sub-menu">
                                  <li aria-haspopup="true"><a
                                     href="/search?term=&departments=13"><i
                                     class="fas fa-angle-right"></i>PCs para trabalho</a>
                                  </li>
                                  <li aria-haspopup="true"><a
                                     href="/search?term=&departments=14"><i
                                     class="fas fa-angle-right"></i>Notebooks</a>
                                  </li>
                               </ul>
                            </li>
                         </ul>
                         <ul class="col-lg-3 col-md-12 col-xs-12 link-list">
                            <!--<li class="title">Product Header</li>!-->
                            <li>
                               <a href="/search?term=&departments=15"
                                  class="name-department">
                               Monitores
                               </a>
                               <a href="#">
                               <i
                                  class="fas fa-angle-right"></i>Monitores
                               </a>
                               <ul class="sub-menu">
                                  <li aria-haspopup="true"><a
                                     href="/search?term=&departments=16"><i
                                     class="fas fa-angle-right"></i>Monitores Gamer</a>
                                  </li>
                               </ul>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             </li>
             <li aria-haspopup="true" class="has-dropdown">
                <a href="">Hardwares <span class="wsarrow"></span></a>
                <div class="wsmegamenu clearfix halfmenu">
                   <div class="container-fluid">
                      <div class="row">
                         <ul class="col-lg-3 col-md-12 col-xs-12 link-list">
                            <!--<li class="title">Product Header</li>!-->
                            <li>
                               <a href="/search?term=&departments=8"
                                  class="name-department">
                               Motherboards
                               </a>
                               <a
                                  href="/search?term=&departments=8">
                               <i
                                  class="fas fa-angle-right"></i>Motherboards
                               </a>
                            </li>
                         </ul>
                         <ul class="col-lg-3 col-md-12 col-xs-12 link-list">
                            <!--<li class="title">Product Header</li>!-->
                            <li>
                               <a href="/search?term=&departments=9"
                                  class="name-department">
                               Processadores
                               </a>
                               <a
                                  href="/search?term=&departments=9">
                               <i
                                  class="fas fa-angle-right"></i>Processadores
                               </a>
                            </li>
                         </ul>
                         <ul class="col-lg-3 col-md-12 col-xs-12 link-list">
                            <!--<li class="title">Product Header</li>!-->
                            <li>
                               <a href="/search?term=&departments=10"
                                  class="name-department">
                               Memória Ram
                               </a>
                               <a
                                  href="/search?term=&departments=10">
                               <i
                                  class="fas fa-angle-right"></i>Memória Ram
                               </a>
                            </li>
                         </ul>
                         <ul class="col-lg-3 col-md-12 col-xs-12 link-list">
                            <!--<li class="title">Product Header</li>!-->
                            <li>
                               <a href="/search?term=&departments=11"
                                  class="name-department">
                               SSD &amp; HD
                               </a>
                               <a
                                  href="/search?term=&departments=11">
                               <i
                                  class="fas fa-angle-right"></i>SSD &amp; HD
                               </a>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             </li>
             <li aria-haspopup="true">
                <a href="/search?term=&departments=3">Home Office</a>
             </li>
             <li aria-haspopup="true">
                <a href="/search?term=&departments=4">Smartphones</a>
             </li>
             <li aria-haspopup="true">
                <a href="/search?term=&departments=5">Games</a>
             </li>
          </ul>
       </nav>
    </div>
 </div>


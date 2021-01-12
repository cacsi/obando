<body>
<header class="cd-main-header js-cd-main-header">
    <div class="cd-logo-wrapper">
      <div style="width: 100%">
      <a href="#0" class="cd-logo ml-2"><img src="source/images/logo.png" height="45" alt="Logo"></a>
        
      </div>
    </div>
    
    <div class="cd-search js-cd-search">
      <form>
        <input class="reset" type="search" placeholder="Search...">
      </form>
    </div>
  
    <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>
  
    <ul class="cd-nav__list js-cd-nav__list">
      <li class="cd-nav__item"><a href="#"><i class="fas fa-bell"></i></a></li>
      <li class="cd-nav__item"><a href="#">Support</a></li>
      <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
        <a href="#0">
          <i class="fas fa-user"></i>
           <span>&nbsp; Account</span>
        </a>
    
        <ul class="cd-nav__sub-list">
          <li class="cd-nav__sub-item"><a href="#">My Account</a></li>
          <li class="cd-nav__sub-item"><a href="#">Edit Account</a></li>
        <li class="cd-nav__sub-item"><a data-toggle="modal" data-target="#logoutm" href="#">Logout</a></li>
        </ul>
      </li>
    </ul>
  </header> <!-- .cd-main-header -->

<!-- Modal -->
<div class="modal mt-5 fade" id="logoutm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary" href="#">Confirm</a>
      </div>
    </div>
  </div>
</div>
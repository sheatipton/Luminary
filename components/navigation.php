<!-- Promo Code -->
<div class="topbar" style="height: 35px">
  <p class="offer" style="font-size: 16px"> USE PROMO CODE 'TENOFF' TO SAVE $10 on your first order!</p>
</div>

<!-- Navigation Bar -->
<div class="header">
  <nav class="py-2 bg-light border-bottom" style="height: 60px">
    <div class="container d-flex flex-wrap" style="font-size: 20px">
      <ul class="nav me-auto">
        <ul class="nav me-auto">
          <li class="nav-item"><a href="../info/about.php" class="nav-link link-dark px-2 toplink">About&nbsp;&nbsp;<i class="bi bi-card-text"></i></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="nav-item">

            <?php if ($loggedIn && $type == 0) : ?>
              <a href="../admin/admin_dash.php" class="nav-link link-dark px-2 toplink">
                Dashboard&nbsp;&nbsp;<i class="bi bi-bar-chart-line"></i>
              </a>
            <?php elseif ($loggedIn && $type == 1) : ?>
              <a href="../author/author_dash.php" class="nav-link link-dark px-2 toplink">
                Dashboard&nbsp;&nbsp;<i class="bi bi-bar-chart-line"></i>
              </a>
            <?php elseif ($loggedIn && $type == 2) : ?>
              <a href="../info/dashboard.php" class="nav-link link-dark px-2 toplink">
                Dashboard&nbsp;&nbsp;<i class="bi bi-bar-chart-line"></i>
              </a>
            <?php elseif (!$loggedIn) : ?>
              <a href="../info/dashboard.php" class="nav-link link-dark px-2 toplink">
                Dashboard&nbsp;&nbsp;<i class="bi bi-bar-chart-line"></i>
              </a>
            <?php endif; ?>

          </li>
        </ul>
      </ul>

      <!-- Logo -->
      <a href="../index.php" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
        <ul class="nav">
          <i class="bi bi-moon-stars" style="font-size: 20px; padding-top: 10px; padding-left: 1rem"></i>
          <p style="font-size: 22px; padding-top: 5px; padding-left: 1rem; padding-right: 1rem">Luminary</p>
          <i class="bi bi-stars" style="font-size: 15px; padding-top: 12px; padding-right: 1rem"></i>
        </ul>
      </a>
      <ul class="nav">

        <?php if ($loggedIn) : ?>
          <li class="nav-item"><a href="../bag/shoppingbag.php" class="nav-link link-dark px-2 toplink"><?php echo $bagNumber .= ' in bag' ?>&nbsp;&nbsp;&nbsp;<i class="bi bi-bag-heart"></i></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="nav-item"><a href="../info/profile.php" class="nav-link link-dark px-2 toplink toplink">Account&nbsp;&nbsp;&nbsp;<i class="bi bi-person-square"></i></a></li>&nbsp;&nbsp;&nbsp;
        <?php elseif (!$loggedIn) : ?>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="nav-item"><a href="../login/login.php" class="nav-link link-dark px-2 toplink toplink">Login</a></li>
          <li class="nav-item"><a href="../login/register.php" class="nav-link link-dark px-2 toplink toplink">Sign up</a></li>
        <?php endif; ?>

      </ul>
    </div>
  </nav>
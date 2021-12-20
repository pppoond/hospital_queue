<?php 
    /**
     * Main Sidebar
     * 
     * @link https://appzstory.dev
     * @author Yothin Sapsamran (Jame AppzStory Studio)
     */ 
    function isActive ($data) {
        $array = explode('/', $_SERVER['REQUEST_URI']);
        $key = array_search("pages", $array);
        $name = $array[$key + 1];
        return $name === $data ? 'active' : '' ;
    }
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars fa-2x"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto ">
        <li class="nav-item d-md-none d-block">
            <a href="../dashboard/">
                <img src="assets/images/hos.png" 
                    alt="Admin Logo" 
                    width="50px"
                    class="img-circle elevation-3">
                <span class="font-weight-light pl-1">โรงพยาบาลเทศบาลนครอุดรธานี</span>
            </a>
        </li>
    </ul>
</nav>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../dashboard/" class="brand-link">
        <img src="assets/images/hos.png" 
             alt="Admin Logo" 
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">ระบบคิวออนไลน์ </span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../dashboard/" class="nav-link <?php echo isActive('dashboard') ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>หน้าหลัก</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../manager/" class="nav-link <?php echo isActive('manager') ?>">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>รายการคิวปัจจุบัน</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../members/" class="nav-link <?php echo isActive('members') ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>จองคิวออนไลน์</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../products/" class="nav-link <?php echo isActive('products') ?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>ตรวจสอบคิว</p>
                    </a>
                </li>
              
                <li class="nav-header">ช่วยเหลือ</li>
                <li class="nav-item">
                    <a href="../logout.php" id="logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>ติดต่อเรา</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>


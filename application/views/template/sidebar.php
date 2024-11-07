<?php
$CI = &get_instance();
$CI->load->model('menu_model');
$menus = $CI->menu_model->get_menus(0);
$current_url = $CI->uri->segment(1);
$current_suburl = $CI->uri->segment(2);
?>
<aside id="sidebar-wrapper">
<div class="sidebar-brand">
    <a href="<?= base_url('dashboard'); ?>" class="logo-link">
        <img src="<?= base_url('assets/img/logo/logo_insaf.png'); ?>" alt="Logo" style="height: 80px; margin-top: 27px; margin-bottom: 130px" class="logo">
    </a>
</div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">
        <img src="<?= base_url('assets/img/logo/logo_insaf.png'); ?>" style="height: 30px;">
    </a>
    </div>

    <ul class="sidebar-menu">
        <?php foreach ($menus as $menu):
            $submenus = $CI->menu_model->get_menus($menu['id']);
            $is_active = ($current_url == $menu['url']) ? 'active' : '';
            
            // Cek apakah salah satu submenu memiliki URL yang cocok
            $is_parent_active = false;
            if (!empty($submenus)) {
                foreach ($submenus as $submenu) {
                    if ($current_url == $menu['url'] && $current_suburl == $submenu['url']) {
                        $is_active = 'active'; // Tandai parent menu sebagai aktif
                        $is_parent_active = true;
                    }
                }
            }

            if (empty($submenus)): // Jika tidak ada submenu
        ?>
                <li class="<?= $is_active; ?>">
                    <a class="nav-link" href="<?= base_url($menu['url']); ?>">
                        <i class="<?= $menu['icon']; ?>"></i> <span><?= $menu['menu_name']; ?></span>
                    </a>
                </li>
            <?php else: ?>
                <li class="dropdown <?= $is_active; ?>">
                    <a href="#" class="nav-link has-dropdown <?= $is_parent_active ? 'active' : ''; ?>">
                        <i class="<?= $menu['icon']; ?>"></i> <span><?= $menu['menu_name']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($submenus as $submenu):
                            $is_sub_active = ($current_url == $submenu['url']) ? 'active' : '';
                        ?>
                            <li class="<?= $is_sub_active; ?>">
                                <a class="nav-link" href="<?= base_url($submenu['url']); ?>">
                                    <?= $submenu['menu_name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
        </a>
    </div>
</aside>

<style>
    .logo {
    height: 80px;
    margin-top: 25px; 
    margin-bottom: 100px; 
    transition: transform 0.5s ease;
}

.logo-link:hover .logo {
    transform: scale(1.1); 
}

/* Aturan untuk highlight menu di sidebar saat di-hover */
.sidebar-menu li a.nav-link:hover {
    background-color: #f0f0f5; 
    color: #6474eb; 
    transition: background-color 0.3s ease, color 0.3s ease; 
}

/* Untuk item dropdown, agar saat di-hover juga ada efek highlight */
.sidebar-menu li.dropdown:hover > a.nav-link {
    background-color: #e0e0eb; 
    color: #6474eb; 
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Untuk submenu item, jika ingin ada efek highlight juga */
.dropdown-menu li a.nav-link:hover {
    background-color: #e6e6ff; 
    color: #6474eb;
}
</style>
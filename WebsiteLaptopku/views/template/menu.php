<li class="<?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? 'active' : ''; ?>">
    <a href="<?php echo site_url(); ?>" class="theme-menu">
        <i class="fa fa-home"></i> <span>Beranda</span>
    </a>
</li>

<li class="<?php echo ($this->uri->segment(1) == 'kriteria' || $this->uri->segment(1) == 'subkriteria') ? 'active' : ''; ?>">
    <a href="<?php echo site_url('kriteria'); ?>" class="theme-menu">
        <i class="fa fa-file-text"></i> <span>Data Kriteria</span>
    </a>
</li>

<li class="<?php echo $this->uri->segment(1) == 'alternatif' ? 'active' : ''; ?>">
    <a href="<?php echo site_url('alternatif'); ?>" class="theme-menu">
        <i class="fa fa-file-text"></i> <span>Data Alternatif</span>
    </a>
</li>

<li class="<?php echo $this->uri->segment(1) == 'penilaian' ? 'active' : ''; ?>">
    <a href="<?php echo site_url('penilaian'); ?>" class="theme-menu">
        <i class="fa fa-file-text"></i> <span>Rekap Penilaian</span>
    </a>
</li>

<li class="<?php echo $this->uri->segment(1) == 'hasil' ? 'active' : ''; ?>">
    <a href="<?php echo site_url('hasil'); ?>" class="theme-menu">
        <i class="fa fa-trophy"></i> <span>Hasil</span>
    </a>
</li>

<li class="<?php echo ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) != 'password') ? 'active' : ''; ?>">
    <a href="<?php echo site_url('admin'); ?>" class="theme-menu">
        <i class="fa fa-user"></i> <span>Admin</span>
    </a>
</li>

<li class="<?php echo ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'password') ? 'active' : ''; ?>">
    <a href="<?php echo site_url('admin/password'); ?>" class="theme-menu">
        <i class="fa fa-cog"></i> <span>Ubah Password</span>
    </a>
</li>

<li>
    <a href="<?php echo site_url('login/logout'); ?>" class="theme-menu">
        <i class="fa fa-sign-out"></i> <span>Keluar</span>
    </a>
</li>
<?php $this->load->view('template/header'); ?>

<div class="box theme-card">

    <div class="box-header with-border">
        <h3 class="box-title">Ubah Password</h3>
    </div>

    <form class="form-horizontal"
          action="<?php echo site_url('admin/password'); ?>"
          method="post">

        <div class="box-body">

            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <?php echo $this->session->flashdata('sukses'); ?>

            <div class="form-group">
                <label class="col-sm-2 control-label">Password Lama</label>
                <div class="col-sm-4">
                    <input name="password"
                           type="password"
                           class="form-control"
                           required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Password Baru</label>
                <div class="col-sm-4">
                    <input name="password_baru"
                           type="password"
                           class="form-control"
                           required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Ulangi Password Baru</label>
                <div class="col-sm-4">
                    <input name="ulangi"
                           type="password"
                           class="form-control"
                           required>
                </div>
            </div>

        </div>

        <div class="box-footer text-center">

            <button type="submit"
                    name="save"
                    class="btn btn-primary">
                Simpan
            </button>

        </div>

    </form>

</div>

<?php $this->load->view('template/footer'); ?>
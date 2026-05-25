<?php $this->load->view('template/header'); ?>

<div class="box theme-card">

    <div class="box-header with-border">
        <h3 class="box-title">Ubah Data Subkriteria</h3>
    </div>

    <div class="box-body">

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <form class="form-horizontal" action="<?php echo site_url('subkriteria/ubah/' . $id_kriteria . '/' . $id_subkriteria); ?>" method="post">

            <!-- NAMA SUBKRITERIA -->
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Subkriteria</label>
                <div class="col-sm-6">
                    <input 
                        name="nama_subkriteria"
                        class="form-control"
                        required
                        type="text"
                        value="<?php echo set_value('nama_subkriteria', $nama_subkriteria); ?>">
                </div>
            </div>

            <!-- BOBOT -->
            <div class="form-group">
                <label class="col-sm-3 control-label">Bobot</label>
                <div class="col-sm-6">
                    <input 
                        name="bobot"
                        class="form-control"
                        required
                        type="number"
                        step="0.01"
                        value="<?php echo set_value('bobot', $bobot); ?>">
                </div>
            </div>

            <!-- ===================== FOOTER (DI DALAM FORM) ===================== -->
            <div class="box-footer text-center">

                <button type="submit" name="save" class="btn btn-success">
                    Simpan
                </button>

                <a href="<?php echo site_url('subkriteria/' . $id_kriteria); ?>" class="btn btn-default">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

<?php $this->load->view('template/footer'); ?>
<?php $this->load->view('template/header'); ?>

<div class="box theme-card">

    <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Subkriteria</h3>
    </div>

    <div class="box-body">

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <form class="form-horizontal" action="<?php echo site_url('subkriteria/tambah/' . $id_kriteria); ?>" method="post">

            <!-- ===================== NAMA SUBKRITERIA ===================== -->
            <div class="form-group">
                <label for="nama_subkriteria" class="col-sm-3 control-label">Nama Subkriteria</label>

                <div class="col-sm-6">
                    <input 
                        name="nama_subkriteria"
                        id="nama_subkriteria"
                        class="form-control"
                        required
                        type="text"
                        value="<?php echo set_value('nama_subkriteria'); ?>">
                </div>
            </div>

            <!-- ===================== BOBOT ===================== -->
            <div class="form-group">
                <label for="bobot" class="col-sm-3 control-label">Bobot</label>

                <div class="col-sm-6">
                    <input 
                        name="bobot"
                        id="bobot"
                        class="form-control"
                        required
                        type="number"
                        step="0.01"
                        value="<?php echo set_value('bobot'); ?>">
                </div>
            </div>

        </form>

    </div>

    <!-- ===================== FOOTER ===================== -->
    <div class="box-footer text-center">

        <button type="submit" name="save" class="btn btn-success">
            Simpan
        </button>

        <a href="<?php echo site_url('subkriteria/' . $id_kriteria); ?>" class="btn btn-default">
            Batal
        </a>

    </div>

</div>

<?php $this->load->view('template/footer'); ?>
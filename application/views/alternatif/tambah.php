<?php $this->load->view('template/header'); ?>

<div class="box theme-card">

    <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Alternatif</h3>
    </div>

    <div class="box-body">

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <form class="form-horizontal" action="<?php echo site_url('alternatif/tambah'); ?>" method="post">

            <!-- ===================== INPUT NAMA ===================== -->
            <div class="form-group">
                <label for="nama_alternatif" class="col-sm-3 control-label">Nama Alternatif</label>

                <div class="col-sm-6">
                    <input 
                        type="text"
                        name="nama_alternatif"
                        id="nama_alternatif"
                        class="form-control"
                        required
                        value="<?php echo set_value('nama_alternatif'); ?>">
                </div>
            </div>

            <hr>

            <!-- ===================== INPUT KRITERIA ===================== -->
            <?php foreach ($query as $row): ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        <?php echo $row->nama_kriteria; ?>
                    </label>

                    <div class="col-sm-6">
                        <select 
                            class="form-control"
                            name="kriteria<?php echo $row->id_kriteria; ?>"
                            required>

                            <option value="">Pilih...</option>

                            <?php foreach ($sub[$row->id_kriteria] as $row_sub): ?>
                                <option 
                                    value="<?php echo $row_sub->id_subkriteria; ?>"
                                    <?php echo set_select(
                                        'kriteria' . $row->id_kriteria,
                                        $row_sub->id_subkriteria
                                    ); ?>>
                                    <?php echo $row_sub->nama_subkriteria; ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>

            <?php endforeach; ?>

        </form>

    </div>

    <!-- ===================== FOOTER ===================== -->
    <div class="box-footer text-center">

        <button type="submit" name="save" class="btn btn-success">
            Simpan
        </button>

        <a href="<?php echo site_url('alternatif'); ?>" class="btn btn-default">
            Batal
        </a>

    </div>

</div>
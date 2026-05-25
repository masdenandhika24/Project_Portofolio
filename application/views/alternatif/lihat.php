<?php $this->load->view('template/header'); ?>

<div class="box theme-card">

    <div class="box-header with-border">
        <h3 class="box-title">Detail Data Alternatif</h3>
    </div>

    <div class="box-body">

        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <tr>
                    <td width="200"><b>Nama Alternatif</b></td>
                    <td><?php echo $nama_alternatif; ?></td>
                </tr>

                <?php foreach ($query as $row): ?>
                    <tr>
                        <td><b><?php echo $row->nama_kriteria; ?></b></td>
                        <td><?php echo $sub[$row->id_kriteria]; ?></td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>

    </div>

    <div class="box-footer text-center">
        <a href="<?php echo site_url('alternatif'); ?>" class="btn btn-default">
            Kembali
        </a>
    </div>

</div>
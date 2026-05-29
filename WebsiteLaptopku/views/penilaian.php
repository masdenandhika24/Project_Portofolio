<?php $this->load->view('template/header'); ?>

<div class="box theme-card">

    <div class="box-header with-border">
        <h3 class="box-title">Penilaian</h3>
    </div>

    <div class="box-body">

        <!-- ===================== TABEL 1 ===================== -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Alternatif</th>

                        <?php foreach ($query_kriteria as $row) : ?>
                        <th><?php echo $row->nama_kriteria; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($query_alt as $row) : ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row->nama_alternatif; ?></td>

                        <?php foreach ($query_kriteria as $row2) : ?>
                        <td class="text-center">
                            <?php echo $sub[$row->id_alternatif][$row2->id_kriteria]; ?>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        <br>

        <!-- ===================== TABEL 2 ===================== -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Alternatif</th>

                        <?php foreach ($query_kriteria as $row) : ?>
                        <th><?php echo $row->kode_kriteria; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($query_alt as $row) : ?>
                    <tr>
                        <td><?php echo $row->nama_alternatif; ?></td>

                        <?php foreach ($query_kriteria as $row2) : ?>
                        <td class="text-center">
                            <?php echo $bobot[$row->id_alternatif][$row2->id_kriteria]; ?>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        <br>

        <!-- ===================== RUMUS ===================== -->
        <?php echo $rumus; ?>

        <br>

        <h3 class="page-header">Hasil</h3>

        <!-- ===================== HASIL ===================== -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Alternatif</th>
                        <th>Nilai</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($hasil as $row) : ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['nama_alternatif']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

            <br>

            <a href="<?php echo site_url('penilaian/pdf'); ?>" target="_blank" class="btn btn-default">
                <img src="<?php echo base_url('assets/images/pdf.png'); ?>">
                &nbsp; Export ke PDF
            </a>

        </div>

    </div>

</div>
<?php $this->load->view('template/header'); ?>

<div class="box theme-card">

    <div class="box-header with-border">
        <h3 class="box-title">Data Subkriteria</h3>
    </div>

    <div class="box-body">

        <!-- ===================== INFO KRITERIA ===================== -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <tr>
                    <td width="200"><b>Nama Kriteria</b></td>
                    <td><?php echo $kode_kriteria . " - " . $nama_kriteria; ?></td>
                </tr>

                <tr>
                    <td><b>Bobot</b></td>
                    <td><?php echo $bobot; ?></td>
                </tr>

                <tr>
                    <td><b>Tipe</b></td>
                    <td><?php echo $tipe; ?></td>
                </tr>

                <tr>
                    <td></td>
                    <td>

                        <a href="<?php echo site_url('kriteria'); ?>" class="btn btn-default">
                            Kembali
                        </a>

                        <a href="<?php echo site_url('subkriteria/tambah/' . $id_kriteria); ?>" class="btn btn-primary">
                            Tambah Subkriteria
                        </a>

                    </td>
                </tr>

            </table>
        </div>

        <br>

        <!-- ===================== TABLE SUBKRITERIA ===================== -->
        <div class="table-responsive">

            <table class="table table-bordered table-striped" id="dataTables1">

                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Subkriteria</th>
                        <th>Bobot</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach ($query as $row): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->nama_subkriteria; ?></td>
                            <td><?php echo $row->bobot; ?></td>
                            <td>

                                <a href="<?php echo site_url('subkriteria/ubah/' . $id_kriteria . '/' . $row->id_subkriteria); ?>"
                                   class="btn btn-success btn-xs">
                                    Ubah
                                </a>

                                <a href="#"
                                   data-href="<?php echo site_url('subkriteria/hapus/' . $id_kriteria . '/' . $row->id_subkriteria); ?>"
                                   data-toggle="modal"
                                   data-target="#confirm-delete"
                                   class="btn btn-danger btn-xs">
                                    Hapus
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $this->load->view('template/footer'); ?>
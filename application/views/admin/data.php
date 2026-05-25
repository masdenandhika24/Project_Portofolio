<?php $this->load->view('template/header'); ?>

<div class="box theme-card">

    <div class="box-header with-border">

        <h3 class="box-title">Data Admin</h3>

        <div class="box-tools">
            <a href="<?php echo site_url('admin/tambah'); ?>" class="btn btn-primary">
                Tambah Admin
            </a>
        </div>

    </div>

    <div class="box-body">

        <div class="table-responsive">

            <table class="table table-striped table-bordered" id="dataTables1">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th width="80">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($query as $row) : ?>
                    <tr>

                        <td><?php echo $no++; ?></td>

                        <td><?php echo $row->username; ?></td>

                        <td>
                            <?php if ($row->username != "admin") { ?>

                                <a href="<?php echo site_url('admin/ubah/' . $row->id_admin); ?>"
                                   class="btn btn-success btn-xs">
                                   Ubah
                                </a>

                                <a href="#"
                                   data-href="<?php echo site_url('admin/hapus/' . $row->id_admin); ?>"
                                   data-toggle="modal"
                                   data-target="#confirm-delete"
                                   class="btn btn-danger btn-xs">
                                   Hapus
                                </a>

                            <?php } else { ?>
                                <span class="label label-primary">Default</span>
                            <?php } ?>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>

    </div>

</div>
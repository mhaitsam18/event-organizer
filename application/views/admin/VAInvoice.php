<div class="main-content" id="panel">
    <?php $this->load->view('admin/layouts/VANavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">All ticket data here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header border-0">
                        <h4 class="mb-0">Invoice</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Nama Event</th>
                                    <th class="text-center">ID Invoice</th>
                                    <th class="text-center">Nama User</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Total Harga</th>
                                    <th class="text-center">File</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php if ($invoice) { ?>
                                    <?php foreach ($invoice as $ev) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $ev->nama_event ?></td>
                                            <td class="text-center"><?php echo $ev->token ?></td>
                                            <td class="text-center"><?php echo $ev->nama_user ?></td>
                                            <td class="text-center"><?php echo $ev->jumlah ?></td>
                                            <td class="text-center"> Rp <?php echo number_format($ev->total) ?></td>
                                            <?php if($ev->file){ ?>
                                            <td class="text-center">
                                                <a href="<?php echo base_url() ?>assets/images/invoice/<?php echo $ev->file ?>" class="badge badge-success">
                                                    <i class="ni ni-collection"></i>
                                                </a>
                                            </td>
                                            <?php }else{ ?>
                                            <td class ="text-center">-</td>
                                            <?php } ?>
                                            <td class="text-center">
                                                <?php if ($ev->status == '1') { ?>
                                                    <span class="badge badge-warning">Unpaid</span>
                                                <?php } else if ($ev->status == '2') { ?>
                                                    <span class="badge badge-warning">Under verivication</span>
                                                <?php } else if ($ev->status == '3') { ?>
                                                    <span class="badge badge-info">Lunas</span>
                                                <?php } else if ($ev->status == '4') { ?>
                                                    <span class="badge badge-danger">Dibatalkan</span>
                                                <?php } else if ($ev->status == '5') { ?>
                                                    <span class="badge badge-danger">Refund Berhasil</span>
                                                <?php } else if ($ev->status == '6') { ?>
                                                    <span class="badge badge-danger">Refund Diajukan</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td class="text-center" colspan="5">No Data Found</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
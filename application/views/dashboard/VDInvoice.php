<div class="main-content" id="panel">
    <?php $this->load->view('dashboard/layouts/VDNavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">Your invoice here</p>
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
                                    <th class="text-center">Tgl Beli</th>
                                    <th class="text-center">Jumlah Tiket</th>
                                    <th class="text-center">Total Harga</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Alasan Refund</th>
                                    <th class="text-center">Alasan Refund Ditolak</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php if ($myEvent) { ?>
                                    <?php foreach ($myEvent as $ev) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <a href="/invoice/detail/<?php echo $ev->token ?>">
                                                    <?php echo $ev->nama_event ?>
                                                </a>
                                            </td>
                                            <td class="text-center"><?php echo $ev->token ?></td>
                                            <td class="text-center"><?php echo date("l, d M Y H:s:i", strtotime($ev->created_at)) ?></td>
                                            <td class="text-center"><?php echo $ev->jumlah ?></td>
                                            <td class="text-center"> Rp <?php echo number_format($ev->total) ?></td>
                                            <td class="text-center">
                                                <?php if ($ev->status == '1') { ?>
                                                    <span class="badge badge-warning">Unpaid</span>
                                                <?php } else if ($ev->status == '2') { ?>
                                                    <span class="badge badge-info">Waiting Approve</span>
                                                <?php } else if ($ev->status == '3') { ?>
                                                    <span class="badge badge-success">Lunas</span>
                                                    <a href="/dashboard/invoice/refund/<?php echo $ev->token ?>" class="badge badge-warning">Ajukan Refund</a>
                                                <?php } else if ($ev->status == '4') { ?>
                                                    <span class="badge badge-danger">Dibatalkan</span>
                                                <?php } else if ($ev->status == '5') { ?>
                                                    <span class="badge badge-danger">Refund Selesai</span>
                                                <?php } else if ($ev->status == '6') { ?>
                                                    <span class="badge badge-danger">Refund Diajukan</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($ev->alasan_refund) { ?>
                                                    <?php echo $ev->alasan_refund ?>
                                                <?php } else { ?>
                                                    -
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($ev->alasan_terima_tolak) { ?>
                                                    <?php echo $ev->alasan_terima_tolak ?>
                                                <?php } else { ?>
                                                    -
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
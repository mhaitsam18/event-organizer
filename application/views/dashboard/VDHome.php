<div class="main-content" id="panel">
    <?php $this->load->view('dashboard/layouts/VDNavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">Your statistics here</p>
                    </div>
                </div>
                <div class="owl-card owl-carousel owl-theme">
                    <div class="item">
                        <div class="card card-stats bg-success">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-white mb-0">Tickets</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white"><?php echo count($ticket) ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-success rounded-circle shadow">
                                            <i class="ni ni-tag"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="/dashboard/ticket" class="text-white">
                                        <span class="text-nowrap">Check All Tickets</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Invoice</h5>
                                        <span class="h3 font-weight-bold mb-0"><?php echo count($myEvent) ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="/dashboard/invoice" class="text-default">
                                        <span class="text-nowrap">Invoice</span>
                                    </a>
                                </p>
                            </div>
                        </div>
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
                                    <th class="text-center">Tagl Beli</th>
                                    <th class="text-center">Jumlah Tiket</th>
                                    <th class="text-center">Total Harga</th>
                                    <th class="text-center">Status</th>
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
                                                <?php } else if ($ev->status == '4') { ?>
                                                    <span class="badge badge-danger">Dibatalkan</span>
                                                <?php } else if ($ev->status == '5') { ?>
                                                    <span class="badge badge-danger">Refund</span>
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

<script>
    (function($) {
        $(function() {
            $('.owl-card').owlCarousel({
                margin: 20,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                        loop: true
                    },
                    600: {
                        items: 2,
                        nav: false,
                        loop: true
                    },
                    1000: {
                        items: 4,
                        nav: false,
                        loop: false
                    }
                }
            })
        });
    })(jQuery);
</script>
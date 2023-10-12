<div class="main-content" id="panel">
    <?php $this->load->view('admin/layouts/VANavbar'); ?>
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
                                        <h5 class="card-title text-uppercase text-white mb-0">Event</h5>
                                        <span class="h2 font-weight-bold text-white mb-0"><?php echo count($event) ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-success rounded-circle shadow">
                                            <i class="ni ni-air-baloon"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="/admin/event" class="text-white">
                                        <span class="text-nowrap">Check All Event</span>
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Tickets</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo count($ticket) ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                            <i class="ni ni-tag"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="/admin/ticket" class="text-default">
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Organizer</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo count($organizer) ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                            <i class="ni ni-favourite-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="/admin/organizer" class="text-default">
                                        <span class="text-nowrap">Check All Organizer</span>
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">User</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo count($user) ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                            <i class="ni ni-circle-08"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="/admin/user" class="text-default">
                                        <span class="text-nowrap">Check All User</span>
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
                        <h4 class="mb-0">Waiting & Ongoing Event</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Event Title</th>
                                    <th class="text-center">Venue</th>
                                    <th class="text-center">Due Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php if ($event) { ?>
                                    <?php foreach ($event as $ev) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <a class="text-default" href="/admin/event/detail/<?php echo $ev->token ?>">
                                                    <?php echo $ev->name ?>
                                                </a>
                                            </td>
                                            <td class="text-center"><?php echo $ev->venue ?></td>
                                            <td class="text-center"><?php echo date("l, d M Y", strtotime($ev->due_date)) ?></td>
                                            <td class="text-center"><?php echo $ev->time ?></td>
                                            <td class="text-center">
                                                <?php if ($ev->status == '1') { ?>
                                                    <span class="badge badge-info">Waiting</span>
                                                <?php } else if ($ev->status == '2') { ?>
                                                    <span class="badge badge-success">Approved</span>
                                                <?php } else if ($ev->status == '3') { ?>
                                                    <span class="badge badge-danger">Rejected</span>
                                                <?php } else if ($ev->status == '4') { ?>
                                                    <span class="badge badge-success">Success</span>
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
                    <div class="card-footer py-4">
                        <a href="/admin/event" class="btn btn-sm btn-success">All Event</a>
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
<div class="main-content" id="panel">
    <?php $this->load->view('organizer/layouts/VONavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">Your event here</p>
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
                        <h4 class="mb-0">Your Event</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Event Title</th>
                                    <th class="text-center">Venue</th>
                                    <th class="text-center">Due Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Kuota</th>
                                     <th classs="text-center">Tickets Sale</th>
                                    <th classs="text-center">Revenue</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php if ($myEvent) { ?>
                                    <?php foreach ($myEvent as $ev) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <a class="text-default" href="/organizer/event/detail/<?php echo $ev->token ?>">
                                                    <?php echo $ev->name ?>
                                                </a>
                                            </td>
                                            <td class="text-center"><?php echo $ev->venue ?></td>
                                            <td class="text-center"><?php echo date("l, d M Y", strtotime($ev->due_date)) ?></td>
                                            <td class="text-center"><?php echo $ev->time ?></td>
                                            <td class="text-center"><?php echo $ev->quota ?></td>
                                            <td class ="text-center"><?php echo $ev->tikets ?></td>
                                            <td class ="text-center">Rp <?php echo number_format($ev->revenue) ?> </td>
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

                                                

                                                <a href="/organizer/event/delete/<?php echo $ev->id ?>" class="badge badge-danger">
                                                    <i class="ni ni-scissors"></i>
                                                </a>
                                                
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
                        <a href="/organizer/event/create" class="btn btn-sm btn-success">Create Event</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
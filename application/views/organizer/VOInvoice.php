<div class="main-content" id="panel">
    <?php $this->load->view('organizer/layouts/VONavbar'); ?>
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
                                    <th class="text-center">Token</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php if ($event) { ?>
                                    <?php foreach ($event as $ev) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <a class="text-default" href="/organizer/invoice/detail/<?php echo $ev->id ?>">
                                                    <?php echo $ev->name ?>
                                                </a>
                                            </td>
                                            <td class="text-center"><?php echo $ev->token ?></td>
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
                                        <td class="text-center" colspan="4">No Data Found</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <a href="/organizer" class="btn btn-sm btn-success">Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
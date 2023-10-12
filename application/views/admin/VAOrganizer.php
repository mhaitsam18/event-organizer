<div class="main-content" id="panel">
    <?php $this->load->view('admin/layouts/VANavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">All organizer data here</p>
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
                        <h4 class="mb-0">Organizer Data</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Phone</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php if ($organizer) { ?>
                                    <?php foreach ($organizer as $o) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <a class="text-default" href="/admin/organizer/detail/<?php echo $o->id ?>">
                                                    <?php echo $o->name ?>
                                                </a>
                                            </td>
                                            <td class="text-center"><?php echo date("d M Y", strtotime($o->created_at)) ?></td>
                                            <td class="text-center"><?php echo $o->address ?></td>
                                            <td class="text-center"><?php echo $o->phone ?></td>
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
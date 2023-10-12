<div class="main-content" id="panel">
    <?php $this->load->view('admin/layouts/VANavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">All user data here</p>
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
                        <h4 class="mb-0">User Data</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Level</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php if ($users) { ?>
                                    <?php foreach ($users as $u) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $u->name ?></td>
                                            <td class="text-center"><?php echo date("d M Y", strtotime($u->created_at)) ?></td>
                                            <td class="text-center"><?php echo $u->username ?></td>
                                            <td class="text-center">
                                                <?php if ($u->level == '2') { ?>
                                                    <span class="badge badge-info">Organizer</span>
                                                <?php } else if ($u->level == '3') { ?>
                                                    <span class="badge badge-success">User</span>
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
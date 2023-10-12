<div class="main-content" id="panel">
    <?php $this->load->view('dashboard/layouts/VDNavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">Your profile here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="p-lg-3">
                            <h4>User Profile :</h4>
                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Your Name</label>
                                        <input type="text" class="form-control" value="<?php echo $this->session->userdata('name') ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Username</label>
                                        <input type="text" class="form-control" value="<?php echo $this->session->userdata('username') ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>Contact :</h4>
                            <form method="post" class="mt-4" action="/dashboard/profile/updateBio" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Phone</label>
                                            <input type="number" name="phone" class="form-control" value="<?php echo $this->session->userdata('phone') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <input type="submit" name="submit" value="Update Biometric" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
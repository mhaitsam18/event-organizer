<div class="main-content" id="panel">
    <?php $this->load->view('organizer/layouts/VONavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Organizer Profile</h2>
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
                            <h4>Contact & Biometric :</h4>
                            <form method="post" class="mt-4" action="/organizer/profile/updateBio" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Phone</label>
                                            <input type="number" name="phone" class="form-control" value="<?php echo $this->session->userdata('phone') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">KTP</label>
                                            <input type="number" name="ktp" class="form-control" value="<?php echo $this->session->userdata('ktp') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <input type="submit" name="submit" value="Update Biometric" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <?php if (!$this->session->userdata('foto_ktp')) { ?>
                                <form method="post" action="/organizer/profile/ktp" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">SK Organisasi</label>
                                                <input type="file" name="picture" class="form-control" required>
                                                <small>Data must be less than 1 MB</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <input type="submit" name="submit" value="Add SK Organisasi" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            <?php } else { ?>
                                <p>SK Organisasi :</p>
                                <img class="rounded" src="<?php echo base_url() ?>/assets/images/profil/<?php echo $this->session->userdata('foto_ktp') ?>" style="max-width:300px;">
                            <?php } ?>
                            <hr>
                            <h4>Organizer Profile :</h4>
                            <form method="post" class="mt-4" action="/organizer/profile/update" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Organizer Name</label>
                                            <input type="text" name="name" class="form-control" value="<?php if(isset($org[0]->name)) { echo $org[0]->name; } ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Official Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php if(isset($org[0]->email)) { echo $org[0]->email; } ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">About Organizer</label>
                                            <textarea rows="4" name="detail" class="form-control" required><?php if(isset($org[0]->detail)) { echo $org[0]->detail; } ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Address</label>
                                            <input type="text" name="address" class="form-control" value="<?php if(isset($org[0]->address)) { echo $org[0]->address; } ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Phone</label>
                                            <input type="number" name="phone" class="form-control" value="<?php if(isset($org[0]->phone)) { echo $org[0]->phone; } ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <input type="submit" name="submit" value="Update Data" class="btn btn-success">
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
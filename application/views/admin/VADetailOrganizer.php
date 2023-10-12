<div class="main-content" id="panel">
    <?php $this->load->view('admin/layouts/VANavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">Organizer data here</p>
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
                        <div class="p-lg-4">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <h2><?php echo $org[0]->name ?></h2>
                                    <p>Created At : <?php echo date("l, d M Y", strtotime($org[0]->created_at)) ?></p>
                                </div>
                                <div class="col-12 mt-4">
                                    <p class="mt-2">
                                        <strong>Detail</strong> :<br>
                                        <?php echo $org[0]->detail ?>
                                    </p>
                                    <p class="mt-4"><strong>Address</strong> : <?php echo $org[0]->address ?></p>
                                    <p class="mt-4"><strong>Phone</strong> : <?php echo $org[0]->phone ?></p>
                                    <p class="mt-4"><strong>Email</strong> : <?php echo $org[0]->email ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
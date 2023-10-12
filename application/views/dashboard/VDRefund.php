<div class="main-content" id="panel">
    <?php $this->load->view('dashboard/layouts/VDNavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">Refund here</p>
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
                            <p>Nama Pemesan : <?php echo $cek[0]->nama_user ?></p>
                            <p>Jumlah : <?php echo $cek[0]->jumlah ?> tiket</p>
                            <form method="post" class="mt-4" action="/dashboard/invoice/dorefund/<?php echo $cek[0]->token ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Alasan Refund</label>
                                            <textarea name="alasan" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">No Rek Bank</label>
                                            <input name="norek" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Nama Bank</label>
                                            <input name="bank" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <input type="submit" name="submit" value="Ajukan Refund" class="btn btn-success">
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
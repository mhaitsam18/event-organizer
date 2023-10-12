<div class="main-content" id="panel">
    <?php $this->load->view('organizer/layouts/VONavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">Refund Here</p>
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
                            <p>Alasan Refund : <?php echo $cek[0]->alasan_refund ?></p>
                            <?php if ($cek[0]->status == '6') { ?>
                                <form method="post" class="mt-4" action="/organizer/invoice/dorefund/<?php echo $cek[0]->token ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Terima / Tolak</label>
                                                <select name="terima" class="form-control" required>
                                                    <option value="5">Terima</option>
                                                    <option value="3">Tolak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Alasan</label>
                                                <textarea name="alasan" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            <?php } else if ($cek[0]->status == 5) { ?>
                                <p>Status Refund : Diterima</p>
                                <p>Alasan : <?php echo $cek[0]->alasan_terima_tolak ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
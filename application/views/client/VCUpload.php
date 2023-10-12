<header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image: url(<?php echo base_url() ?>/assets/images/home/party.jpg)">
    <div class="overlay"></div>
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 text-left">
                <div class="row">
                    <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                        <h1 style="padding-top:50px;">Invoice</h1>
                        <p style="color: #ffffff !important;">Number : <?php echo $data[0]->token ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-3">
                <h3>Upload Bukti</h3>
                <p>Upload bukti pembayaran kamu disini.</p>
            </div>
            <div class="col-md-8 col-md-offset-1">
                <?php if ($this->session->flashdata()) { ?>
                    <p style="color:red;">Oooops, waktu pembayaran anda sudah berakhir. Silahkan order tiket baru</p>
                <?php } ?>
                <form action="/invoice/doupload/<?php echo $data[0]->token ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <label><small>Nama Kamu :</small></label>
                            <input name="name" value="<?php echo $this->session->userdata('name') ?>" class="form-control" readonly>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group p-top-20">
                                <label class="form-control-label" for="input-username">Bukti Pembayaran</label>
                                <input type="file" name="picture" class="form-control" required>
                                <small>Data must be less than 1 MB</small>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <input type="submit" name="submit" value="Kirim Bukti" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
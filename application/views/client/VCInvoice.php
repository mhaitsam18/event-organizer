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
                <h3>Payment</h3>
                <?php if ($data[0]->status == 1) { ?>
                    <p>Jika sudah melakukan pembayaran, klik upload bukti bayar dibawah ini.</p>
                    <a href="/invoice/upload/<?php echo $data[0]->token ?>" class="btn btn-md btn-primary btn-block">
                        Upload Bukti Bayar
                    </a>
                <?php } elseif ($data[0]->status == 2) { ?>
                    <p class="p-top-20">
                        Pembayaran kamu sudah kami terima dan sedang kami verifikasi
                    </p>
                <?php } ?>
            </div>
            <div class="col-md-8 col-md-offset-1">
                <h4><strong>Nama Pemesan</strong> : <?php echo $data[0]->nama_user ?></h4>
                <h4><strong>Jumlah Tiket</strong> : <?php echo $data[0]->jumlah ?></h4>
                <h4><strong>Total pembayaran</strong> : Rp <?php echo number_format($data[0]->total) ?></h4>
                <?php if ($data[0]->status == 1) { ?>
                    <p class="p-top-20">
                        Silahkan lakukan pembayaran melalui kanal berikut sebelum
                        <strong>
                            <?php echo date("d M Y H:i:s", strtotime($data[0]->due_date)) ?>
                        </strong>. Jika sudah, silahkan upload bukti bayar.
                    </p>
                    <?php if ($data[0]->payment_type == 1) { ?>
                        <img src="<?php echo base_url() ?>assets/images/home/qr.jpg" style="width:100%; max-width: 300px;">
                        <p>scan QR berikut melalui aplikasi Gopay, OVO, atau Dana</p>
                    <?php } else { ?>
                        <p>
                            <strong>Nomor Rekening : <?php echo $pt[0]->number ?></strong><br>
                            <strong>Nama Bank : <?php echo $pt[0]->bank ?></strong>
                        </p>
                    <?php } ?>
                <?php } elseif ($data[0]->status == 2) { ?>
                    <p class="p-top-20">
                        Pembayaran kamu sudah kami terima dan sedang kami verifikasi. Silahkan tunggu maksimal 1 x 24 jam.
                        E-Ticket bisa dicetak melalui laman dashboard anda
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image: url(<?php echo base_url() ?>/assets/images/event/<?php echo $event[0]->picture ?>)">
    <div class="overlay"></div>
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 text-left">
                <div class="row">
                    <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                        <h1 style="padding-top:50px;"><?php echo $event[0]->name ?></h1>
                        <p style="color: #ffffff !important;"><?php echo $event[0]->venue ?> - <?php echo date("l, d M Y", strtotime($event[0]->due_date)) ?> - <?php echo $event[0]->time ?></p>
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
                <img src="<?php echo base_url() ?>/assets/images/event/<?php echo $event[0]->picture ?>" style="width:100%; padding-bottom:20px;">
                <h3>Get Ticket Here</h3>
                <p>Get the event, join other people like you, and ahve a nice day here</p>
                <a id="orderButton" class="btn btn-md btn-primary btn-block">
                    Buy Rp <?php echo number_format($event[0]->price) ?>
                </a>
                <a id="cencelButton" class="btn btn-md btn-black btn-block">
                    Cencel
                </a>
            </div>
            <div id="overview" class="col-md-8 col-md-offset-1">
                <p>
                    <span class="text-black"><strong>Event Name :</strong></span><br>
                    <?php echo $event[0]->name ?>
                </p>
                <p>
                    <span class="text-black"><strong>Detail Event :</strong></span><br>
                    <?php echo $event[0]->detail ?>
                </p>
                <p>
                    <span class="text-black"><strong>Date Time :</strong></span><br>
                    <?php echo date("l, d M Y", strtotime($event[0]->due_date)) ?>
                    -
                    <?php echo date("h:i", strtotime($event[0]->time)) ?>
                </p>
                <p>
                    <span class="text-black"><strong>Venue :</strong></span><br>
                    <?php echo $event[0]->venue ?><br>
                    <a href="<?php echo $event[0]->maps ?>">view in maps</a>
                </p>
                <p>Kebijakan refund : refund maksimal H-2 acara</p>
                <?php if ($sponsor) { ?>
                    <p>
                        <span class="text-black"><strong>Sponsor :</strong></span><br>
                        <?php foreach ($sponsor as $s) { ?>
                            <?php echo $s->name ?><br>
                        <?php } ?>
                    </p>
                <?php } ?>
            </div>
            <div id="order" class="col-md-8 col-md-offset-1">
                <div class="animate-box">
                    <?php if ($this->session->userdata('auth') == TRUE) { ?>
                        <?php if ($this->session->userdata('level') == '3') { ?>
                            <p>
                                <strong>Order Tiket :</strong><br>
                                Silahkan isi data berikut untuk melakukan pembelian tiket :
                            </p>
                            <form action="/event/order" method="post" class="p-top-20">
                                <input name="id_user" value="<?php echo $this->session->userdata('id') ?>" hidden>
                                <input name="nama_user" value="<?php echo $this->session->userdata('name') ?>" hidden>
                                <input name="id_event" value="<?php echo $event[0]->id ?>" hidden>
                                <input name="harga" value="<?php echo $event[0]->price ?>" hidden>
                                <input name="quota" value="<?php echo $event[0]->quota ?>" hidden>
                                <input name="nama_event" value="<?php echo $event[0]->name ?>" hidden>
                                <input name="id_penyelenggara" value="<?php echo $event[0]->id_user ?>" hidden>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label><small>Nama Kamu :</small></label>
                                        <input name="name" value="<?php echo $this->session->userdata('name') ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row form-group m-top-10">
                                    <div class="col-md-12">
                                        <label><small>Jumlah Tiket :</small></label>
                                        <select name="jumlah" class="form-control" required>
                                            <option value="1">1 Tiket Rp <?php echo number_format($event[0]->price * 1) ?></option>
                                            <option value="2">2 Tiket Rp <?php echo number_format($event[0]->price * 2) ?></option>
                                            <option value="3">3 Tiket Rp <?php echo number_format($event[0]->price * 3) ?></option>
                                            <option value="4">4 Tiket Rp <?php echo number_format($event[0]->price * 4) ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group m-top-10">
                                    <div class="col-md-6">
                                        <label><small>Metode Pembayaran :</small></label>
                                        <select name="payment_type" class="form-control" required>
                                            <?php foreach ($payment_type as $pt) { ?>
                                                <option value="<?php echo $pt->id ?>"><?php echo $pt->nama ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group p-top-20">
                                    <input type="submit" name="submit" value="Pay Now" class="btn btn-primary">
                                    <a id="cencelButton2" class="btn btn-md btn-black">
                                        Cencel
                                    </a>
                                </div>
                            </form>
                        <?php } else { ?>
                            <div class="alert alert-warning" role="alert">
                                Oops. organizer dan administrator tidak bisa memesan tiket.
                                Silahkan masuk menggunakan akun user
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="alert alert-success" role="alert">
                            Oops. Kamu harus login sebelum memesan tiket. Silahkan masuk
                            <a href="/login"><strong>disini</strong></a>
                        </div>
                        <p>
                            <span class="text-black"><strong>Event Name :</strong></span><br>
                            <?php echo $event[0]->name ?>
                        </p>
                        <p>
                            <span class="text-black"><strong>Detail Event :</strong></span><br>
                            <?php echo $event[0]->detail ?>
                        </p>
                    <?php }  ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function($) {
        $(function() {
            $('#order').hide();
            $('#cencelButton').hide();
            $('#orderButton').click(function() {
                $('#overview').hide();
                $('#orderButton').hide();
                $('#cencelButton').show();
                $('#order').show();
            });
            $('#cencelButton').click(function() {
                $('#overview').show();
                $('#orderButton').show();
                $('#cencelButton').hide();
                $('#order').hide();
            });
            $('#cencelButton2').click(function() {
                $('#overview').show();
                $('#orderButton').show();
                $('#cencelButton').hide();
                $('#order').hide();
            });
        });
    })(jQuery);
</script>
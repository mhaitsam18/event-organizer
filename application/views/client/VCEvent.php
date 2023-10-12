<header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image: url(<?php echo base_url() ?>/assets/images/home/party.jpg)">
    <div class="overlay"></div>
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 text-left">
                <div class="row">
                    <div class="col-md-6 mt-text animate-box" data-animate-effect="fadeInUp">
                        <h1 style="padding-top:50px;">All Event</h1>
                        <p>Join other people like you</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <?php if ($event) { ?>
                <?php foreach ($event as $ev) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <a href="/event/detail/<?php echo $ev->token ?>" class="fh5co-card-item">
                            <figure>
                                <div class="overlay"><i class="ti-plus"></i></div>
                                <img src="<?php echo base_url() ?>/assets/images/event/<?php echo $ev->picture ?>" class="img-responsive">
                            </figure>
                            <div class="fh5co-text">
                                <h2><?php echo $ev->name ?></h2>
                                <p>
                                    <?php echo $ev->venue ?> - <?php echo date("l, d M Y", strtotime($ev->due_date)) ?><br>
                                    <strong>Rp <?php echo $ev->price ?></strong>
                                </p>
                                <p><span class="btn btn-primary">Detail Event</span></p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="text-center" style="padding-top:50px; padding-bottom:100px;">
                    <p>No Event Found</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
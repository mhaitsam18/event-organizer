<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(<?php echo base_url() ?>/assets/images/home/party.jpg)">
    <div class="overlay"></div>
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 text-left">
                <div class="row row-mt-15em">
                    <div class="col-md-6 mt-text animate-box" data-animate-effect="fadeInUp">
                        <h1>Easy Create & Join Event Anywhere Anytime</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                <h2>Latest Event</h2>
                <p>
                    Join & Have a Good Time With Another People Like You
                </p>
            </div>
        </div>
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
                                    <?php echo $ev->venue ?> <br> <?php echo date("l, d M Y", strtotime($ev->due_date)) ?><br>
                                    <strong>Rp <?php echo number_format($ev->price) ?></strong>
                                </p>
                                <p><span class="btn btn-primary">Detail Event</span></p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="text-center" style="margin-top:60px;">
                        <a href="/event" class="btn btn-sm btn-primary">Search More Event</a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="text-center" style="padding-top:50px; padding-bottom:100px;">
                    <p>No Event Found</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div id="gtco-features">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                <h2>How It Works</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                    provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
                    <span class="icon">
                        <i>1</i>
                    </span>
                    <h3>Search Event</h3>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                        provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
                    <span class="icon">
                        <i>2</i>
                    </span>
                    <h3>Buy Tickets</h3>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                        provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
                    <span class="icon">
                        <i>3</i>
                    </span>
                    <h3>Join The Party</h3>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                        provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer id="gtco-footer" role="contentinfo">
    <div class="gtco-container">
        <div class="row row-p	b-md">

            <div class="col-md-4">
                <div class="gtco-widget">
                    <h3>About <strong>Eventku</strong></h3>
                    <p>
                        Eventku is a ticketing platform that allow you to create, promote, sell e ticket,
                        and join event for easy.
                    </p>
                </div>
            </div>

            <div class="col-md-2 col-md-push-1">
            </div>

            <div class="col-md-2 col-md-push-1">
                <div class="gtco-widget">
                    <h3>More Page</h3>
                    <ul class="gtco-footer-links">
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Signup</a></li>
                        <li><a href="#">Search Event</a></li>
                        <li><a href="#">Telkom University</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-md-push-1">
                <div class="gtco-widget">
                    <h3>Get In Touch</h3>
                    <ul class="gtco-quick-contact">
                        <li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
                        <li><a href="#"><i class="icon-mail2"></i> aviffahprincess@gmail.com</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="row copyright">
            <div class="col-md-12">
                <p class="pull-left">
                    <small class="block">&copy; 2021 <a>Aviffah</a> and <a>Risma</a> from Telkom University</small>
                    <small class="block">For our Final Assignment</small>
                </p>
                <p class="pull-right">
                <ul class="gtco-social-icons pull-right">
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                </ul>
                </p>
            </div>
        </div>

    </div>
</footer>
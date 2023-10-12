<nav class="gtco-nav" role="navigation">
    <div class="gtco-container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div id="gtco-logo"><a href="/">Eventku <em>.</em></a></div>
            </div>
            <div class="col-xs-8 text-right menu-1">
                <ul>
                    <li><a href="/event">Popular Event</a></li>
                    <li><strong>|</strong></li>
                    <?php if ($this->session->userdata('auth') == TRUE) { ?>
                        <li class="has-dropdown">
                            <a href="#"><?php echo $this->session->userdata('name'); ?></a>
                            <ul class="dropdown">
                                <?php if ($this->session->userdata('level') == '3') { ?>
                                    <li><a href="/dashboard">Dashboard</a></li>
                                    <li><a href="/dashboard/profile">Profile</a></li>
                                <?php } elseif ($this->session->userdata('level') == '2') { ?>
                                    <li><a href="/organizer">Organizer</a></li>
                                    <li><a href="/organizer/profile">Profile</a></li>
                                <?php } elseif ($this->session->userdata('level') == '1') { ?>
                                    <li><a href="/admin">Admin</a></li>
                                <?php } ?>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li><a href="<?= base_url('/login') ?>">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

    </div>
</nav>
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <h4 class="text-success">Administrator<br> Eventku</h4>
            </a>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown mb-3 mt-2">
                        <div class="nav-link pr-0">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="<?php echo base_url() ?>/assets/images/profil/ava.svg">
                                </span>
                                <div class="media-body  ml-3">
                                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $this->session->userdata('name'); ?></span><br>
                                    <small><span class="mb-0 mt-0 pb-0 pt-0">Administrator</span></small>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">
                            <i class="ni ni-app text-success"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/event">
                            <i class="ni ni-air-baloon text-success"></i>
                            <span class="nav-link-text">Event</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/ticket">
                            <i class="ni ni-tag text-success"></i>
                            <span class="nav-link-text">Tickets</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/invoice">
                            <i class="ni ni-chart-bar-32 text-success"></i>
                            <span class="nav-link-text">Invoice</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/user">
                            <i class="ni ni-circle-08 text-success"></i>
                            <span class="nav-link-text">User</span>
                        </a>
                    </li>
                </ul>
                <hr class="my-3">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <i class="ni ni-button-power text-success"></i>
                            <span class="nav-link-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
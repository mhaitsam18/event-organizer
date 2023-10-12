<div class="main-content" id="panel">
    <?php $this->load->view('admin/layouts/VANavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">Your event here</p>
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
                                <div class="col-md-2 col-12">
                                    <a href="/blog/change-image/{{ $blog->slug }}">
                                        <img class="rounded" src="<?php echo base_url() ?>/assets/images/event/<?php echo $event[0]->picture ?>" width="100%">
                                    </a>
                                </div>
                                <div class="col-md-10 col-12">
                                    <h2><?php echo $event[0]->name ?></h2>
                                    <p><?php echo $event[0]->venue ?> - <?php echo date("l, d M Y", strtotime($event[0]->due_date)) ?> - <?php echo $event[0]->time ?></p>
                                    <div>
                                        <?php if ($event[0]->status == '1') { ?>
                                            <span class="badge badge-info">Waiting</span>
                                        <?php } else if ($event[0]->status == '2') { ?>
                                            <span class="badge badge-success">Approved</span>
                                        <?php } else if ($event[0]->status == '3') { ?>
                                            <span class="badge badge-danger">Rejected</span>
                                        <?php } else if ($event[0]->status == '4') { ?>
                                            <span class="badge badge-success">Success</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <a href="<?php echo base_url() ?>/admin/organizer/detail/<?php echo $event[0]->id_penyelenggara ?>" class="mt-2">
                                            Detail penyelenggara
                                    </a>
                                    <p class="mt-2">
                                        <strong>Detail</strong> :<br>
                                        <?php echo $event[0]->detail ?>
                                    </p>
                                    <p class="mt-4"><strong>Ticket Price</strong> : Rp. <?php echo $event[0]->price ?></p>
                                    <p class="mt-4"><strong>Quota</strong> : <?php echo $event[0]->quota ?> orang</p>
                                    <p class="mt-4"><strong>Venue</strong> : <?php echo $event[0]->venue ?></p>
                                    <p class="mt-4"><strong>Address</strong> : <?php echo $event[0]->address ?></p>
                                </div>
                                <div class="col-12 mt-4">
                                    <?php if ($event[0]->status == '1') { ?>
                                        <a href="/admin/event/acc/<?php echo $event[0]->id ?>" class="btn btn-sm btn-default">Accept</a>
                                        <form method="post" class="mt-4" action="/admin/event/reject/<?php echo $event[0]->id ?>" enctype="multipart/form-data">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Alasan Reject</label>
                                                    <textarea name="alasan" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <input type="submit" name="submit" value="Reject" class="btn btn-success">
                                            </div>
                                        </form>
                                        <!-- <a href="/admin/event/reject/<?php echo $event[0]->id ?>" class="btn btn-sm btn-secondary">Reject</a> -->
                                    <?php } else { ?>
                                        <a href="/admin/event" class="btn btn-sm btn-default">Back to Event</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>Sponsorship</h3>
                        <div class="p-lg-4">
                            <?php if ($sponsor) { ?>
                                <?php foreach ($sponsor as $s) { ?>
                                    <div class="py-3">
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <img class="rounded" src="<?php echo base_url() ?>/assets/images/event/<?php echo $s->ava ?>" style="max-width: 100px; max-height: 100px;">
                                            </div>
                                            <div class="col-md-10 col-12">
                                                <h3><?php echo $s->name ?></h3>
                                                <p><?php echo $s->detail ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
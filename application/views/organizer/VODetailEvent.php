<div class="main-content" id="panel">
    <?php $this->load->view('organizer/layouts/VONavbar'); ?>
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
                                    <p><?php echo $event[0]->venue ?> - <?php echo date("l, d M Y", strtotime($event[0]->due_date)) ?> <?php echo $event[0]->time ?> - <?php echo date("l, d M Y", strtotime($event[0]->end_date)) ?></p>
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
                                    <p class="mt-2">
                                        <strong>Detail</strong> :<br>
                                        <?php echo $event[0]->detail ?>
                                    </p>
                                    <p class="mt-4"><strong>Ticket Price</strong> : Rp <?php echo $event[0]->price ?></p>
                                    <p class="mt-4"><strong>Quota</strong> : <?php echo $event[0]->quota ?> orang</p>
                                    <p class="mt-4"><strong>Venue</strong> : <?php echo $event[0]->venue ?></p>
                                    <p class="mt-4"><strong>Address</strong> : <?php echo $event[0]->address ?></p>
                                    <p class="mt-2">
                                        <strong>Alasan Reject</strong> :<br>
                                        <?php echo $event[0]->alasan_reject ?>
                                    </p>
                                </div>
                                <div class="col-12 mt-4">
                                    <a href="/organizer/event" class="btn btn-sm btn-default">Back to Event</a>
                                    <a href="/organizer/event/update/<?php echo $event[0]->token ?>" class="btn btn-sm btn-secondary">Update</a>
                                    <?php if ($event[0]->status == '1' or $event[0]->status == '3') { ?>
                                        <a href="/organizer/event/delete/<?php echo $event[0]->id ?>" class="btn btn-sm btn-secondary">Delete</a>
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
                    <div class="card-footer">
                        <a href="!#" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-sponsor">Add Sponsor +</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-sponsor" tabindex="-1" role="dialog" aria-labelledby="modal-sponsor" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Add your sponsor here</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/organizer/event/sponsor" enctype="multipart/form-data">
                    <div class="row">
                        <input type="text" name="id_event" value="<?php echo $event[0]->id ?>" hidden required>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nama sponsor" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea rows="4" name="detail" class="form-control" placeholder="Detail perusahaan" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Logo Perusahaan</label>
                                <input type="file" name="picture" class="form-control" required>
                                <small>Data must be less than 1 MB</small>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" name="submit" value="Create Sponsor" class="btn btn-default btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
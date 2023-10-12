<div class="main-content" id="panel">
    <?php $this->load->view('organizer/layouts/VONavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Create Event</h2>
                        <p class="mb-2">Create your event here</p>
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
                        <form method="post" action="/organizer/event/add" enctype="multipart/form-data">
                            <div class="p-lg-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Event Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Detail Event</label>
                                            <textarea rows="4" name="detail" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Price</label>
                                            <input type="number" name="price" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Quota</label>
                                            <input type="number" name="quota" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Due Date</label>
                                            <input type="text" name="due_date" data-date-format="yyyy-mm-dd" class="form-control datepicker" placeholder="YYYY/MM/DD" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">End Date</label>
                                            <input type="text" name="end_date" data-date-format="yyyy-mm-dd" class="form-control datepicker" placeholder="YYYY/MM/DD" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Time</label>
                                            <input type="time" name="time" class="form-control" placeholder="hh:mm:ss">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Venue</label>
                                            <input type="text" name="venue" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Address</label>
                                            <input type="text" name="address" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Google Maps Link</label>
                                            <input type="text" name="maps" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Display Picture</label>
                                            <input type="file" name="picture" class="form-control" required>
                                            <small>Data must be less than 1 MB</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <input type="submit" name="submit" value="Create Event" class="btn btn-success">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
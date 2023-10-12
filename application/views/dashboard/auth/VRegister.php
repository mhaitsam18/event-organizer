<div class="main-content bg-success">
    <div class="header py-6 py-lg-8 pt-lg-8">
        <div class="container">
            <div class="header-body text-center mb-5">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Create an account</h1>
                        <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Sign up with credentials</small>
                        </div>
                        <form action="dashboard/register/auth" method="post" role="form">
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-bold"></i></span>
                                    </div>
                                    <input name="nama" class="form-control" placeholder="Nama" type="text" size="30" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <input name="username" class="form-control" placeholder="Username" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input name="password" class="form-control" placeholder="Password" type="password" required>
                                </div>
                            </div>
                            <div class="custom-control custom-radio mb-2">
                                <input type="radio" id="customRadio1" name="level" value="3" class="custom-control-input" required>
                                <label class="custom-control-label" for="customRadio1">Register as User</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="level" value="2" class="custom-control-input" required>
                                <label class="custom-control-label" for="customRadio2">Register as Organizer</label>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-success mt-4 btn-block" value="Create Account">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3 mb-5">
                    <div class="col-12">
                        <a href="/login" class="text-white"><small>Have an account? login <strong>here</strong></small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
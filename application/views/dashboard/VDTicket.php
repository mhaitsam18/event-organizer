<div class="main-content" id="panel">
    <?php $this->load->view('dashboard/layouts/VDNavbar'); ?>
    <div class="header bg-transparent pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-0 mt-4">Hello <?php echo $this->session->userdata('name'); ?> </h2>
                        <p class="mb-2">Your ticket here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header border-0">
                        <h4 class="mb-0">Ticket</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Nama Pemesan</th>
                                    <th class="text-center">ID Ticket</th>
                                    <th class="text-center">Tgl Beli</th>
                                    <th class="text-center">Event Name</th>
                                    <th class="text-center">Event Dare</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php if ($ticket) { ?>
                                    <?php foreach ($ticket as $t) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $t->nama_pemesan ?></td>
                                            <td class="text-center"><?php echo $t->token ?></td>
                                            <td class="text-center"><?php echo date("l, d M Y H:s:i", strtotime($t->created_at)) ?></td>
                                            <td class="text-center"><?php echo $t->event_name ?></td>
                                            <td class="text-center"><?php echo $t->event_date ?></td>
                                            <td>
                                                <a href='/dashboard/ticket/print/<?php echo $t->token ?>' class="badge badge-success">Cetak</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td class="text-center" colspan="5">No Data Found</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
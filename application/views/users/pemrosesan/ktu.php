<div class="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between mb-4">
                    <div>
                        <h3 class="card-title mb-0 font-weight-bold">Data Surat Masuk</h3>
                        <div class="small text-muted"><?php echo $md->nm_lembaga; ?></div>
                        <span class="badge badge-success fw-bold"><i class="fas fa-id-badge"></i>&nbsp; <?php echo $jabatan->bagian_nama; ?></span>
                    </div>
                    <div class="btn-toolbar">
                        <a href="<?php echo base_url(); ?>users/control/">
                            <button class="btn btn-xs btn-primary m-1 fw-bold"><i class="fas fa-clipboard-check"></i><span class="d-none d-md-block">History</span>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="table-responsive pb-4" style="overflow-x:auto;">
                    <table id="basic-datatables" class="table table-striped table-bordered table-hover" cellspacing="0" style="width: 100%;">
                        <thead class="bg-success">
                            <tr class="text-white">
                                <th class="text-center">No.</th>
                                <th class="text-center">Status</th>
                                <th>Diterima Tgl.</th>
                                <th>Pengirim</th>
                                <th>Perihal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($ktu->result() as $baris) {
                            ?>
                                <tr>
                                    <td class="text-center fw-bold"></td>
                                    <td class="text-center">
                                        <?php
                                        if ($baris->sm_dibaca == 3) { ?>
                                            <span class="badge badge-success fw-bold"><i class="fas fa-check-circle"></i>&nbsp; Disposisi</span>
                                        <?php } elseif ($baris->sm_dibaca == 2) { ?>
                                            <span class="badge badge-primary fw-bold"><i class="fas fa-bell"></i>&nbsp; Diajukan</span>
                                        <?php } elseif ($baris->sm_dibaca == 1) { ?>
                                            <span class="badge badge-warning fw-bold"><i class="fas fa-spinner"></i>&nbsp; Menunggu</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger fw-bold"><i class="fas fa-exclamation-triangle"></i>&nbsp; Koreksi</span>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo format_indo($baris->sm_tgl_diterima); ?></td>
                                    <td><?php echo $baris->sm_pengirim; ?></td>
                                    <td><?php echo $baris->sm_perihal; ?></td>
                                    <td>
                                        <?php if ($baris->sm_dibaca == 2) { ?>
                                            <a href="" class="btn btn-info btn-sm mt-1 mb-1 fw-bold" data-toggle="modal" data-target="#detailSM<?php echo $baris->id_sm; ?>"><i class="fas fa-eye"></i> Detail</a>
                                        <?php } elseif ($baris->sm_dibaca == 1) { ?>
                                            <a href="" class="btn btn-info btn-sm mt-1 mb-1 fw-bold" data-toggle="modal" data-target="#detailSM<?php echo $baris->id_sm; ?>"><i class="fab fa-telegram-plane"></i> Ajukan</a>
                                        <?php } ?>
                                        <!-- modal detail surat -->
                                        <div class="modal fade" id="detailSM<?php echo $baris->id_sm; ?>" tabindex="-1" role="dialog" aria-labelledby="detailSM<?php echo $baris->id_sm; ?>">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bold"><i class="fas fa-paste"></i>&nbsp; DETAIL SURAT MASUK</h5>
                                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">x</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="table-responsive" style="overflow-x: auto;">
                                                                    <table class="table table-striped table-hover" cellspacing="0" style="width: 100%;">
                                                                        <thead class="bg-default table-bordered">
                                                                            <tr class="text-black">
                                                                                <th colspan="2">NOMOR AGENDA (<?php echo $baris->sm_no_urut; ?>)</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="table-bordered">
                                                                            <tr class="fw-bold">
                                                                                <td width="30%">Kode</td>
                                                                                <td width="70%"><?php echo $baris->sm_penerima; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Berkas</td>
                                                                                <td><?php echo $baris->sm_status; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Sifat</td>
                                                                                <td><span class="badge badge-success fw-bold mt-1 mb-1"><i class="fas fa-bell"></i>&nbsp;<?php echo $baris->sm_sifat; ?></span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Diterima</td>
                                                                                <td><?php echo format_indo($baris->sm_tgl_diterima); ?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="table-responsive" style="overflow-x: auto;">
                                                                    <table class="table table-striped table-hover" cellspacing="0" style="width: 100%;">
                                                                        <thead class="bg-info table-bordered">
                                                                            <tr class="text-white">
                                                                                <th colspan="2"><i class="fas fa-ellipsis-h"></i> &nbsp;STATUS SURAT</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="table-bordered">
                                                                            <tr class="fw-bold">
                                                                                <td width="30%">Status</td>
                                                                                <td width="70%">
                                                                                    <?php
                                                                                    if ($baris->sm_dibaca == 3) { ?>
                                                                                        <span class="badge badge-success fw-bold"><i class="fas fa-check-circle"></i>&nbsp; Verifikasi Pemimpin</span>
                                                                                    <?php } elseif ($baris->sm_dibaca == 2) { ?>
                                                                                        <span class="badge badge-primary fw-bold"><i class="fas fa-bell"></i>&nbsp; Verifikasi Sekretaris</span>
                                                                                    <?php } elseif ($baris->sm_dibaca == 1) { ?>
                                                                                        <span class="badge badge-warning fw-bold"><i class="fas fa-spinner"></i>&nbsp; Menunggu Sekretaris</span>
                                                                                    <?php } else { ?>
                                                                                        <span class="badge badge-danger fw-bold"><i class="fas fa-exclamation-triangle"></i>&nbsp; Revisi</span>
                                                                                    <?php } ?>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                            if ($baris->sm_dibaca == 3) { ?>
                                                                                <tr>
                                                                                    <td>Tanggal</td>
                                                                                    <td><?php echo format_indo($baris->sm_tgl_kepala); ?></td>
                                                                                </tr>
                                                                            <?php } elseif ($baris->sm_dibaca == 2) { ?>
                                                                                <tr>
                                                                                    <td>Tanggal</td>
                                                                                    <td><?php echo format_indo($baris->sm_tgl_ajuan); ?></td>
                                                                                </tr>
                                                                            <?php } elseif ($baris->sm_dibaca == 1) { ?>
                                                                                <tr>
                                                                                    <td>Tanggal</td>
                                                                                    <td><?php echo format_indo(substr($baris->sm_create, 0, 8)); ?></td>
                                                                                </tr>
                                                                            <?php } else { ?>
                                                                                <tr>
                                                                                    <td>Tanggal</td>
                                                                                    <td><?php echo format_indo(substr($baris->sm_create, 0, 8)); ?></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="table-responsive" style="overflow-x: auto;">
                                                                            <table class="table table-striped table-hover" cellspacing="0" style="width: 100%;">
                                                                                <thead class="bg-info table-bordered">
                                                                                    <tr class="text-white">
                                                                                        <th colspan="2">Informasi Detail Surat</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody class="table-bordered">
                                                                                    <tr class="fw-bold">
                                                                                        <td width="30%">No. Surat</td>
                                                                                        <td width="70%"><?php echo $baris->sm_no_surat_asal; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Pengirim</td>
                                                                                        <td><?php echo $baris->sm_pengirim; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Perihal</td>
                                                                                        <td class="p-4"><br /><?php echo $baris->sm_perihal; ?><br /><br /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Tanggal Surat</td>
                                                                                        <td><?php echo format_indo($baris->sm_tgl_surat); ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Lampiran</td>
                                                                                        <td><?php echo $baris->sm_lampiran; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>File</td>
                                                                                        <td>
                                                                                            <!-- <a href="https://docs.google.com/viewerng/viewer?url=<?php echo base_url(); ?>lampiran/surat_masuk/<?php echo $baris->nama_berkas; ?>" target="_blank" class="btn btn-xs btn-primary mb-1 mt-1 fw-bold"><i class="fas fa-eye"></i>&nbsp; Preview</a> -->
                                                                                            <a href="<?php echo base_url(); ?>lampiran/surat_masuk/<?php echo $baris->nama_berkas; ?>" target="_blank" class="btn btn-xs btn-primary mb-1 mt-1 fw-bold"><i class="fas fa-cloud-download-alt"></i>&nbsp; Download</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <!-- TGL. AJUAN -->
                                                                        <div class="col-sm-6 text-left">
                                                                            <div class="form-group form-group-default bg-dop">
                                                                                <label class="text-primary fw-bold"><i class="far fa-calendar-alt"></i> TANGGAL AJUAN</label>
                                                                                <input readonly name="tgl_ajuan" type="text" value="<?php echo format_indo(date('Y-m-d')) ?>" class="form-control fw-bold">
                                                                                <input readonly name="id" type="hidden" value="<?php echo $baris->id_sm; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <!-- AJUKAN KE -->
                                                                        <div class="col-sm-6 text-left">
                                                                            <div class="form-group form-group-default bg-dop">
                                                                                <label class="text-primary fw-bold"><i class="fas fa-clipboard-check"></i> TINDAKAN SELANJUTNYA</label>
                                                                                <select required name="dibaca" id="dibaca" class="custom-select form-control fw-bold" <?php echo ($baris->sm_dibaca == 1) ? '' : 'disabled' ?> onchange="opsiCatatan()">
                                                                                    <option value="">--Pilih Tindakan--</option>
                                                                                    <option value="0" <?php echo ($baris->sm_dibaca == 0) ? 'selected' : '' ?>>Koreksi Kembali</option>
                                                                                    <option value="2" <?php echo ($baris->sm_dibaca == 2) ? 'selected' : '' ?>>Ajukan ke Pemimpin</option>
                                                                                    <?php if ($baris->sm_dibaca == 3) { ?>
                                                                                        <option value="3" <?php echo ($baris->sm_dibaca == 3) ? 'selected' : '' ?>>Verifikasi ke Pemimpin</option>
                                                                                    <?php } elseif ($baris->sm_dibaca == 4) { ?>
                                                                                        <option value="4" <?php echo ($baris->sm_dibaca == 4) ? 'selected' : '' ?>>Terbit</option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <!-- CATATAN -->
                                                                        <div class="col-sm-12 text-left" id="catatan">
                                                                            <div class="form-group form-group-default bg-dop">
                                                                                <label class="text-primary fw-bold"><i class="fas fa-file-alt"></i> CATATAN</label>
                                                                                <input name="catatan" type="catatan" class="form-control fw-bold" placeholder="Berikan catatan untuk surat ini jika diperlukan.">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?php if ($baris->sm_dibaca == 1) { ?>
                                                            <button name="saveAjuan" type="submit" class="btn btn-sm btn-primary fw-bold"><i class="fa fa-check"></i> Update Data</button>
                                                        <?php } ?>
                                                        <button type="button" class="btn btn-sm btn-danger fw-bold" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
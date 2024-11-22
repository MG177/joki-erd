<div class="page-inner">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between mb-4">
          <div>
            <h3 class="card-title mb-0 font-weight-bold">Data Surat Masuk</h3>
            <div class="small text-muted"><?php echo $md->nm_lembaga; ?></div>
          </div>
          <div class="btn-toolbar">
            <?php
            if ($user->row()->pegawai_level == 'admin' or $user->row()->pegawai_level == 'petugas') { ?>
              <a href="" data-toggle="modal" data-target="#addSurat">
                <button class="btn btn-xs btn-success m-1 fw-bold"><i class="fas fa-plus-circle"></i><span class="d-none d-md-block">Tambah</span>
                </button>
              </a>
              <a href="<?php echo base_url(); ?>users/control/">
                <button class="btn btn-xs btn-primary m-1 fw-bold"><i class="fas fa-clipboard-check"></i><span class="d-none d-md-block">History</span>
                </button>
              </a>
            <?php } ?>
          </div>
        </div>
        <div class="col-lg-12">
          <?php echo $this->session->flashdata('msg'); ?>
        </div>
        <div class="table-responsive pb-4" style="overflow-x:auto;">
          <table id="basic-datatables" class="table table-striped table-bordered table-hover" cellspacing="0" style="width: 100%;">
            <thead class="bg-info">
              <tr class="text-white">
                <th>No.</th>
                <th>Agenda</th>
                <th>Tgl. Diterima</th>
                <th>Disposisi Departemen</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th class="text-center" width="18%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($sm->result() as $baris) {
              ?>
                <tr>
                  <td class="text-center fw-bold"></td>
                  <td class="text-center">
                    <?php
                    if ($baris->sm_dibaca == 4) { ?>
                      <span class="badge badge-success fw-bold"><i class="fas fa-check-circle"></i>&nbsp; <?php echo $baris->sm_penerima; ?></span>
                    <?php } elseif ($baris->sm_dibaca == 3) { ?>
                      <span class="badge badge-secondary fw-bold"><i class="fas fa-tag"></i>&nbsp; <?php echo $baris->sm_penerima; ?></span>
                    <?php } elseif ($baris->sm_dibaca == 2) { ?>
                      <span class="badge badge-primary fw-bold"><i class="fas fa-bell"></i>&nbsp; <?php echo $baris->sm_penerima; ?></span>
                    <?php } elseif ($baris->sm_dibaca == 1) { ?>
                      <span class="badge badge-warning fw-bold"><i class="fas fa-spinner"></i>&nbsp; <?php echo $baris->sm_penerima; ?></span>
                    <?php } else { ?>
                      <span class="badge badge-danger fw-bold"><i class="fas fa-exclamation-triangle"></i>&nbsp; <?php echo $baris->sm_penerima; ?></span>
                    <?php } ?>
                  </td>
                  <td><?php echo date('m/d/Y', strtotime($baris->sm_tgl_diterima)); ?></td>
                  <td>
                    <?php if ($baris->sm_dibaca >= 3) {
                      $data['sql'] = $this->db->query("SELECT bagian_nama FROM tbl_bagian where id_bagian ='$baris->sm_bagian'")->row();
                      echo $data['sql']->bagian_nama;
                    } else {
                      echo '-';
                    } ?>
                  </td>
                  </td>
                  <td><?php echo $baris->sm_pengirim; ?></td>
                  <td><?php echo $baris->sm_perihal; ?></td>
                  <td class="text-center">
                    <a href="" class="btn btn-success btn-xs mt-1 mb-1" data-toggle="modal" data-target="#detailSM<?php echo $baris->id_sm; ?>" title="Detail"><i class="fas fa-eye"></i></a>
                    <?php if ($baris->sm_dibaca == 4) { ?>
                      <a href="sm/c/<?php echo $baris->id_sm; ?>" class="btn btn-xs btn-warning mt-1 mb-1" target="_blank" title="Cetak"><i class="fas  fa-print"></i></a>
                    <?php } ?>
                    <?php if ($user->row()->pegawai_level == 'admin' or $user->row()->pegawai_level == 'petugas') { ?>
                      <?php if ($baris->sm_dibaca == 0) { ?>
                        <a href="" class="btn btn-xs btn-primary mt-1 mb-1" data-toggle="modal" data-target="#editSM<?php echo $baris->id_sm; ?>" title="Edit"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-xs btn-warning mt-1 mb-1" data-toggle="modal" data-target="#uploadSM<?php echo $baris->id_sm; ?>" title="Upload File"><i class="fas fa-cloud-upload-alt"></i></a>
                        <a href="<?php echo base_url(); ?>users/sm/h/<?php echo $baris->id_sm; ?>" class="btn btn-xs btn-danger mt-1 mb-1" onclick="return confirm('Apakah Anda yakin?')" title="Hapus"><i class="fas fa-trash"></i></a>
                      <?php } ?>
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
                              <div class="col-sm-6">
                                <div class="table-responsive">
                                  <table class="table table-striped table-hover text-left" cellspacing="0" style="width: 100%;">
                                    <thead class="bg-info table-bordered">
                                      <tr class="text-white">
                                        <th colspan="2">Agenda (<?php echo $baris->sm_no_urut; ?>)</th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered">
                                      <tr class="fw-bold">
                                        <td width="30%">Kode</td>
                                        <td width="70%"><?php echo $baris->sm_penerima; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Sifat</td>
                                        <td><span class="badge badge-primary fw-bold mt-1 mb-1"><i class="fas fa-bell"></i>&nbsp;<?php echo $baris->sm_sifat; ?></span></td>
                                      </tr>
                                      <tr>
                                        <td>Diterima</td>
                                        <td><?php echo format_indo($baris->sm_tgl_diterima); ?></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="table-responsive">
                                  <table class="table table-striped table-hover text-left" cellspacing="0" style="width: 100%;">
                                    <thead class="bg-info table-bordered">
                                      <tr class="text-white">
                                        <th colspan="2">Status Surat</th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered">
                                      <tr>
                                        <td>Berkas</td>
                                        <td><?php echo $baris->sm_status; ?></td>
                                      </tr>
                                      <tr class="fw-bold">
                                        <td width="30%">Status</td>
                                        <td width="70%">
                                          <?php
                                          if ($baris->sm_dibaca == 4) { ?>
                                            <span class="badge badge-success fw-bold"><i class="fas fa-check-circle"></i>&nbsp; Terdisposisi</span>
                                          <?php } elseif ($baris->sm_dibaca == 3) { ?>
                                            <span class="badge badge-secondary fw-bold"><i class="fas fa-bell"></i>&nbsp; Verifikasi Pemimpin</span>
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
                                      if ($baris->sm_dibaca == 4) { ?>
                                        <tr>
                                          <td>Tanggal</td>
                                          <td><?php echo format_indo($baris->sm_tgl_disposisi); ?></td>
                                        </tr>
                                      <?php } elseif ($baris->sm_dibaca == 3) { ?>
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
                                          <td><?php echo format_indo($baris->sm_create); ?></td>
                                        </tr>
                                      <?php } else { ?>
                                        <tr>
                                          <td>Tanggal</td>
                                          <td><?php echo format_indo($baris->sm_create); ?></td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="table-responsive">
                                  <table class="table table-striped table-hover text-left" cellspacing="0" style="width: 100%;">
                                    <thead class="bg-warning table-bordered">
                                      <tr class="text-white">
                                        <th colspan="2"><i class="far fa-file-alt"></i>&nbsp; DETAIL SURAT</th>
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
                                          <!-- <a href="https://docs.google.com/viewerng/viewer?url=<?php echo base_url(); ?>lampiran/surat_masuk/<?php echo $baris->nama_berkas; ?>" target="_blank" class="btn btn-xs btn-primary mb-2 mt-2 fw-bold"><i class="fas fa-eye"></i>&nbsp; Preview</a> -->
                                          <a href="<?php echo base_url(); ?>lampiran/surat_masuk/<?php echo $baris->nama_berkas; ?>" target="_blank" class="btn btn-xs btn-primary mb-2 mt-2 fw-bold"><i class="fas fa-cloud-download-alt"></i>&nbsp; Download</a>
                                        </td>
                                      </tr>
                                      <?php
                                      if ($baris->sm_dibaca == 4) { ?>
                                        <tr class="bg-primary text-white">
                                          <th colspan="2"><i class="fas fa-check-circle"></i>&nbsp; PETUNJUK PIMPINAN</th>
                                        </tr>
                                        <tr>
                                          <td>Tindakan Segera</td>
                                          <td><?php echo implode(', ', explode(',', $baris->sm_segera)); ?></td>
                                        </tr>
                                        <tr>
                                          <td>Tindakan Biasa</td>
                                          <td>
                                            <?php echo implode(', ', explode(',', $baris->sm_biasa)); ?>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>Catatan</td>
                                          <td><?php echo $baris->sm_catatan; ?></td>
                                        </tr>
                                        <tr>
                                          <td>Disposisi Departemen</td>
                                          <td>
                                            <span class="badge badge-success fw-bold mb-2 mt-2"><i class="fas fa-id-badge"></i>&nbsp;
                                              <?php
                                              $data['sql'] = $this->db->query("SELECT bagian_nama FROM tbl_bagian where id_bagian ='$baris->sm_bagian'")->row();
                                              echo $data['sql']->bagian_nama;
                                              ?>
                                            </span>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>Penerima</td>
                                          <td>
                                            <br>
                                            <?php
                                            $data = explode(';', $baris->sm_disposisi);
                                            foreach ($data as $b) {
                                              foreach ($level_users->result() as $a) {
                                                if ($b == $a->id_user) {
                                                  echo $a->pegawai_nama . "<br>";
                                                }
                                              }
                                            }
                                            ?>
                                            <br>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>Tanggal Penyelesaian</td>
                                          <td><?php echo format_indo($baris->sm_tgl_disposisi); ?></td>
                                        </tr>
                                        <tr>
                                          <td>Catatan <?php
                                                      $data['sql'] = $this->db->query("SELECT bagian_nama FROM tbl_bagian where id_bagian ='$baris->sm_bagian'")->row();
                                                      echo $data['sql']->bagian_nama;
                                                      ?></td>
                                          <td><?php echo $baris->sm_kasi_ctt; ?></td>
                                        </tr>
                                      <?php } elseif ($baris->sm_dibaca == 3) { ?>
                                        <tr class="bg-primary text-white">
                                          <th colspan="2"><i class="fas fa-check-circle"></i>&nbsp; PETUNJUK PIMPINAN</th>
                                        </tr>
                                        <tr>
                                          <td>Tindakan Segera</td>
                                          <td><?php echo $baris->sm_segera; ?></td>
                                        </tr>
                                        <tr>
                                          <td>Tindakan Biasa</td>
                                          <td><?php echo $baris->sm_biasa; ?></td>
                                        </tr>
                                        <tr>
                                          <td>Catatan</td>
                                          <td><?php echo $baris->sm_catatan; ?></td>
                                        </tr>
                                        <tr>
                                          <td>Disposisi Departemen</td>
                                          <td>
                                            <span class="badge badge-success fw-bold mb-2 mt-2"><i class="fas fa-id-badge"></i>&nbsp;
                                              <?php
                                              $data['sql'] = $this->db->query("SELECT bagian_nama FROM tbl_bagian where id_bagian ='$baris->sm_bagian'")->row();
                                              echo $data['sql']->bagian_nama;
                                              ?>
                                            </span>
                                          </td>
                                        </tr>
                                      <?php } elseif ($baris->sm_dibaca == 0) { ?>
                                        <tr>
                                          <td>Koreksi</td>
                                          <td><?php echo $baris->sm_ktu_ctt; ?></td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer mt--2">
                            <button type="button" class="btn btn-sm btn-danger fw-bold" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end modal -->
                  </td>
                  <!-- modal edit surat -->
                  <div class="modal fade" id="editSM<?php echo $baris->id_sm; ?>" tabindex="-1" role="dialog" aria-labelledby="editSM<?php echo $baris->id_sm; ?>">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fw-bold"><i class="fas fa-paste"></i>&nbsp; EDIT SURAT MASUK</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">x</span></button>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-sm-12 text-left mb-2">
                                <span class="fw-bold">INFORMASI UMUM</span> <br> <small>
                                  Lengkapi informasi pada surat masuk.
                                </small>
                              </div>
                              <!-- NOMOR SURAT -->
                              <div class="col-sm-6 text-left">
                                <div class="form-group form-group-default">
                                  <label class="text-primary fw-bold"><i class="fas fa-bullseye"></i> NO. SURAT</label>
                                  <input required name="id" type="hidden" value="<?php echo $baris->id_sm; ?>">
                                  <input required name="user" type="hidden" value="<?php echo $user->row()->id_user; ?>">
                                  <input required name="no_surat" type="text" class="form-control fw-bold" value="<?php echo $baris->sm_no_surat_asal; ?>">
                                </div>
                              </div>
                              <!-- TGL. SURAT -->
                              <div class="col-sm-3 text-left">
                                <div class="form-group form-group-default">
                                  <label class="text-primary fw-bold"><i class="far fa-calendar-alt"></i> TGL. SURAT</label>
                                  <input required name="tgl_surat" type="date" class="form-control fw-bold" value="<?php echo $baris->sm_tgl_surat; ?>">
                                </div>
                              </div>
                              <!-- DITERIMA TGL. -->
                              <div class="col-sm-3 text-left">
                                <div class="form-group form-group-default">
                                  <label class="text-primary fw-bold"><i class="far fa-calendar-check"></i> DITERIMA TGL.</label>
                                  <input required name="diterima_tgl" type="date" class="form-control fw-bold" value="<?php echo $baris->sm_tgl_diterima; ?>">
                                </div>
                              </div>
                              <!-- Pengirim -->
                              <div class="col-sm-6 text-left">
                                <div class="form-group form-group-default">
                                  <label class="text-primary fw-bold"><i class="fas fa-building"></i> PENGIRIM</label>
                                  <input required name="pengirim" type="text" class="form-control fw-bold" value="<?php echo $baris->sm_pengirim; ?>">
                                </div>
                              </div>
                              <!-- NOMOR AGENDA -->
                              <div class="col-sm-3 text-left">
                                <div class="form-group form-group-default">
                                  <label class="text-primary fw-bold"><i class="fas fa-clipboard-list"></i> AGENDA</label>
                                  <input required name="agenda" type="text" class="form-control fw-bold" value="<?php echo $baris->sm_no_urut; ?>">
                                </div>
                              </div>
                              <!-- KLASIFIKASI -->
                              <div class="col-sm-3 text-left">
                                <div class="form-group form-group-default">
                                  <label class="text-primary fw-bold"><i class="fas fa-bookmark"></i> KLASIFIKASI</label>
                                  <input required name="klasifikasi" type="text" class="form-control fw-bold" value="<?php echo $baris->sm_penerima; ?>">
                                </div>
                              </div>
                              <!-- PERIHAL SURAT -->
                              <div class="col-sm-12 text-left">
                                <div class="form-group form-group-default">
                                  <label class="text-primary fw-bold"><i class="fas fa-file-contract"></i> PERIHAL SURAT</label>
                                  <input required name="perihal" type="text" class="form-control fw-bold" value="<?php echo $baris->sm_perihal; ?>">
                                </div>
                              </div>
                              <div class="col-sm-12 text-left mb-2 mt-2">
                                <span class="fw-bold">INFORMASI TAMBAHAN</span> <br> <small>
                                  Silahkan lengkapi jumlah lampiran, status, dan sifat tindakan surat!
                                </small>
                              </div>
                              <!-- LAMPIRAN -->
                              <div class="col-sm-4 text-left">
                                <div class="form-group form-group-default">
                                  <label class="text-primary fw-bold">LAMPIRAN</label>
                                  <select required name="lampiran" class="custom-select form-control fw-bold">
                                    <option value="">--Lampiran--</option>
                                    <option <?php if ($baris->sm_lampiran == "-") {
                                              echo "selected";
                                            } ?> value="-">0 Lampiran</option>
                                    <option <?php if ($baris->sm_lampiran == "1 lampiran") {
                                              echo "selected";
                                            } ?> value="1 lampiran">1 Lampiran</option>
                                    <option <?php if ($baris->sm_lampiran == "2 lampiran") {
                                              echo "selected";
                                            } ?> value="2 lampiran">2 Lampiran</option>
                                    <option <?php if ($baris->sm_lampiran == "3 lampiran") {
                                              echo "selected";
                                            } ?> value="3 lampiran">3 Lampiran</option>
                                    <option <?php if ($baris->sm_lampiran == "4 lampiran") {
                                              echo "selected";
                                            } ?> value="4 lampiran">4 Lampiran</option>
                                    <option <?php if ($baris->sm_lampiran == "5 lampiran") {
                                              echo "selected";
                                            } ?> value="5 lampiran">5 Lampiran</option>
                                    <option <?php if ($baris->sm_lampiran == "6 lampiran") {
                                              echo "selected";
                                            } ?> value="6 lampiran">6 Lampiran</option>
                                  </select>
                                </div>
                              </div>
                              <!-- STATUS -->
                              <div class="col-sm-4 text-left">
                                <div class="form-group form-group-default">
                                  <label class="text-primary fw-bold">STATUS</label>
                                  <select required name="status" class="custom-select form-control fw-bold">
                                    <option value="">--Status--</option>
                                    <option <?php if ($baris->sm_status == "Asli") {
                                              echo "selected";
                                            } ?> value="Asli">Asli</option>
                                    <option <?php if ($baris->sm_status == "Tembusan") {
                                              echo "selected";
                                            } ?> value="Tembusan">Tembusan</option>
                                  </select>
                                </div>
                              </div>
                              <!-- SIFAT -->
                              <div class="col-sm-4 text-left">
                                <div class="form-group form-group-default">
                                  <label class="text-primary fw-bold">SIFAT</label>
                                  <select required name="sifat" class="custom-select form-control fw-bold">
                                    <option value="">--Sifat--</option>
                                    <option <?php if ($baris->sm_sifat == "Segera") {
                                              echo "selected";
                                            } ?> value="Segera">Segera</option>
                                    <option <?php if ($baris->sm_sifat == "Sangat Segera") {
                                              echo "selected";
                                            } ?> value="Sangat Segera">Sangat Segera</option>
                                    <option <?php if ($baris->sm_sifat == "Kilat") {
                                              echo "selected";
                                            } ?> value="Kilat">Kilat</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button name="updateSM" type="submit" class="btn btn-sm btn-primary fw-bold"><i class="fa fa-check"></i> Simpan</button>
                            <button type="button" class="btn btn-sm btn-danger fw-bold" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end modal -->
                  <!-- modal upload -->
                  <div class="modal fade" id="uploadSM<?php echo $baris->id_sm; ?>" tabindex="-1" role="dialog" aria-labelledby="uploadSM<?php echo $baris->id_sm; ?>">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fw-bold"><i class="fas fa-cloud-upload-alt"></i>&nbsp; UPLOAD FILE BARU</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">x</span></button>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-sm-12 text-left mb-2 mt-2">
                                <span class="fw-bold">UNGGAH FILE SURAT</span> <br> <small>
                                  Silahkan unggah file surat dalam satu file.
                                </small>
                              </div>
                              <div class="col-sm-12 text-left">
                                <div class="form-group form-group-default bg-dop">
                                  <label class="text-primary text-small fw-bold">UPLOAD FILE</label>
                                  <input type="file" class="form-control fw-bold" name="berkasfile">
                                  <small class="small result_default text-danger">* semua file type diizinkan!</small>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <input required name="id" type="hidden" class="form-control fw-bold" value="<?php echo $baris->id_sm; ?>">
                            <input required name="token_lampiran" type="hidden" class="form-control fw-bold" value="<?php echo $baris->token_lampiran; ?>">
                            <button name="uploadSM" type="submit" class="btn btn-sm btn-primary fw-bold"><i class="fa fa-check"></i> Simpan</button>
                            <button type="button" class="btn btn-sm btn-danger fw-bold" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end modal -->
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
<!-- Modal addSurat -->
<div class="modal fade" id="addSurat" tabindex="-1" role="dialog" aria-labelledby="addSurat">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold"><i class="fas fa-paste"></i>&nbsp; TAMBAH SURAT MASUK</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">x</span></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12 text-left mb-2">
              <span class="fw-bold">INFORMASI UMUM</span> <br> <small>
                Lengkapi informasi pada surat masuk.
              </small>
            </div>
            <!-- NOMOR SURAT -->
            <div class="col-sm-6 text-left">
              <div class="form-group form-group-default">
                <label class="text-primary fw-bold"><i class="fas fa-bullseye"></i> NO. SURAT</label>
                <input required name="user" type="hidden" value="<?php echo $user->row()->id_user; ?>">
                <input required name="no_surat" type="text" class="form-control fw-bold" placeholder="Masukkan Nomor Surat">
              </div>
            </div>
            <!-- TGL. SURAT -->
            <div class="col-sm-3 text-left">
              <div class="form-group form-group-default">
                <label class="text-primary fw-bold"><i class="far fa-calendar-alt"></i> TGL. SURAT</label>
                <input required name="tgl_surat" type="date" class="form-control fw-bold">
              </div>
            </div>
            <!-- DITERIMA TGL. -->
            <div class="col-sm-3 text-left">
              <div class="form-group form-group-default">
                <label class="text-primary fw-bold"><i class="far fa-calendar-check"></i> DITERIMA TGL.</label>
                <input required name="diterima_tgl" type="date" class="form-control fw-bold">
              </div>
            </div>
            <!-- Pengirim -->
            <div class="col-sm-6 text-left">
              <div class="form-group form-group-default">
                <label class="text-primary fw-bold"><i class="fas fa-building"></i> PENGIRIM</label>
                <input required name="pengirim" type="text" class="form-control fw-bold" placeholder="Masukkan Pengirim Asal">
              </div>
            </div>
            <!-- NOMOR AGENDA -->
            <div class="col-sm-3 text-left">
              <div class="form-group form-group-default">
                <label class="text-primary fw-bold"><i class="fas fa-clipboard-list"></i> AGENDA</label>
                <input required name="agenda" type="text" class="form-control fw-bold" placeholder="Agenda">
              </div>
            </div>
            <!-- KLASIFIKASI -->
            <div class="col-sm-3 text-left">
              <div class="form-group form-group-default">
                <label class="text-primary fw-bold"><i class="fas fa-bookmark"></i> KLASIFIKASI</label>
                <input required name="klasifikasi" type="text" class="form-control fw-bold" placeholder="Input Kode">
              </div>
            </div>
            <!-- PERIHAL SURAT -->
            <div class="col-sm-12 text-left">
              <div class="form-group form-group-default">
                <label class="text-primary fw-bold"><i class="fas fa-file-contract"></i> PERIHAL SURAT</label>
                <input required name="perihal" type="text" class="form-control fw-bold" placeholder="Masukkan Isi Perihal Surat">
              </div>
            </div>
            <div class="col-sm-12 text-left mb-2 mt-2">
              <span class="fw-bold">INFORMASI TAMBAHAN</span> <br> <small>
                Silahkan lengkapi jumlah lampiran, status, dan sifat tindakan surat!
              </small>
            </div>
            <!-- LAMPIRAN -->
            <div class="col-sm-4 text-left">
              <div class="form-group form-group-default">
                <label class="text-primary fw-bold">LAMPIRAN</label>
                <select required name="lampiran" class="custom-select form-control fw-bold">
                  <option value="">--Lampiran--</option>
                  <option value="-">0 Lampiran</option>
                  <option value="1 lampiran">1 Lampiran</option>
                  <option value="2 lampiran">2 Lampiran</option>
                  <option value="3 lampiran">3 Lampiran</option>
                  <option value="4 lampiran">4 Lampiran</option>
                  <option value="5 lampiran">5 Lampiran</option>
                  <option value="6 lampiran">6 Lampiran</option>
                </select>
              </div>
            </div>
            <!-- STATUS -->
            <div class="col-sm-4 text-left">
              <div class="form-group form-group-default">
                <label class="text-primary fw-bold">STATUS</label>
                <select required name="status" class="custom-select form-control fw-bold">
                  <option value="">--Status--</option>
                  <option value="Asli">Asli</option>
                  <option value="Tembusan">Tembusan</option>
                </select>
              </div>
            </div>
            <!-- SIFAT -->
            <div class="col-sm-4 text-left">
              <div class="form-group form-group-default">
                <label class="text-primary fw-bold">SIFAT</label>
                <select required name="sifat" class="custom-select form-control fw-bold">
                  <option value="">--Sifat--</option>
                  <option value="Segera">Segera</option>
                  <option value="Sangat Segera">Sangat Segera</option>
                  <option value="Kilat">Kilat</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12 text-left mb-2 mt-2">
              <span class="fw-bold">UNGGAH FILE SURAT</span> <br> <small>
                Silahkan unggah file surat dalam satu file.
              </small>
            </div>
            <div class="col-sm-12 text-left">
              <div class="form-group form-group-default bg-dop">
                <label class="text-primary text-small fw-bold">UPLOAD FILE</label>
                <input type="file" class="form-control fw-bold" name="berkasfile" required>
                <small class="small result_default text-danger">* semua file type diizinkan!</small>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button name="saveSM" type="submit" class="btn btn-sm btn-primary fw-bold"><i class="fa fa-check"></i> Simpan</button>
          <button type="button" class="btn btn-sm btn-danger fw-bold" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
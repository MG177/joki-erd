<script type="text/javascript">
    function getNumber() {
        var no = document.getElementById("tanggal").value;
        let result = no.substring(8, 10)
        document.getElementById("no_awal").value = result;

    }
</script>
<?php
$harian = date('Y-m-d');
$sql = $this->db->query("SELECT MAX(ska_no_urut) as noUrut FROM tbl_ska WHERE ska_tanggal='$harian'")->row();
$no_max =  $sql->noUrut;
$urutan = (int) substr($no_max, 1, 3);
$urutan++;
$no = sprintf("%03s", $urutan);
?>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h3 class="card-title mb-0 font-weight-bold">Buat Surat Keluar</h3>
                        <div class="small text-muted"><?php echo $md->nm_lembaga; ?></div>
                    </div>
                    <div class="btn-toolbar">
                    </div>
                </div>
                <div class="col-lg-12 mt-2">
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <!-- ska -->
                            <div class="col-sm-6 text-left">
                                <div class="form-group form-group-default">
                                    <label class="text-primary fw-bold"><i class="far fa-calendar-alt"></i> TGL. SURAT</label>
                                    <input required name="tanggal" id="tanggal" type="date" class="form-control fw-bold" value="<?php echo date('Y-m-d'); ?>" onchange="getNumber()">
                                </div>
                            </div>
                            <!-- ska -->
                            <div class="col-sm-6 text-left">
                                <div class="form-group form-group-default">
                                    <label class="text-primary fw-bold">JENIS SURAT</label>
                                    <select required name="jenis" class="custom-select form-control fw-bold">
                                        <option value="">--Pilih--</option>
                                        <?php
                                        $kodeJenisSurat = array(
                                            1 => "TTE",
                                            2 => "Biasa",
                                        );
                                        foreach ($kodeJenisSurat as $id => $value) {
                                            echo "<option value='$id'>$value</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- ska -->
                            <div class="col-sm-3 text-left">
                                <div class="form-group form-group-default bg-dop">
                                    <label class="text-primary fw-bold">NO AWAL</label>
                                    <input required name="no_awal" id="no_awal" type="text" class="form-control fw-bold" readonly placeholder="Pilih Tanggal Dulu" value="<?php echo date('d'); ?>">
                                </div>
                            </div>
                            <!-- ska -->
                            <div class="col-sm-3 text-left">
                                <div class="form-group form-group-default bg-dop">
                                    <label class="text-primary fw-bold">NO URUT SEMENTARA</label>
                                    <input required name="no_urut" type="text" class="form-control fw-bold" value="<?php echo $no; ?>" readonly>
                                </div>
                            </div>
                            <!-- ska -->
                            <div class="col-sm-6 text-left">
                                <div class="form-group form-group-default">
                                    <label class="text-primary fw-bold">NO SURAT</label>
                                    <input required name="no_surat" type="text" class="form-control fw-bold" placeholder="Masukkan Nomor Surat Selanjutnya">
                                </div>
                            </div>
                            <!-- ska -->
                            <div class="col-sm-3 text-left">
                                <div class="form-group form-group-default">
                                    <label class="text-primary fw-bold">LAMPIRAN</label>
                                    <input name="lampiran" type="text" class="form-control fw-bold" placeholder="Masukkan Lampiran">
                                </div>
                            </div>
                            <!-- ska -->
                            <div class="col-sm-3 text-left">
                                <div class="form-group form-group-default">
                                    <label class="text-primary fw-bold">SIFAT</label>
                                    <input name="sifat" type="text" class="form-control fw-bold" placeholder="Masukkan Sifat Surat">
                                </div>
                            </div>
                            <!-- ska -->
                            <div class="col-sm-6 text-left">
                                <div class="form-group form-group-default">
                                    <label class="text-primary fw-bold">PERIHAL/JUDUL SURAT</label>
                                    <input required name="perihal" type="text" class="form-control fw-bold" placeholder="Masukkan Perihal/Judul Surat">
                                </div>
                            </div>
                            <!-- ska -->
                            <div class="col-sm-6 text-left">
                                <div class="form-group form-group-default bg-dop">
                                    <label class="text-primary fw-bold"><i class="fas fa-user"></i> KEPADA</label>
                                    <input required name="kepada" type="text" class="form-control fw-bold" placeholder="1. KepadaSatu; 2. KepadaDua; 3. KepadaTiga">
                                    <small class="fw-bold text-danger">*Pisahkan dengan titik koma (;) jika penerima lebih dari satu.</small>
                                </div>
                            </div>
                            <!-- ska -->
                            <div class="col-sm-6 text-left mb-2">
                                <div class="form-group form-group-default bg-dop">
                                    <label class="text-primary fw-bold"><i class="fas fa-building"></i> TEMBUSAN</label>
                                    <input name="tembusan" type="text" class="form-control fw-bold" placeholder="1. TembusanSatu; 2. TembusanDua; 3. TembusanTiga">
                                    <small class="fw-bold text-danger">*Pisahkan dengan titik koma (;) jika tembusan lebih dari satu.</small>
                                </div>
                            </div>
                            <!-- ska -->
                            <!-- <div class="col-sm-12 text-left mb-2 mt-2">
                                <div class="form-group form-group-default bg-info">
                                    <label class="text-white fw-bold"><i class="fas fa-file-signature"></i> KALIMAT PEMBUKA</label>
                                </div>
                                <textarea class="ckeditor" id="ckedtor" name="pembuka"></textarea>
                            </div> -->
                            <!-- ska -->
                            <div class="col-sm-12 text-left mb-2 mt-2">
                                <div class="form-group form-group-default bg-info">
                                    <label class="text-white fw-bold"><i class="fas fa-file-signature"></i> ISI SURAT</label>
                                </div>
                                <textarea class="ckeditor" id="ckedtor" name="isi"></textarea>
                            </div>
                            <!-- ska -->
                            <!-- <div class="col-sm-12 text-left mb-2 mt-2">
                                <div class="form-group form-group-default bg-info">
                                    <label class="text-white fw-bold"><i class="fas fa-file-signature"></i> KALIMAT PENUTUP</label>
                                </div>
                                <textarea class="ckeditor" id="ckedtor" name="penutup"></textarea>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <button name="saveSKA" type="submit" class="btn btn-sm btn-primary fw-bold"><i class="fa fa-check"></i> Simpan</button>
                        <button type="button" class="btn btn-sm btn-danger fw-bold" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
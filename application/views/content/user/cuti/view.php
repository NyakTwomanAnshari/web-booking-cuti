<div class="card-body bg-transparent">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6 m-auto pb-4">
            <div class="row">
                <div class="col-md-12 m-auto">
                    <h1 class="text-center font-weight-bold title-rad">BOOKING CUTI</h1>
                </div>
            </div>

            <?php if(!empty($this->session->flashdata('sukses'))):?>
                <div class="alert bg-info alert-dismissible">
                    <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('sukses');?>
                </div>
            <?php elseif(!empty($this->session->flashdata('gagal_a'))):?>
                <div class="alert bg-danger alert-dismissible">
                    <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('gagal');?>
                </div>
            <?php elseif(!empty($this->session->flashdata('gagal_b'))):?>
                <div class="alert bg-danger alert-dismissible">
                    <button type="button" class="close text-warning" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('gagal_b');?>
                    <?php if(!empty($cek)){
                        foreach($cek as $rows){
                            echo '<div class="text-justify h6">'.'<span class="text-warning">Nama:</span> '.$rows->name .', <span class="text-warning">Unit:</span> '.$rows->unit.', '.'</div>';
                        }
                    }?>
                </div>
            <?php endif;?>


            <form action="" method="POST">
                <div class="card-body">

                    <div class="form-group pt-3">
                        <label for="unit" class="label-rad">Unit</label>
                        <select class="form-control select-rad" name="unit" required>
                            <option value="">-- Pilih Unit --</option>
                            <option value="BM">BM</option>
                            <option value="PBN">PBN</option>
                            <option value="PBP">PBP</option>
                            <option value="Unit UMC">Unit UMC</option>
                            <option value="Unit PNC">Unit PNC</option>
                            <option value="Unit ADC">Unit ADC</option>
                            <option value="Unit PUT">Unit PUT</option>
                            <option value="Unit PMC">Unit PMC</option>
                            <option value="KCP Darussalam">KCP Darussalam</option>
                            <option value="KCP Lueng Bata">KCP Lueng Bata</option>
                            <option value="KCP Sabang">KCP Sabang</option>
                            <option value="KCP Ulee Kareng">KCP Ulee Kareng</option>
                            <option value="KK Peunayong">KK Peunayong</option>
                            <option value="KK Lambaro">KK Lambaro</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group pt-3">
                        <label for="cuti_jenis" class="label-rad">Jenis Cuti</label>
                        <select class="form-control select-rad" name="cuti_jenis" required>
                            <option value="">-- Pilih Jenis Cuti --</option>
                            <option value="Cuti Sakit">Cuti Sakit</option>
                            <option value="Cuti Besar">Cuti Besar</option>
                            <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                            <option value="Cuti Tahun Berjalan">Cuti Tahun Berjalan</option>
                            <option value="Cuti Tahun Sebelumnya">Cuti Tahun Sebelumnya</option>
                            <option value="Cuti Nikah">Cuti Nikah</option>
                            <option value="Cuti Kepentingan Keluarga">Cuti Kepentingan Keluarga</option>
                            <option value="Izin Potong Cuti">Izin Potong Cuti</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group pt-3">
                        <label for="from_date" class="label-rad">Tanggal Mulai</label>
                        <input type="date" name="from_date" value="<?php echo set_value('from_date');?>" class="form-control input-rad" required>
                    </div>
                    
                    <div class="form-group pt-3">
                        <label for="until_date" class="label-rad">Tanggal Berakhir</label>
                        <input type="date" name="until_date" value="<?php echo set_value('until_date');?>" class="form-control input-rad" required>
                    </div>
                    
                    <div class="form-group pt-3">
                        <label for="alasan" class="label-rad">Alasan</label>
                        <textarea type="text" name="alasan" class="form-control input-rad" placeholder="Alasan.." required><?php echo set_value('alasan');?></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn bg-white btn-rad">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <div class="card mt-4">
                <h5 class="text-center p-3" style="border-bottom: 7px solid #333;border-radius: 30px;">Nama dan Rencana Cuti</h5>
                <div class="card-body table-responsive" style="overflow:auto; max-height:350px;">
                    <table id="mytable" class="table">
                        <tbody>
                            <?php foreach($mybooking as $mb):?>
                                <tr>
                                    <td>
                                        <?php echo $mb->name.' periode cuti '.date_indo($mb->from_date).' - '.date_indo($mb->until_date);?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
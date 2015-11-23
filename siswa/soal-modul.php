<?php
include 'include/dependency.php';
/* $idmodul			=	$_GET['soal-modul'];	
  $query 				= 	mysql_query("select * from soal_modul where id_modul = '$idmodul'");
  $count 				= mysql_num_rows($query); */
?>
<div>



    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Soal Modul</h3>
        </div>
        <div class="panel-body">
            
            
                <?php
                $idmodul = $_GET['soal-modul'];
                $hasil = mysql_query("select * from soal_modul where id_modul = '$idmodul'");
                $jumlah = mysql_num_rows($hasil);
                
                $urut = 0;
                while ($row = mysql_fetch_array($hasil)) {
                    $id = $row["id_soal_modul"];
                    $pertanyaan = $row["soal"];
                    $pilihan_a = $row["pa"];
                    $pilihan_b = $row["pb"];
                    $pilihan_c = $row["pc"];
                    $pilihan_d = $row["pd"];
                    ?>
            <div class="col-md-12">
                <form name="form1" method="post" action="?jawaban">
                    <input type="hidden" name="id[]" value=<?php echo $id; ?>>
                    <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
                    
                        <h3><span class="label label-success">Soal no. <?= $urut = $urut + 1; ?></span></h3>
                        <p ><?= $pertanyaan ?></p>
                        <p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="A"> <?php echo "$pilihan_a"; ?></p>
                        <p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="B"> <?php echo "$pilihan_b"; ?></p>
                        <p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="C"> <?php echo "$pilihan_c"; ?></p>
                        <p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="D"> <?php echo "$pilihan_d"; ?></p>

             </div>       


    <?php
}
?>
        </div>
        <div class="panel-footer">
            <button type="submit" class=" btn-lg btn btn-success" name="selesai">Selesai</button>

        </div>
        </form>
    </div>
</div>
</p>

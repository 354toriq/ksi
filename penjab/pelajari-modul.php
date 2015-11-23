<?php
include 'include/dependency.php';
$idmodul = $_GET['pelajari-modul'];
$query = mysql_query("select * from modul where id_modul = '$idmodul'");
$modul = mysql_fetch_object($query);
?>

<form method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">

            <h3 class="panel-title"><?= $modul->judul ?></h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#pelajari" aria-controls="pelajari" role="tab" data-toggle="tab">Pelajari Modul</a></li>
                <li role="presentation"><a href="#modul-soal" aria-controls="modul-soal" role="tab" data-toggle="tab">Soal Modul</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="pelajari">
                    <div class="col-md-6">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="http://localhost/ksi/modul/<?php echo $modul->file; ?>" style="width:600px; height:400px;" frameborder="0"></iframe>		
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item img-thumbnail" style="width:600px; height:400px;" src="//www.youtube.com/embed/<?= $modul->video ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane " id="modul-soal">
                    
                        <p>
                            <?php
                            $hasil = mysql_query("select * from soal_modul where id_modul = '$modul->id_modul'");
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
                            <form name="form1" method="post" action="?jawaban">
                                <input type="hidden" name="id[]" value=<?php echo $id; ?>>
                                <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>

                                <br><b>No : <?= $urut = $urut + 1; ?></b><br>
                                <font align="justify"><?= $pertanyaan ?></font>
                                <p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="A"> <?php echo "$pilihan_a"; ?></p>
                                <p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="B"> <?php echo "$pilihan_b"; ?></p>
                                <p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="C"> <?php echo "$pilihan_c"; ?></p>
                                <p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="D"> <?php echo "$pilihan_d"; ?></p>
                                <p>Kunci Jawaban : <?=$row['kunci']?></p>




                                <?php
                            }
                            ?>
                    </div>
                </div>
            



        </div>


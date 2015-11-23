<?php
include 'include/dependency.php';
include 'include/database.php';
if (isset($_GET['nilai-modul'])) {
    $idnilaimodul = $_GET['nilai-modul'];
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Hasil Nilai Latihan Modul : 

                <?php
                
                $query = mysql_query("select * from nilai_soal where id_nilai = '$idnilaimodul'");
                $getnilai = mysql_fetch_object($query);
                $querymodul = mysql_query("select * from modul where id_modul = '$getnilai->id_modul'");
                $getmodul = mysql_fetch_object($querymodul);
                echo $getmodul->judul;
                ?>

            </h3>
        </div>
        <div class="panel-body">

            <div class="col-md-2">

                <img src="../img/profil/<?php
                if (empty($siswa->foto)) {
                    echo "noimg.jpg";
                } else {
                    echo $siswa->foto;
                }
                ?>" class="img img-circle" alt="User Image"  >
            </div>
            <div class="col-md-10">

                <div class="row">

                    <form class="form-horizontal" >
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class=" control-label">ID Siswa</label>
                                <p><?= $siswa->id_siswa ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class=" control-label">Nama	Siswa 	</label>
                                <p><?= $siswa->nama ?><p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">PKBM</label>
                                <p><?= $sekolah->nama ?></p>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Paket yang diambil</label>
                                <p><?= $siswa->id_paket ?></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <?php 
                    
                    ?>
                    <form class="form-horizontal" >
                        <div class="col-md-3">
                            <div class="form-group">
                                <h2><span class="label label-primary">Benar	 :  <?= $getnilai->benar ?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h2><span class="label label-danger">Salah 	 :  <?= $getnilai->salah ?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h2><span class="label label-default">Kosong :  <?= $getnilai->kosong ?></span></h2>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h2><span class="label label-success">Nilai    :  <?= $getnilai->nilai ?></span></h2>
                            </div>
                        </div>
                    </form>
                </div>

            </div>



        </div>


    </div>



    <?php
} else {
    if (isset($_POST['selesai'])) {
        $pilihan = $_POST["pilihan"];
        $id_soal = $_POST["id"];
        $jumlah = $_POST['jumlah'];

        $score = 0;
        $benar = 0;
        $salah = 0;
        $kosong = 0;

        for ($i = 0; $i < $jumlah; $i++) {
            //id nomor soal
            $nomor = $id_soal[$i];

            //jika user tidak memilih jawaban
            if (empty($pilihan[$nomor])) {
                $kosong++;
            } else {
                //jawaban dari user
                $jawaban = $pilihan[$nomor];

                //cocokan jawaban user dengan jawaban di database
//                $query = mysql_query("select * from soal_modul where id_soal_modul='$nomor' and kunci='$jawaban'");
                $query = mysql_query("select * from soal_modul where id_soal_modul='$nomor'");
                $cek = mysql_num_rows($query);
                $modul = mysql_fetch_object($query);
                if ($jawaban == $modul->kunci) {

                    $benar++;
                } else {
                    //jika salah
                    $salah++;
                }
            }

            $score = $benar * 20;
        }

        $select = mysql_query("select * from nilai_soal where id_modul = '$modul->id_modul' and id_siswa = '$siswa->id_siswa'");
        //echo $select;
        if ($select < 1) {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Nilai untuk soal modul ini telah masuk sebelumnya</strong>
            </div>
            <?php
        } else {
            $date = date('Y-m-d H:i:s');
            $sqlinsert = "insert into nilai_soal values('','$modul->id_modul','$siswa->id_siswa','$score','$salah','$benar','$kosong','$date')";
            $query = mysql_query($sqlinsert);
            ?>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Hasil Nilai Latihan Modul : 

                        <?php
                        $query = mysql_query("select * from modul where id_modul = '$modul->id_modul'");
                        $getmodul = mysql_fetch_object($query);
                        echo $getmodul->judul;
                        ?>

                    </h3>
                </div>
                <div class="panel-body">

                    <div class="col-md-2">

                        <img src="../img/profil/<?php
                        if (empty($siswa->foto)) {
                            echo "noimg.jpg";
                        } else {
                            echo $siswa->foto;
                        }
                        ?>" class="img img-circle" alt="User Image"  >
                    </div>
                    <div class="col-md-10">

                        <div class="row">

                            <form class="form-horizontal" >
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class=" control-label">ID Siswa</label>
                                        <p><?= $siswa->id_siswa ?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class=" control-label">Nama	Siswa 	</label>
                                        <p><?= $siswa->nama ?><p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">PKBM</label>
                                        <p><?= $sekolah->nama ?></p>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Paket yang diambil</label>
                                        <p><?= $siswa->id_paket ?></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">

                            <form class="form-horizontal" >
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h2><span class="label label-primary">Benar	 :  <?= $benar ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h2><span class="label label-danger">Salah 	 :  <?= $salah ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h2><span class="label label-default">Kosong :  <?= $kosong ?></span></h2>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h2><span class="label label-success">Nilai    :  <?= $score ?></span></h2>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>



                </div>


            </div>
            </div>


            <?php
        }
    }
}
?>




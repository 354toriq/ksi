<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>Employer | Daftar</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <?php
    include 'include/dependency.php';
    include 'include/database.php';
    ?>
    <script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
</head>
</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if (match)
                var color = match[1];
            if (color) {
                $('body').removeClass(function(index, css) {
                    return (css.match(/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});

        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">


    <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
    <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
    <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
    <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!--> 

    <!--<![endif]-->



    <br>
    <br><br>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <div class="panel panel-primary">
                <div class="panel-heading">

                    <h3 class="panel-title">Pendaftaran Employer</h3>
                </div>
                <div class="panel-body">


                    <form action="" method='post' enctype="multipart/form-data" >


                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" placeholder="Nama Panjang  ...  " type="text" name='nama' required id='nama'>
                        </div>
                        <div id='resultnama'></div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="kelamin" id="optionsRadios1" value="Pria" checked=""><span class="circle"></span><span class="check"></span>
                                    Pria
                                </label>
                            </div>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="kelamin" id="optionsRadios2" value="Wanita"><span class="circle"></span><span class="check"></span>
                                    Wanita
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="input-group date form_date "  data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" type="text" name="tgllahir" placeholder='Tgl Lahir'>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <script type="text/javascript">
                                $('.form_date').datetimepicker({
                                    language: 'id',
                                    weekStart: 1,
                                    todayBtn: 1,
                                    autoclose: 1,
                                    todayHighlight: 1,
                                    startView: 2,
                                    minView: 2,
                                    forceParse: 0
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Kontak</label>
                            <input class="form-control" placeholder="Telp.   " type="number" name='kontak' required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" placeholder="Email" type="email" name='email' required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" placeholder="Email" type="password" name='password' required>
                        </div>
                        
                </div>              
                <div class="panel-footer">

                    <a href="masuk_employer.php" class="btn btn-success btn-lg">Kembali</a>&nbsp;
                    <button class="btn btn-primary btn-lg" name='btn-simpan'>&nbsp;Daftar Employer</button> 


                </div>
        </form>
        <script>
            $(function() {
                $("#nama").keyup(function() {
                    // getting the value that user typed
                    var valnama = $("#nama").val();
                    // forming the queryString
                    

                    // if checkString is not empty
                    
                        // ajax call
                        $.ajax({
                            type: "POST",
                            url: "daftar-employer.php",
                            data: "ceknama=" + valnama,
                            success: function(hasil) {
                                // this happen after we get result

                                if (hasil == 'true') {
                                $("#resultnama").append(html);
                                    $("#resultnama").html('<span class="label label-success">Ok</span>');

                                }
                                else if (hasil == 'false') {
                                    $("#resultnama").html('<span class="label label-danger">Not</span>');
                                }
                            }
                        });
                    
                    
                });
            });
        </script>    
        <?php
//        if (isset($_POST['nama'])) {
//            $nama = $_POST['nama'];
//            $mysql = mysql_query("select * from employer where nama like %'$nama'%");
//            $num = mysql_num_rows($mysql);
//            if ($num >= 0) {
//                echo 'false';
//            } else {
//                echo 'true';
//            }
//        }
        ?>            
        <?php
        if (isset($_POST['btn-simpan'])) {
            $sql = mysql_query("select max(id_employer) as id from `employer`");
            $data = mysql_fetch_array($sql);
            $kodeawal = substr($data['id'], 6, 4); //ambil string mulai dari karakter ke 10 sampe 8 digit ke belakang
            $tambahkode = $kodeawal + 1; //string yang sdh diambil ditambah1
            $awal = 'EMP';
            $date = date("y");
            if ($tambahkode < 10) {
                $kode = $awal . $date . '0000'; // mencetak komponen id terdiri dari idsekolah+$date+"0000"
                $kodejadi = $kode . $tambahkode; //kode hasil 
            } elseif ($tambahkode < 100) {
                $kode = $awal . $date . '000';
                $kodejadi = $kode . $tambahkode;
            } elseif ($tambahkode < 1000) {
                $kode = $awal . $date . '00';
                $kodejadi = $kode . $tambahkode;
            } else {
                $kode = $awal . $date . "0";
                $kodejadi = $kode . $tambahkode;
            }
            $idemp = $kodejadi;
            $nama = mysql_escape_string($_POST['nama']);
            $kelamin = $_POST['kelamin'];
            $tgllahir = $_POST['tgllahir'];
            //$fotoemp = $_FILES['Filegambar']['name'];
            //$pdkn = $_POST['pendidikan'];
            //$jenjang = $_POST['jenjang'];
            $email = $_POST['email'];
            $kontak = $_POST['kontak'];
            $password = mysql_escape_string($_POST['password']);
            $alamat = mysql_escape_string($_POST['alamat']);
            //$psh = $_POST['perusahaan'];
            //$gambar = $_FILES['Filegambar']['name'];
            //$sizefoto = $_FILES['Filegambar']['size'];
//            $maxsize = 2000000;
//            if (($sizefoto >= $maxsize) || ($sizefoto == 0)) {
//
//                echo "<script>alert('File Gambar harus kurang dari 2 MB, ukuran sekarang $sizefoto');</script>";
//                die();
//            }
//            $getidpsh = $_POST['perusahaan-ada'];
//            $jb_p = $_POST['jabatan_perusahaan'];
//            $nm_p = $_POST['nama_perusahaan'];
//            $ngr_p = $_POST['negara_perusahaan'];
//            $prv_p = $_POST['prov_perusahaan'];
//            $em_p = $_POST['email_perusahaan'];
//            $ktk_p = $_POST['kontak_perusahaan'];
//            $web_p = $_POST['web_perusahaan'];
//            $logo = $_FILES['logo']['name'];
//            $almt_p = mysql_escape_string($_POST['alamat_perusahaan']);
//            $desk_p = mysql_escape_string($_POST['deskp_perusahaan']);
//            if ($psh == "1") {
//                $tambah = "INSERT INTO employer values ('$idemp','$getidpsh','$nama','$kelamin','$tgllahir','$alamat','$gambar','$pdkn','$jenjang','$password','$email','$kontak','$jb_p','0')";
//                $query = mysql_query($tambah);
//                $empfotodir = "../img/profil-employer/";
//                $datafotoemp = $empfotodir . basename($fotoemp);
//                $move_fotoemp = move_uploaded_file($_FILES['Filegambar']['tmp_name'], $datafotoemp);
//            } elseif ($psh == "2") {
//                $tambahpshbaru = "INSERT INTO perusahaan values('','$nm_p','$ngr_p','$prv_p','$em_p','$ktk_p','$almt_p','$web_p','$desk_p','')";
//                $querypsh = mysql_query($tambahpshbaru);
//                $selpsh = mysql_query("select * from perusahaan order by 'id_perusahaan' desc");
//                $getpsh = mysql_fetch_object($selpsh);
//                $getidpsh = $getpsh->id_perusahaan;
//                $tambah = "INSERT INTO employer values ('$idemp','$getidpsh','$nama','$kelamin','$tgllahir','$alamat','$gambar','$pdkn','$jenjang','$password','$email','$kontak','$jb_p','0')";
//                $query = mysql_query($tambah);
//                $empfotodir = "../img/profil-employer/";
//                $datafotoemp = $empfotodir . basename($fotoemp);
//                $move_fotoemp = move_uploaded_file($_FILES['Filegambar']['tmp_name'], $datafotoemp);
//                $emplogodir = "../img/logo-perusahaan/";
//                $datalogo = $emplogodir . basename($logo);
//                $move_logo = move_uploaded_file($_FILES['logo']['tmp_name'], $datalogo);
//            }
            $sql = "Insert into employer  values ('$idemp','','$nama','$kelamin','$tgllahir','$alamat','','','','$password','$email','$kontak','','','')";   
            $query = mysql_query($sql);
            if ($query) {

                echo
                '
							<div class="alert alert-success" role="alert">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Pendaftaran anda berhasil diajukan, cek email untuk mengkonfirmasikan. 
							</div>
							<meta http-equiv="refresh" content= "6;URL=masuk_employer.php"/> 
							';
            } else {
                echo $sql;
            }
        }
        ?>
    </tbody>
</table>
</div>


</div>

</div>

</body></html>

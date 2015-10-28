
 <header class="header">
            <a href="index.php" class="logo">
                Kaiyisah
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
                    </nav>
                </header>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                                <div class="pull-left image">
								
                                    <img src="../img/profil/<?=$siswa->foto?>" class="img-circle" alt="User Image" />
                                </div>
                                <div class="pull-left info">
                                    <p>Siswa</p>

                                    <a href="#"><i class="fa fa-circle text-success"></i><?=$siswa->nama?></a>
									   
                                </div>
                            </div>
                            
                            <!-- /.search form -->
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                <li >
                                   <a href="index.php" >
                                       <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['lihat-sekolah'])){ echo 'class="active"'; }?> data-popover="true" ><a href="data-sekolah.php?detail=<?=$sekolah->id_sekolah?>" data-target=".sekolah" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-university"></i> PKBM<i class="fa fa-collapse"></i></a></li>
								<li <?php if(isset($_GET['lihat-paket'])){ echo 'class="active"'; }?> data-popover="true" ><a href="#" data-target=".paket" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-cube"></i> Paket Kesetaraan<i class="fa fa-collapse"></i></a></li>
								<li ><ul class="paket nav nav-list  <?php if(isset($_GET['lihat-paket']) OR isset($_GET['tambah-paket'])){echo 'collapsed'; } else {echo 'collapse'; }?>">            		
									<li ><a href="data-paket.php?lihat-paket" >&nbsp;&nbsp;<span class="fa fa-align-justify"></span>&nbsp;&nbsp;Lihat</a></li>
								</ul>
								</li>		
								
								<li <?php if(isset($_GET['lihat-matpel'])){ echo 'class="active"'; }?> data-popover="true" ><a href="#" data-target=".matpel" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-book"></i> Mata Pelajaran<i class="fa fa-collapse"></i></a></li>
								<li ><ul class="matpel nav nav-list  <?php if(isset($_GET['lihat-matpel']) OR isset($_GET['tambah-matpel'])){echo 'collapsed'; } else {echo 'collapse'; }?>">            
									
									<li ><a href="data-matpel.php?lihat-matpel" >&nbsp;&nbsp;<span class="fa fa-align-justify"></span>&nbsp;&nbsp;Lihat</a></li>
								</ul>
								</li>	
								
								<li <?php if(isset($_GET['lihat-absensi']) OR isset($_GET['detail-absensi'])){ echo 'class="active"'; }?> data-popover="true" >
                                    <a href="data-absensi.php?lihat-absensi" >
                                        <span class="fa fa-hand-o-up"></span> Absensi
                                    </a>
                                </li>
								
								
								<li <?php if(isset($_GET['lihat-nilai']) OR isset($_GET['detail-nilai'])){ echo 'class="active"'; }?> data-popover="true" >
                                    <a href="data-nilai.php?lihat-nilai" >
                                        <span class="fa fa-check-square-o"></span> Nilai
                                    </a>
                                </li>
								
								<li <?php if(isset($_GET['lihat-lowongan']) OR isset($_GET['tambah-lowongan']) OR isset($_GET['kategori-lowongan'])){ echo 'class="active"'; }?> data-popover="true" ><a href="#" data-target=".lowongan" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-briefcase"></i> Pekerjaan <i class="fa fa-collapse"></i></a></li>
								<li ><ul class="lowongan nav nav-list  <?php if(isset($_GET['lihat-lowongan']) OR isset($_GET['tambah-lowongan']) OR isset($_GET['kategori-lowongan']) ){echo 'collapsed'; } else {echo 'collapse'; }?>">            
									<li ><a href="data-lowongan.php?lihat-lowongan" >&nbsp;&nbsp;<span class="fa fa-align-justify"></span>&nbsp;&nbsp;Lowongan</a></li>
								</ul>
								</li>
								
								<li>
                                    <a href="data-siswa.php?detail=<?=$id?>" >
                                        <i class="fa fa-user"></i> <span>Akun Siswa</span>
                                    </a>
                                </li>
								<li>
                                    <a href="include/proses-logout.php">
                                        <i class="fa fa-sign-out"></i> <span>Keluar</span>
                                    </a>
                                </li>
								

							</ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>
				<br>
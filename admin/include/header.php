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
                                    <img src="img/admin.png" class="img-circle" alt="User Image" />
                                </div>
                                <div class="pull-left info">
                                    <p>Administrator</p>

                                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
                                <li <?php if(isset($_GET['lihat-sekolah']) OR isset($_GET['tambah-sekolah'])){ echo 'class="active"'; }?> data-popover="true" ><a href="#" data-target=".sekolah" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-university"></i> PKBM<i class="fa fa-collapse"></i></a></li>
								<li ><ul class="sekolah nav nav-list  <?php if(isset($_GET['lihat-sekolah']) OR isset($_GET['tambah-sekolah'])){echo 'collapsed'; } else {echo 'collapse'; }?>">            
									<li ><a href="data-sekolah.php?tambah-sekolah">&nbsp;&nbsp;<span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah</a></li>
									<li ><a href="data-sekolah.php?lihat-sekolah" >&nbsp;&nbsp;<span class="fa fa-align-justify"></span>&nbsp;&nbsp;Lihat</a></li>
								</ul>
								</li>
								
								<li <?php if(isset($_GET['lihat-penjab']) OR isset($_GET['tambah-penjab'])){ echo 'class="active"'; }?> data-popover="true" ><a href="#" data-target=".penjab" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-hand-o-right"></i> Penanggung Jawab<i class="fa fa-collapse"></i></a></li>
								<li ><ul class="penjab nav nav-list  <?php if(isset($_GET['lihat-penjab']) OR isset($_GET['tambah-penjab'])){echo 'collapsed'; } else {echo 'collapse'; }?>">            
									<li ><a href="data-penjab.php?tambah-penjab">&nbsp;&nbsp;<span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah</a></li>
									<li ><a href="data-penjab.php?lihat-penjab" >&nbsp;&nbsp;<span class="fa fa-align-justify"></span>&nbsp;&nbsp;Lihat</a></li>
								</ul>
								</li>		
								
								<li <?php if(isset($_GET['lihat-siswa']) OR isset($_GET['tambah-siswa'])){ echo 'class="active"'; }?> data-popover="true" ><a href="#" data-target=".siswa" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-users"></i> Siswa<i class="fa fa-collapse"></i></a></li>
								<li ><ul class="siswa nav nav-list  <?php if(isset($_GET['lihat-siswa']) OR isset($_GET['tambah-siswa'])){echo 'collapsed'; } else {echo 'collapse'; }?>">            
									<li ><a href="data-siswa.php?tambah-siswa">&nbsp;&nbsp;<span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah</a></li>
									<li ><a href="data-siswa.php?lihat-siswa" >&nbsp;&nbsp;<span class="fa fa-align-justify"></span>&nbsp;&nbsp;Lihat</a></li>
								</ul>
								</li>		
								
								<li <?php if(isset($_GET['lihat-paket']) OR isset($_GET['tambah-paket'])){ echo 'class="active"'; }?> data-popover="true" ><a href="#" data-target=".paket" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-cube"></i> Paket Kesetaraan<i class="fa fa-collapse"></i></a></li>
								<li ><ul class="paket nav nav-list  <?php if(isset($_GET['lihat-paket']) OR isset($_GET['tambah-paket'])){echo 'collapsed'; } else {echo 'collapse'; }?>">            
									<li ><a href="data-paket.php?tambah-paket">&nbsp;&nbsp;<span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah</a></li>
									<li ><a href="data-paket.php?lihat-paket" >&nbsp;&nbsp;<span class="fa fa-align-justify"></span>&nbsp;&nbsp;Lihat</a></li>
								</ul>
								</li>		
								
								<li <?php if(isset($_GET['lihat-matpel']) OR isset($_GET['tambah-matpel'])){ echo 'class="active"'; }?> data-popover="true" ><a href="#" data-target=".matpel" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-book"></i> Mata Pelajaran<i class="fa fa-collapse"></i></a></li>
								<li ><ul class="matpel nav nav-list  <?php if(isset($_GET['lihat-matpel']) OR isset($_GET['tambah-matpel'])){echo 'collapsed'; } else {echo 'collapse'; }?>">            
									<li ><a href="data-matpel.php?tambah-matpel">&nbsp;&nbsp;<span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah</a></li>
									<li ><a href="data-matpel.php?lihat-matpel" >&nbsp;&nbsp;<span class="fa fa-align-justify"></span>&nbsp;&nbsp;Lihat</a></li>
								</ul>
								</li>		
								
								<li <?php if(isset($_GET['lihat-lowongan']) OR isset($_GET['tambah-lowongan']) OR isset($_GET['kategori-lowongan'])){ echo 'class="active"'; }?> data-popover="true" ><a href="#" data-target=".lowongan" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-briefcase"></i> Pekerjaan <i class="fa fa-collapse"></i></a></li>
								<li ><ul class="lowongan nav nav-list  <?php if(isset($_GET['lihat-lowongan']) OR isset($_GET['tambah-lowongan']) OR isset($_GET['kategori-lowongan']) ){echo 'collapsed'; } else {echo 'collapse'; }?>">            
									<li ><a href="data-lowongan.php?kategori-lowongan">&nbsp;&nbsp;<span class="fa fa-cog"></span>&nbsp;&nbsp;Kategori Lowongan</a></li>
									<li ><a href="data-lowongan.php?employer">&nbsp;&nbsp;<span class="fa fa-user"></span>&nbsp;&nbsp;Employer</a></li>
									<li ><a href="data-lowongan.php?tambah-lowongan">&nbsp;&nbsp;<span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah Lowongan</a></li>
									<li ><a href="data-lowongan.php?lihat-lowongan" >&nbsp;&nbsp;<span class="fa fa-align-justify"></span>&nbsp;&nbsp;Lihat</a></li>
								</ul>
								</li>		
								
								<li <?php if(isset($_GET['admin.php'])){ echo 'class="active"'; }?> >
                                    <a href="admin.php" >
                                        <i class="fa fa-user"></i> <span>Akun Administrator</span>
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
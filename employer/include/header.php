
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
								
                                    <img src="../img/profil-employer/<?=$emp->foto?>" class="img-circle" alt="User Image" />
                                </div>
                                <div class="pull-left info">
                                    <p>Employer</p>

                                    <a href="#"><i class="fa fa-circle text-success"></i><?=$emp->nama?></a>
									   
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
                               
								<li <?php if(isset($_GET['lihat-lowongan'])){ echo 'class="active"'; }?> data-popover="true" ><a href="#" data-target=".low" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-newspaper-o"></i> Lowongan<i class="fa fa-collapse"></i></a></li>
								<li ><ul class="low nav nav-list  <?php if(isset($_GET['lihat-paket']) OR isset($_GET['tambah-paket'])){echo 'collapsed'; } else {echo 'collapse'; }?>">            		
								    <li ><a href="data-lowongan.php?tambah-lowongan" >&nbsp;&nbsp;<span class="fa fa-plus"></span>&nbsp;&nbsp;Tambah Lowongan</a></li>
									<li ><a href="data-lowongan.php?lihat-lowongan" >&nbsp;&nbsp;<span class="fa fa-align-justify"></span>&nbsp;&nbsp;Lihat Lowongan</a></li>
								</ul>
								</li>		
								
								
								<li>
                                    <a href="detail-employer.php?detail=<?=$id?>" >
                                        <i class="fa fa-user"></i> <span>Akun </span>
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
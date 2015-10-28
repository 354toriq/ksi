	<?php
	include 'include/dependency.php';
	/*$idmodul			=	$_GET['soal-modul'];	
	$query 				= 	mysql_query("select * from soal_modul where id_modul = '$idmodul'");
	$count 				= mysql_num_rows($query);*/
	?>
	<div>

        
    
	<div class="panel panel-primary">
	<div class="panel-heading">
	<h3 class="panel-title">Soal Modul</h3>
	</div>
	<div class="panel-body">
        <p>
        <?php
		$idmodul			=	$_GET['soal-modul'];
		$hasil=mysql_query("select * from soal_modul where id_modul = '$idmodul'");
		$jumlah=mysql_num_rows($hasil);
		$urut=0;
		while($row =mysql_fetch_array($hasil))
		{
			$id=$row["id_soal_modul"];
			$pertanyaan=$row["soal"];
			$pilihan_a=$row["pa"];
			$pilihan_b=$row["pb"];
			$pilihan_c=$row["pc"];
			$pilihan_d=$row["pd"]; 
			
			?>
			<form name="form1" method="post" action="?jawaban">
			<input type="hidden" name="id[]" value=<?php echo $id; ?>>
			<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
			<blockquote>
			<h3><span class="label label-success">Soal no. <?=$urut=$urut+1;?></span></h3>
			<font align="justify"><?=$pertanyaan?></font>
			<p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="A"> <?php echo "$pilihan_a";?></p>
			<p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="B"> <?php echo "$pilihan_b";?></p>
			<p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="C"> <?php echo "$pilihan_c";?></p>
			<p><input type="radio" name="pilihan[<?php echo $id; ?>]" id="optionsRadios1" value="D"> <?php echo "$pilihan_d";?></p>
	
			</blockquote>
			
			
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
		 <?php 
	if(isset($_GET['jawaban'])){
       if(isset($_POST['selesai']))
	   {
			$pilihan=$_POST["pilihan"];
			$id_soal=$_POST["id"];
			$jumlah=$_POST['jumlah'];
			
			$score=0;
			$benar=0;
			$salah=0;
			$kosong=0;
			
			for ($i=0;$i<$jumlah;$i++){
				//id nomor soal
				$nomor=$id_soal[$i];
				
				//jika user tidak memilih jawaban
				if (empty($pilihan[$nomor])){
					$kosong++;
				}else{
					//jawaban dari user
					$jawaban=$pilihan[$nomor];
					
					//cocokan jawaban user dengan jawaban di database
					$query=mysql_query("select * from soal_modul where id_soal_modul='$nomor' and kunci='$jawaban'");
					
					$cek=mysql_num_rows($query);
					
					if($cek){
						//jika jawaban cocok (benar)
						$benar++;
					}else{
						//jika salah
						$salah++;
					}
					
				} 
				$score = $benar*20;
			}
		
		?>
        
		hahahahahah
		
		<!--<tr>
			<td width="12%">Benar</td><td width="88%">= <?php echo $benar;?> soal x 5 point</font></td>
		</tr>
		<tr>
			<td><font color="#FFFFFF">Salah</font></td><td><font color="#FFFFFF">= <?php echo $salah;?> soal </font></td>
		</tr>
		<tr>
			<td><font color="#FFFFFF">Kosong</font></td><td><font color="#FFFFFF">= <?php echo $kosong;?> soal </font></td>
		</tr>
		<tr>
			<td><font color="#FFFFFF"><b>Score</b></font></td><td><font color="#FFFFFF">= <b><?php echo $score;?></b> Point</font></td>
		</tr>
		</table> 
        
        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']?>" />
        <input type="hidden" name="benar" value="<?php echo $benar;?>" />
        <input type="hidden" name="salah" value="<?php echo $salah;?>" />
        <input type="hidden" name="kosong" value="<?php echo $kosong;?>" />
        <input type="hidden" name="point" value="<?php echo $score;?>" />
        <p></p>
        <input type="submit" name="submit" value="Simpan Nilai" onclick="return confirm('Apakah Anda yakin akan menyimpan nilai ujian?')"/>
        -->
		
		
		<div class="modal fade" id="myModal">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
		</div>
		<div class="modal-body">
        <p>One fine body&hellip;</p>
		</div>
		<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
		</div>
		</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
		</div>
        <?php 
		 } }
		?>





    <?php if($is_juara): ?>
    	<?php if($id_jenjang != 3): ?>
    		<div class="row">
	    		<div class="col-md-12">
	    			<div class="box">
				        <div class="box-header">
				          <h4 class="box-title" style="font-weight: bolder; color: green">Selamat kepada peserta yang memperoleh medali </h4>
				        </div>
				        <!-- /.box-header -->
				        <div class="box-body no-padding">
							<table class="table table-condensed table-bordered">
					    		<tr>
					    			<td width="15%">Nomor Peserta</td>
					    			<td>Mata Lomba</td>
						    		<td>Nama Peserta</td>
						    		<td>Medali</td>
					    		</tr>
					    		<?php foreach ($pendaftaran as $key => $value) :?>
					    			<?php if($value->juara): ?>
					    				<tr>
							    			<td><?php echo $value->nomor_peserta ?></td>
							    			<td><?php echo $value->nmlomba ?></td>
								    		<td>
								    			<?php $warna ='#fff'; if($this->bm->select_where('ms_juara', 'id', $value->juara)->row()->warna) {
								                    $warna = '#'. $this->bm->select_where('ms_juara', 'id', $value->juara)->row()->warna;
								                  }
								                  ?>
								    			<?php $peserta = $this->bm->select_where('tr_peserta', 'id_pendaftaran', $value->id)->result();
						                              $name = array();
						                              $i = 0; 
						                              if($peserta){
						                                foreach ($peserta as $key3 => $value3) {
						                                  $name[$i] = $value3->nmpeserta;
						                                  $i++;
						                                }
						                              }
						                          ?>
						                          <?php if($name){ echo ' <b>( '.implode(', ', $name).')</b>';} else{echo '-';}?>
								    		</td>
							    			<?php if($value->juara < 4): ?>
							    				<td style="background: <?php echo $warna ?>">
								    				<?php echo $this->bm->select_where('ms_juara', 'id', $value->juara)->row()->medali ?>
							    				</td>
							    			<?php else : ?>
							    				<?php $harapan = $value->juara-3; ?>
							    				<td style="background:#f4f4f4">Juara Harapan <?php echo $harapan ?></td>
							    			<?php endif ?>
							    		</tr>
					    			<?php endif ?>
					    		<?php endforeach ?>
					    	</table>
				        </div>
				      </div>
	    		</div>
	    	</div>
    	<?php else : ?>
    		<div class="row">
	    		<div class="col-md-12">
	    			<div class="box">
				        <div class="box-header">
				          <h4 class="box-title" style="font-weight: bolder; color: green">Selamat kepada peserta yang memperoleh medali </h4>
				        </div>
				        <!-- /.box-header -->
				        <div class="box-body no-padding">
							<table class="table table-condensed table-bordered">
					    		<tr>
					    			<td width="15%">Nomor Peserta</td>
					    			<td>Mata Lomba</td>
					    			<td>Kategori</td>
						    		<td>Nama Peserta</td>
						    		<td>Medali</td>
					    		</tr>
					    		<?php foreach ($pendaftaran as $key => $value) :?>
					    			<?php if($value->juara): ?>
					    				<tr>
							    			<td><?php echo $value->nomor_peserta ?></td>
							    			<td><?php echo $value->nmlomba ?></td>
							    			<td><?php echo $value->nmkategori ?></td>
								    		<td>
								    			<?php $warna ='#fff'; if($this->bm->select_where('ms_juara', 'id', $value->juara)->row()->warna) {
								                    $warna = '#'. $this->bm->select_where('ms_juara', 'id', $value->juara)->row()->warna;
								                  }
								                  ?>
								    			<?php $peserta = $this->bm->select_where('tr_peserta', 'id_pendaftaran', $value->id)->result();
						                              $name = array();
						                              $i = 0; 
						                              if($peserta){
						                                foreach ($peserta as $key3 => $value3) {
						                                  $name[$i] = $value3->nmpeserta;
						                                  $i++;
						                                }
						                              }
						                          ?>
						                          <?php if($name){ echo ' <b>( '.implode(', ', $name).')</b>';} else{echo '-';}?>
								    		</td>
							    			<?php if($value->juara < 4): ?>
							    				<td style="background: <?php echo $warna ?>">
								    				<?php echo $this->bm->select_where('ms_juara', 'id', $value->juara)->row()->medali ?>
							    				</td>
							    			<?php else : ?>
							    				<?php $harapan = $value->juara-3; ?>
							    				<td style="background:#f4f4f4">Juara Harapan <?php echo $harapan ?></td>
							    			<?php endif ?>
							    		</tr>
					    			<?php endif ?>
					    		<?php endforeach ?>
					    	</table>
				        </div>
				      </div>
	    		</div>
	    	</div>
    	<?php endif ?>
    <?php else : ?>
		<div class="container">
	    	 <b>Anda Berhasil Login, Selamat Datang</b>
		    <?php echo $nama ?>
		</div>
    <?php endif ?>
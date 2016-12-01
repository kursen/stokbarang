<?php
require("../Model/session.php");
include('layout/header.php');
include('layout/datetimepicker.php');
include('layout/datatables.php');
include('layout/validator.php');
?>
<body>
<?php include('layout/navigation.php'); ?>
	<br/>
   <div class="alert alert-info">
  <h2><i class="glyphicon glyphicon-shopping-cart"></i>  Barang Keluar
  </h2>
  
    </div>
	<!--end of jumbotron-->
	<?php
	require("../Model/config.php");
	$id=0;
	$url= $_SERVER['QUERY_STRING'];
	if($url!=''){
		$id=substr($url,3);
	}
	$show = mysqli_query($connection,"select * from penjualan_barang where no_transaksipenjualan=$id");
	$lists = mysqli_fetch_assoc($show);
	$query = mysqli_query($connection,"select kode_barang,nama_barang from masterbarang");
	?>
	
	<div class="container">
      <!-- Example row of columns -->
      <div class="row">
		  <div class="col-md-5 col-sm-5">
			<form class="form-horizontal" method="post" id="frm-keluar">
				<div class="form-group">
				  <input type="hidden" name="no_transaksi" value="<?php echo $id; ?>">
					<label for="" class="col-sm-4 control-label">Kode Barang</label>
					<input type="hidden" id="kdbrg" value="<?php print $lists['kode_barang'] ?>"/>
					<div class="col-sm-6">
					<input type="hidden" id="index" value="" />
					  <select class="form-control" id="kodebrg" name="kode_barang" required>
					 <option value=""></option>
					  <?php
					  while($data =mysqli_fetch_array($query)){
						?>
						<option value="<?php print $data['kode_barang']; ?>"><?php print $data['nama_barang']; ?></option>
						<?php
					  }
					  ?>
					  </select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-4 control-label">Harga Satuan</label>
					<div class="col-sm-6">
					  <input type="text" id="satuan" class="form-control" name="harga_penjualan" value="<?php print $lists['harga_penjualan']; ?>" required>
					</div>
				  </div>
  
			   <div class="form-group">
				<label for="" class="col-sm-4 control-label">Jumlah</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="jlh" name="jumlah" value="<?php print $lists['jumlah']; ?>" required>
				</div>
			  </div>
  
  
			  <div class="form-group">
				<div class="col-sm-offset-4 col-sm-5">
				  <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Tambah">Tambah</button>
				  <a href="brgkeluar.php" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Batal">Batal</a>
				</div>
			  </div>
			</form>
		  </div>
		  <div class="col-md-7 col-sm-7">
		  <form class="form-horizontal" method="post" id="form-penjualan" action="../Controller/savebrgkeluar.php">
		  <div class="form-group">
					<label for="" class="col-sm-3 control-label">Tanggal Penjualan</label>
						<div class="col-sm-4">
							 <div class="input-group">
							 <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
							  <input type="text" class="form-control out" id="dtpicker" name="tanggal_penjualan" value="<?php print $lists['tanggal_penjualan']; ?>" required>
							</div>
						</div>
				</div>
			   <div class="form-group">
					<label for="" class="col-sm-3 control-label">Pelanggan</label>
					<div class="col-sm-4">
					  <input type="text" class="form-control out" name="costumer" value="<?php print $lists['costumer']; ?>" required>
					</div>
				</div>
			<table class="table table-bordered" id="tbljual">
				<thead>
					<tr>
						<th>Barang</th>
						<th>Jumlah</th>
						<th>Satuan</th>
						<th>Total</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th colspan="3" style="text-align:right">Total:</th>
						<th></th>
					</tr>
				</tfoot>
			</table>
			 <div class="form-group">
				<div class="col-sm-offset-1 col-sm-1">
				  <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Tambah">Tambah</button>
				</div>
			  </div>
		</form>
			
		  </div>
      </div>

      <hr>

     <footer>
        <p> PT.Win Acc@Company 2014</p>
      </footer>
    </div>
    <script type='text/javascript'>
	
		$(document).ready(function(){
			var gentable = $('#tbljual').DataTable({
				info:false,
				"paging":false,
				"searching":false,
				 "footerCallback": function ( row, data, start, end, display ) {
						var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
						var intVal = function ( i ) {
							return typeof i === 'string' ?
								i.replace(/[\$,]/g, '')*1 :
								typeof i === 'number' ?
									i : 0;
						};
 
            // Total over all pages
							total = api
								.column( 3 )
								.data()
								.reduce( function (a, b) {
									return intVal(a) + intVal(b);
								}, 0 );
 
           
 
            // Update footer
						$(api.column( 3 ).footer()).html(' Rp'+ total +'');
					}
				
				});
			var button ="<div class='btn-group' role='group'>" +
								"<button class='edit btn btn-primary btn-xs' data-toggle='tooltip' rel='tooltip' data-placement='left' title='Edit'><i class='fa fa-edit fa-fw'></i></button>" +
								"<button class='delete btn btn-danger btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='right' title='Hapus'><i class='fa fa-trash-o'></i></button>"+
								"</div>";
			
			
			
			
			
			
			var sbody = $('#tbljual tbody');
				sbody.on('click','.edit',function(){
					var index = gentable.row($(this).parents('tr')).index();
					var data = gentable.row($(this).parents('tr')).data();
						$('#kodebrg').val(data[5]);
						$('#jlh').val(data[1]);
						$('#satuan').val(data[2]);
						$('#index').val(index);
				}).
				on('click','.delete',function(){
					 gentable
						.row( $(this).parents('tr') )
						.remove()
						.draw();
				});
				
				
				//validator
				$('#frm-keluar').bootstrapValidator({
				live: 'enabled',
				message: 'This value is not Valid',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				excluded:'disabled',
				fields: {
					
					kode_barang: {
						validators: {
							notEmpty: {
								message: 'Silahkan isi kode'
							}
							
						}
					},
					harga_penjualan: {
						validators: {
							notEmpty: {
								message: 'Silahkan isi suhu harga'
							},
							 numeric: {
								message: 'Suhu salah',
								
								thousandsSeparator: ',',
								decimalSeparator: '.'
							}	
						}
					},
					jumlah: {
						validators: {
							notEmpty: {
								message: 'Silahkan isi suhu jumlah'
							},
							 numeric: {
								message: 'Suhu salah',
								
								thousandsSeparator: ',',
								decimalSeparator: '.'
							}	
						}
					}
				}
			}).on('success.form.bv', function (e) {
        // Prevent form submission
				e.preventDefault();
				// Get the form instance
				var $form = $(e.target);
				// Get the BootstrapValidator instance
				var bv = $form.data('bootstrapValidator');
				// addto table
				var Id =$('#index').val();
				var tableitem=[$('#kodebrg option:selected').text(),
				$('#jlh').val(),
				$('#satuan').val(),
				parseInt($('#jlh').val())*parseInt($('#satuan').val()),
				button,
				$('#kodebrg').val()
				];
				if(Id==''){
					gentable.row.add(tableitem).draw(false);
				}else{
					gentable.row(Id).data([tableitem]).draw();
				}
				$('#frm-keluar').bootstrapValidator('resetForm',true);
				
			});
			
			$('#form-penjualan').bootstrapValidator({
				live: 'enabled',
				message: 'This value is not Valid',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				excluded:'disabled',
				fields: {
					
					tanggal_penjualan: {
						validators: {
							notEmpty: {
								message: 'Silahkan isi tanggal'
							}
							
						}
					},
					costumer: {
						validators: {
							notEmpty: {
								message: 'Silahkan isi Pelanggan'
							}	
						}
					}
				}
			}).on('success.form.bv', function (e) {
        // Prevent form submission
				e.preventDefault();
				// Get the form instance
				var $form = $(e.target);
				// Get the BootstrapValidator instance
				var bv = $form.data('bootstrapValidator');
				
				var _allitemsend = gentable.data();
				var data_items=null;
				//
				var strInput="";
				//looping
				for(var i=0;i<_allitemsend.length;i++){
						data_items=_allitemsend[i];
					for(var count=0;count<data_items.length;count++){
						switch(count){
							case 1:
							strInput+="<input type='hidden' name='jumlah[]' value='"+data_items[count]+"' />";
							break;
							case 2:
							strInput+="<input type='hidden' name='harga_penjualan[]' value='"+data_items[count]+"' />";
							break;
							case 5:
							strInput +="<input type='hidden' name='kode_barang[]' value='"+data_items[count]+"' />";
							break;
						}
						
					}
				}
				$form.append(strInput);
				var datasend = $form.serialize();
				
				$.ajax({
					type: 'POST',
					url: $form.attr('action'),
					data: datasend,
					dataType: 'json',
					success: function (data) {
							data=parseInt(data);
							if(data==1){
								alert('Data berhasil dikirim');
								window.location.href='brgkeluar.php';
							}else{
								alert('Data gagal dikirim!');
							}
							return false;
						},
						error: function (xhr,textStatus,errormessage) {
							alert("Kesalahan! ","Error !!"+xhr.status+" "+textStatus+" "+"Tidak dapat mengirim data!");
						},
						complete: function () {
							$form.bootstrapValidator('resetForm',true);
						}
					});
				
			});
			
			
			
		});
	</script>
</body>
</html>
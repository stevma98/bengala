
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Historial Cajas</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Contabilidad</span></li>
								<li><span>Historial</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
										<h2 class="card-title">Historial Cajas</h2>
                                    </header>
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>Fecha Caja</th>
													<th>Valor Apertura</th>
													<th>Valor Cierre</th>
                                                    <th>Estado</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php 
                                                    foreach($boxes as $box){ 
                                                    ?>
                                                    <tr id="<?php echo $box->ID_CAJA; ?>">
													<td><?php echo $box->FECHA_CAJA; ?></td>
                                                    <td><?php echo "$".number_format($box->VALOR_APERTURA,0,',','.'); ?></td>
                                                    <td><?php echo "$".number_format($box->VALOR_CIERRE,0,',','.'); ?></td>
													<td><?php echo $box->ESTADO_CAJA; ?></td>
													<td class="actions" style="width:200px"><a class="btn btn-primary" style="color:white" href="?controller=contability&method=template&id=<?php echo $box->FECHA_CAJA ?>"><i class="fas fa-eye"></i> Ver</a></td>
                                                    </tr>
                                                    <?php 
                                                    } ?>
												</tr>
											</tbody>
										</table>
									</div>
								</section>
							</div>
						</div>
						</div>
					</div>
								</div>
					<!-- end: page -->
				</section>
			</div>

			
		</section>	

		<!-- Examples -->
		<!-- <script src="Assets/js/examples/examples.notifications.js"></script> -->
		<script src="Assets/js/examples/examples.modals.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script>


        $('#PRECIO').mask('#.##0', {reverse: true});
		$('#PRECIO_COMPRA').mask('#.##0', {reverse: true});
		$('#PRECIOE_COMPRA').mask('#.##0', {reverse: true});
		$('#PRECIOE').mask('#.##0', {reverse: true});

		$(document).on('click','.modal-edit-article',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
                        $.ajax({
							type: 'POST',
							url: '?controller=inventory&method=getDataArticle',
							data: 'ID_PRO='+id,
							success:function(response){
                                var data = $.parseJSON(response);
                                $('#NOM_PROE').val(data[0]['NOM_PRO']);
                                $('#ID_GRUPOE').val(data[0]['ID_GRUPO']);
                                $('#CANTIDADE').val(data[0]['CANTIDAD']);
								$('#PRECIOE').val(data[0]['PRECIO']);
								$('#ID_PROE').val(data[0]['ID_PRO']);
								$('#PRECIOE_COMPRA').val(data[0]['PRECIO_COMPRA']);
							}
						});
					});

					$(document).on('click','.inactivate-article',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
                        $.ajax({
							type: 'POST',
							url: '?controller=inventory&method=inactivateArticle',
							data: 'ID_PRO='+id,
							success:function(response){
                                        new PNotify({
                                        title: 'Confirmado!',
                                        text: 'Producto Desactivado Exitosamente.',
                                        type: 'success'
                                    });
                                    setTimeout(() => {
                                    location.reload();	
                                    }, 2000);
                                },
                                error: function(data){
                                    $.magnificPopup.close();
                                    new PNotify({
                                        title: 'Rechazado!',
                                        text: 'Hubo un error al desactivar el producto',
                                        type: 'error',
                                        shadow: true
                                    });
                                }
						});
					});
		</script>
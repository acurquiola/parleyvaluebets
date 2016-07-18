@extends('app')

	@section('content')
		<div class="container">
		    <div class="row">
				<div class="col-md-12" >
					<br>
					<br>
					<div class="tabbable-panel" style="background-color: #fff">
						<div class="tabbable-line">
							<ul class="nav nav-tabs ">
								<li class="active">
									<a href="#tab1" data-toggle="tab">
									Página Inicial </a>
								</li>
								<li>
									<a href="#tab2" data-toggle="tab">
									Reporte </a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab1">
									<div class="pull-right">
										<div class="btn-group">
											<button type="button" class="btn btn-primary btn-filter" data-target="beisbol">Béisbol</button>
											<button type="button" class="btn btn-warning btn-filter" data-target="futbol">Fútbol</button>
											<button type="button" class="btn btn-default btn-filter" data-target="all">Todos</button>
										</div>
									</div>
									<div class="table-container">
										<table class="table table-filter">
							                <thead>
							                    <tr>
							                        <th align="center" >Fecha</th>
							                        <th align="center">Nombre</th>
							                        <th align="center" style="width: 300px">Partido</th>
							                        <th align="center" style="width: 150px">Ganador de Partido</th>
							                        <th align="center" colspan="2">Hándicap</th>
							                        <th align="center" colspan="2">Totales</th>
							                        <th align="center">Opciones</th>
							                    </tr>
							                </thead>
											<tbody>
												<tr data-status="beisbol">
													<td rowspan="2">
														18Jul
													</td>
													<td rowspan="2">
														20:00
													</td>
													<td>
														BAL Orioles (K Gausman)	
													</td>
													<td>
														1.8	
													</td>
													<td>
														-1.5
													</td>
													<td>
														2.30
													</td>
													<td>
														o9.5 
													</td>
													<td>
														2.00
													</td>
													<td rowspan="2">
												        <div class="col-sm-1" style="margin-right: 8px ">
												    		<div class="round round-sm blue "> 
												                <span class="glyphicon glyphicon-plus"> </span>
												            </div>
												    	</div>
														Todas las apuestas 
													</td>
												</tr>
												<tr data-status="beisbol">
													<td>
														NY Yankees (I Nova)	
													</td>

													<td>
														2.05
													</td>
													<td>
														+1.5
													</td>
													<td>
														1.67
													</td>
													<td>
														u9.5 
													</td>
													<td>
														1.83
													</td>
												</tr>
												<tr data-status="futbol">
													<td rowspan="2">
														18Jul
													</td>
													<td rowspan="2">
														18:00
													</td>
													<td>
														Millonarios
													</td>
													<td>
														1.8	
													</td>
													<td>
														-1
													</td>
													<td>
														2.30
													</td>
													<td>
														o9.5 
													</td>
													<td>
														2.00
													</td>
													<td rowspan="2">
												        <div class="col-sm-1" style="margin-right: 8px ">
												    		<div class="round round-sm blue "> 
												                <span class="glyphicon glyphicon-plus"> </span>
												            </div>
												    	</div>
														Todas las apuestas 
													</td>
												</tr>
												<tr data-status="futbol">
													<td>
														Alianza Petrolera
													</td>

													<td>
														2.05
													</td>
													<td>
														+1
													</td>
													<td>
														1.67
													</td>
													<td>
														u2 
													</td>
													<td>
														1.83
													</td>
												</tr>
												<tr data-status="beisbol">
													<td rowspan="2">
														18Jul
													</td>
													<td rowspan="2">
														20:00
													</td>
													<td>
														BAL Orioles (K Gausman)	
													</td>
													<td>
														1.8	
													</td>
													<td>
														-1.5
													</td>
													<td>
														2.30
													</td>
													<td>
														o9.5 
													</td>
													<td>
														2.00
													</td>
													<td rowspan="2">
												        <div class="col-sm-1" style="margin-right: 8px ">
												    		<div class="round round-sm blue "> 
												                <span class="glyphicon glyphicon-plus"> </span>
												            </div>
												    	</div>
														Todas las apuestas 
													</td>
												</tr>
												<tr data-status="beisbol">
													<td>
														NY Yankees (I Nova)	
													</td>

													<td>
														2.05
													</td>
													<td>
														+1.5
													</td>
													<td>
														1.67
													</td>
													<td>
														u9.5 
													</td>
													<td>
														1.83
													</td>
												</tr>
												<tr data-status="futbol">
													<td rowspan="2">
														18Jul
													</td>
													<td rowspan="2">
														18:00
													</td>
													<td>
														Millonarios
													</td>
													<td>
														1.8	
													</td>
													<td>
														-1
													</td>
													<td>
														2.30
													</td>
													<td>
														o9.5 
													</td>
													<td>
														2.00
													</td>
													<td rowspan="2">
												        <div class="col-sm-1" style="margin-right: 8px ">
												    		<div class="round round-sm blue "> 
												                <span class="glyphicon glyphicon-plus"> </span>
												            </div>
												    	</div>
														Todas las apuestas 
													</td>
												</tr>
												<tr data-status="futbol">
													<td>
														Alianza Petrolera
													</td>

													<td>
														2.05
													</td>
													<td>
														+1
													</td>
													<td>
														1.67
													</td>
													<td>
														u2 
													</td>
													<td>
														1.83
													</td>
												</tr>
												<tr data-status="beisbol">
													<td rowspan="2">
														18Jul
													</td>
													<td rowspan="2">
														20:00
													</td>
													<td>
														BAL Orioles (K Gausman)	
													</td>
													<td>
														1.8	
													</td>
													<td>
														-1.5
													</td>
													<td>
														2.30
													</td>
													<td>
														o9.5 
													</td>
													<td>
														2.00
													</td>
													<td rowspan="2">
												        <div class="col-sm-1" style="margin-right: 8px ">
												    		<div class="round round-sm blue "> 
												                <span class="glyphicon glyphicon-plus"> </span>
												            </div>
												    	</div>
														Todas las apuestas 
													</td>
												</tr>
												<tr data-status="beisbol">
													<td>
														NY Yankees (I Nova)	
													</td>

													<td>
														2.05
													</td>
													<td>
														+1.5
													</td>
													<td>
														1.67
													</td>
													<td>
														u9.5 
													</td>
													<td>
														1.83
													</td>
												</tr>
												<tr data-status="beisbol">
													<td rowspan="2">
														18Jul
													</td>
													<td rowspan="2">
														20:00
													</td>
													<td>
														BAL Orioles (K Gausman)	
													</td>
													<td>
														1.8	
													</td>
													<td>
														-1.5
													</td>
													<td>
														2.30
													</td>
													<td>
														o9.5 
													</td>
													<td>
														2.00
													</td>
													<td rowspan="2">
												        <div class="col-sm-1" style="margin-right: 8px ">
												    		<div class="round round-sm blue "> 
												                <span class="glyphicon glyphicon-plus"> </span>
												            </div>
												    	</div>
														Todas las apuestas 
													</td>
												</tr>
												<tr data-status="beisbol">
													<td>
														NY Yankees (I Nova)	
													</td>

													<td>
														2.05
													</td>
													<td>
														+1.5
													</td>
													<td>
														1.67
													</td>
													<td>
														u9.5 
													</td>
													<td>
														1.83
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane" id="tab2">
									<!-- Tabla de Usuarios -->
									<div class="nav-tabs-custom">                          
										<div class="box box-info">
											<div class="box-header with-border">
												<h3 class="box-title"><span class="ion ion-people-stalker"></span> MARKETS</h3>
											</div><!-- /.box-header -->
											<div class="box-body" id="table-wrapper">
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div><!-- /.col -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<br>
	<br>
	@endsection

	@section('script')
		<script type="text/javascript">

			function getTable(url){

				$('#table-wrapper').html("Cargando..").load(url)

			}
			
			$(document).ready(function () {

			    $('.btn-filter').on('click', function () {
			      var $target = $(this).data('target');
			      if ($target != 'all') {
			        $('.table tbody tr').css('display', 'none');
			        $('.table tbody tr[data-status="' + $target + '"]').fadeIn('slow');
			      } else {
			        $('.table tbody tr').css('display', 'none').fadeIn('slow');
			      }
			    });


	            /*	
		    	Listar los registros 
		    	*/

		    	$('#tab2').on('click', function(e){
		    		e.preventDefault();
		    		getTable("{{action('XmlReaderController@index')}}");
		    	}).trigger('click');

		    	$('#table-wrapper').delegate('.pagination li a', 'click', function(e){
		    		e.preventDefault();
		    		getTable($(this).attr('href').replace("/?", "?"));
				})

			 });
		</script>
	@endsection

                   
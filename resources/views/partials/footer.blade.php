				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
			<footer class="main-footer" >
				<div class="pull-right hidden-xs">
					<b>Version</b> 1.0
				</div>
				<strong>Copyright &copy; 2016.</strong> Todos los derechos reservados.
			</footer>
		</div><!-- ./wrapper
		<!-- jQuery 2.1.3 -->
		<script src=" {{ asset('/assets/js/jQuery/jQuery-2.1.3.min.js') }}" type="text/javascript"></script>  
		<!-- jQuery UI 1.11.2 -->
		<script src=" {{ asset('/assets/plugins/jQuery-ui/jquery-ui.js') }}" type="text/javascript"></script>   

		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.2 JS -->      
		<script src=" {{ asset('assets/js/bootstrap.js') }}" type="text/javascript"></script>
		<!-- SlimScroll -->
		<script src=" {{ asset('/assets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script> 
		<!-- FastClick -->
		<script src=" {{ asset('/assets/plugins/fastclick/fastclick.js') }}" type="text/javascript"></script>   

		<script type="text/javascript">
			$(function(){
				$('a[title]').tooltip();
			});
		</script>
	</body>
</html>

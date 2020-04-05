@if ($errors->any())
	<script>
		jQuery(document).ready(function($) {
			theme.showNotification('top','right','{{$errors->first()}}',3);
		});
	</script>
@endif
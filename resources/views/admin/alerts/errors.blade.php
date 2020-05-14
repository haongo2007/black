@if ($errors->has('permission') || $errors->has('act_err'))
	<script>
		jQuery(document).ready(function($) {
			theme.showNotification('top','right','{{$errors->first()}}',3);
		});
	</script>
@endif
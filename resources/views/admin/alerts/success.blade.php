@if (session($key ?? 'status'))
	<script>
		jQuery(document).ready(function($) {
			theme.showNotification('top','right','{{ session($key ?? 'status') }}',2);
		});
	</script>
@endif
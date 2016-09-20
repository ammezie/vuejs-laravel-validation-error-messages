<template>
	<span class="help-block">
        <!-- this will be replaced by the error messages -->
		<slot></slot>
	</span>
</template>

<script>
	export default {
		props: ['errors'],
	}
</script>
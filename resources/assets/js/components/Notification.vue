<template>
	<div class="alert alert-success">
        <slot></slot>
    </div>
</template>

<script>
	export default {
		props: ['message']
	}
</script>
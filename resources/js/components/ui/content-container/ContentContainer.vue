<script setup lang="ts">
type Props = {}

defineProps<Props>()
</script>

<template>
    <div class="content-container [ px-8 mx-auto max-w-5xl ]">
        <slot></slot>
    </div>
</template>

<style scoped></style>

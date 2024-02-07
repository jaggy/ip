<script setup lang="ts">
import AppHeader from "./AppHeader.vue"

type Props = {}

defineProps<Props>()
</script>

<template>
    <div>
        <AppHeader />

        <div>
            <slot></slot>
        </div>
    </div>
</template>

<style scoped></style>

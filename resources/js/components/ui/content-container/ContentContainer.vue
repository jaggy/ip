<script setup lang="ts">
import { contentContainerVariants } from "."
import { cn } from "@/utils"

type Props = {
    padding?: NonNullable<Parameters<typeof contentContainerVariants>[0]>["padding"]
    wrap?: NonNullable<Parameters<typeof contentContainerVariants>[0]>["wrap"]
}

defineProps<Props>()
</script>

<template>
    <div :class="cn(contentContainerVariants({ wrap, padding }))">
        <slot></slot>
    </div>
</template>

<style scoped></style>

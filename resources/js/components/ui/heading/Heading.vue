<script setup lang="ts">
import { headingVariants } from "."
import { cn } from "@/utils"

type Props = {
    level?: NonNullable<Parameters<typeof headingVariants>[0]>["level"]
}

const { level } = defineProps<Props>()

const as = `h${level}`
</script>

<template>
    <Component :is="as" :class="cn(headingVariants({ level }))">
        <slot></slot>
    </Component>
</template>

<style scoped></style>

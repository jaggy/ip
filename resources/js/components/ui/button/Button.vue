<script setup lang="ts">
import { buttonVariants } from "."
import { Primitive, type PrimitiveProps } from "radix-vue"
import { cn } from "@/utils"

interface Props extends PrimitiveProps {
    look?: NonNullable<Parameters<typeof buttonVariants>[0]>["look"]
    size?: NonNullable<Parameters<typeof buttonVariants>[0]>["size"]
    as?: string
}

withDefaults(defineProps<Props>(), {
    as: "button",
})
</script>

<template>
    <Primitive :as="as" :as-child="asChild" :class="cn(buttonVariants({ look, size }), $attrs.class ?? '')">
        <slot />
    </Primitive>
</template>

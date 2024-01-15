<script setup lang="ts">
import { useSlots } from "vue"
import { Label } from "@/components/ui/label"

type Props = {
    label: string
    id: string
    error?: string
}

defineProps<Props>()

const slots = useSlots()
</script>

<template>
    <div class="field">
        <div class="[ mb-1.5 ]">
            <Label :for="id">{{ label }}</Label>

            <div class="field__hint [ text-sm text-muted-foreground ]" v-if="slots.hint">
                <slot name="hint"></slot>
            </div>
        </div>

        <div class="field__control">
            <slot></slot>
        </div>

        <p v-if="error" class="field__error [ text-sm text-red-600 mt-1 ]">{{ error }}</p>
    </div>
</template>

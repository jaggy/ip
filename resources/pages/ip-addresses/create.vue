<script setup lang="ts">
import { useForm } from "@inertiajs/vue3"
import { Button } from "@/components/ui/button"

type Props = {
    links: Links
}

defineProps<Props>()

const form = useForm({
    ip_address: "",
    label: "",
})

function submit() {
    if (form.processing) {
        return
    }
}
</script>

<template>
    <div>
        <form :action="links.store_path" method="POST" @submit.prevent="submit">
            <Button :disabled="form.processing"> Add IP Address </Button>
        </form>
    </div>
</template>

<style scoped></style>

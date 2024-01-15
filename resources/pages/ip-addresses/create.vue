<script setup lang="ts">
import { useForm } from "@inertiajs/vue3"
import { Button } from "@/components/ui/button"
import { ContentContainer } from "@/components/ui/content-container"
import { CsrfField } from "@/components/ui/csrf-field"
import { Field } from "@/components/ui/field"
import { Heading } from "@/components/ui/heading"
import { Input } from "@/components/ui/input"

type Props = {
    links: Links
}

const { links } = defineProps<Props>()

const form = useForm({
    ip_address: "",
    label: "",
})

function submit() {
    if (form.processing) {
        return
    }

    form.post(links.store_path)
}
</script>

<template>
    <div class="[ py-12 ]">
        <ContentContainer wrap="dialog">
            <Heading> Add a new IP Address </Heading>

            <form :action="links.store_path" method="POST" @submit.prevent="submit" class="[ grid gap-6 ]">
                <CsrfField />

                <Field label="Label" id="label" :error="form.errors.label">
                    <Input id="label" name="label" v-model="form.label" />
                </Field>

                <Field label="IP Address" id="ip-address" :error="form.errors.ip_address">
                    <template #hint>
                        <p>This supports both IPv4 and IPv6.</p>
                    </template>

                    <Input id="ip-address" name="ip_address" v-model="form.ip_address" placeholder="192.168.0.1" />
                </Field>

                <div class="[ flex justify-end ]">
                    <Button :disabled="form.processing"> Add IP Address </Button>
                </div>
            </form>
        </ContentContainer>
    </div>
</template>

<style scoped></style>

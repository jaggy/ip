<script setup lang="ts">
import { useForm } from "@inertiajs/vue3"
import { Button } from "@/components/ui/button"
import { ContentContainer } from "@/components/ui/content-container"
import { CsrfField } from "@/components/ui/csrf-field"
import { Field } from "@/components/ui/field"
import { Heading } from "@/components/ui/heading"
import { Input } from "@/components/ui/input"
import { Page } from "@/components/ui/page"

type Props = {
    links: Links
    ipAddress: App.IpAddress
}

const { links, ipAddress } = defineProps<Props>()

const form = useForm({
    label: ipAddress.label,
})

function submit() {
    if (form.processing) {
        return
    }

    form.put(links.update_path)
}
</script>

<template>
    <Page>
        <ContentContainer wrap="dialog">
            <Heading> Add a new IP Address </Heading>

            <form :action="links.update_path" method="POST" @submit.prevent="submit" class="[ grid gap-6 ]">
                <CsrfField />

                <Field label="IP Address" id="ip-address">
                    <template #hint>
                        <p>The IP Address can't be changed</p>
                    </template>

                    <Input id="ip-address" name="ip_address" :model-value="ipAddress.ip_address" readonly class="[ bg-muted ]" />
                </Field>

                <Field label="Label" id="label" :error="form.errors.label">
                    <Input id="label" name="label" v-model="form.label" />
                </Field>

                <div class="[ flex justify-end ]">
                    <Button :disabled="form.processing"> Update IP address </Button>
                </div>
            </form>
        </ContentContainer>
    </Page>
</template>

<style scoped></style>

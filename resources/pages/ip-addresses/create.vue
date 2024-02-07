<script setup lang="ts">
import { useForm } from "@inertiajs/vue3"
import AppLayout from "@/components/layouts/AppLayout.vue"
import { Button } from "@/components/ui/button"
import { Card, CardContent, CardFooter, CardHeader, CardTitle } from "@/components/ui/card"
import { ContentContainer } from "@/components/ui/content-container"
import { CsrfField } from "@/components/ui/csrf-field"
import { Field } from "@/components/ui/field"
import { Input } from "@/components/ui/input"
import { Page } from "@/components/ui/page"

defineOptions({
    layout: AppLayout,
})

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
    <Page>
        <ContentContainer wrap="dialog">
            <Card>
                <form :action="links.store_path" method="POST" @submit.prevent="submit">
                    <CsrfField />
                    <CardHeader>
                        <CardTitle> Add a new IP Address </CardTitle>
                    </CardHeader>
                    <CardContent class="[ grid gap-6 ]">
                        <Field label="IP Address" id="ip-address" :error="form.errors.ip_address">
                            <template #hint>
                                <p>This supports both IPv4 and IPv6.</p>
                            </template>

                            <Input id="ip-address" name="ip_address" v-model="form.ip_address" placeholder="192.168.0.1" />
                        </Field>

                        <Field label="Label" id="label" :error="form.errors.label">
                            <Input id="label" name="label" v-model="form.label" />
                        </Field>
                    </CardContent>

                    <CardFooter class="[ flex justify-end ]">
                        <Button :disabled="form.processing"> Add IP Address </Button>
                    </CardFooter>
                </form>
            </Card>
        </ContentContainer>
    </Page>
</template>

<style scoped></style>

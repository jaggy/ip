<script setup lang="ts">
import { useForm } from "@inertiajs/vue3"
import { Button } from "@/components/ui/button"
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card"
import { ContentContainer } from "@/components/ui/content-container"
import { CsrfField } from "@/components/ui/csrf-field"
import { Field } from "@/components/ui/field"
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
            <Card>
                <form :action="links.update_path" method="POST" @submit.prevent="submit">
                    <CsrfField />
                    <CardHeader>
                        <CardTitle>Update IP address</CardTitle>
                    </CardHeader>
                    <CardContent class="[ grid gap-6 ]">
                        <Field label="IP Address" id="ip-address">
                            <template #hint>
                                <p>The IP address cannot be changed</p>
                            </template>

                            <Input id="ip-address" name="ip_address" :default-value="ipAddress.ip_address" readonly />
                        </Field>

                        <Field label="Label" id="label" :error="form.errors.label">
                            <Input id="label" name="label" v-model="form.label" />
                        </Field>
                    </CardContent>

                    <CardFooter class="[ flex justify-end ]">
                        <Button :disabled="form.processing">Update IP Address</Button>
                    </CardFooter>
                </form>
            </Card>
        </ContentContainer>
    </Page>
</template>

<style scoped></style>

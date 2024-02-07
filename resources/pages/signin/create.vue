<script setup lang="ts">
import { useForm } from "@inertiajs/vue3"
import { Button } from "@/components/ui/button"
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card"
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
    email: "",
    password: "",
})

function submit() {
    form.post(links.store_path)
}
</script>

<template>
    <div class="[ h-screen w-screen flex justify-center items-center ]">
        <ContentContainer wrap="dialog">
            <Card>
                <form :action="links.store_path" method="POST" @submit.prevent="submit">
                    <CsrfField />
                    <CardHeader>
                        <CardTitle>IP Management</CardTitle>
                        <CardDescription>Sign in to manage your ip addresses.</CardDescription>
                    </CardHeader>
                    <CardContent class="[ grid gap-4 ]">
                        <Field id="email" label="Email address" :error="form.errors.email">
                            <Input type="email" name="email" v-model="form.email" />
                        </Field>

                        <Field id="password" label="Password">
                            <Input type="password" name="password" v-model="form.password" />
                        </Field>
                    </CardContent>

                    <CardFooter class="[ flex justify-end ]">
                        <Button type="submit">Sign in</Button>
                    </CardFooter>
                </form>
            </Card>
        </ContentContainer>
    </div>
</template>

<style scoped></style>

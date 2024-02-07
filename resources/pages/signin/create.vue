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
    email: "",
    password: "",
})

function submit() {
    form.post(links.store_path)
}
</script>

<template>
    <ContentContainer wrap="dialog">
        <Heading class="[ leading-tight ]">Sign in</Heading>

        <form method="POST" @submit.prevent="submit" class="[ grid gap-4 ]">
            <CsrfField />

            <Field id="email" label="Email address" :error="form.errors.email">
                <Input type="email" name="email" v-model="form.email" />
            </Field>

            <Field id="password" label="Password">
                <Input type="password" name="password" v-model="form.password" />
            </Field>

            <div class="[ flex justify-end ]">
                <Button type="submit">Sign in</Button>
            </div>
        </form>
    </ContentContainer>
</template>

<style scoped></style>

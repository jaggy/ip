<script setup lang="ts">
import { ContentContainer } from "@/components/ui/content-container"
import { Heading } from "@/components/ui/heading"

type Props = {
    ipAddress: App.IpAddress
}

defineProps<Props>()
</script>

<template>
    <div class="[ py-12 ]">
        <ContentContainer>
            <Heading>{{ ipAddress.label }}</Heading>
        </ContentContainer>
    </div>
</template>

<style scoped></style>

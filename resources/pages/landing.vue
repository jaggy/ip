<script lang="ts" setup>
import { Button } from "@/components/ui/button"
import { ContentContainer } from "@/components/ui/content-container"

const message = "Hello"
</script>

<template>
    <div class="[ py-12 ]">
        <ContentContainer>
            {{ message }}

            <Button>I'm a button</Button>
        </ContentContainer>
    </div>
</template>

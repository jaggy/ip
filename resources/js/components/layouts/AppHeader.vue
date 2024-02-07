<script setup lang="ts">
import { ContentContainer } from "@/components/ui/content-container"
import { $user } from "../../request"

type Props = {}

defineProps<Props>()
</script>

<template>
    <header class="[ py-8 ]">
        <ContentContainer class="[ flex justify-between ]">
            <div class="[ flex ]">
                <div class="[ text-lg font-semibold tracking-tighter ]">IP Management</div>

                <nav>
                    <a href="/ip-addresses">Home</a>
                </nav>
            </div>

            <div>
                {{ $user.name }}
            </div>
        </ContentContainer>
    </header>
</template>

<style scoped></style>

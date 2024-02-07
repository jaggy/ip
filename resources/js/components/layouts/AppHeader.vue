<script setup lang="ts">
import AppUserDropdown from "@/components/layouts/AppUserDropdown.vue"
import { ContentContainer } from "@/components/ui/content-container"
import { $user } from "../../request"

type Props = {}

defineProps<Props>()
</script>

<template>
    <header class="[ py-8 ]">
        <ContentContainer class="[ flex justify-between ]">
            <div class="[ flex gap-4 items-center ]">
                <div class="[ text-lg font-semibold tracking-tighter ]">IP Management</div>

                <nav class="[ text-sm font-medium ]">
                    <a href="/ip-addresses">Home</a>
                </nav>
            </div>

            <div>
                <AppUserDropdown />
            </div>
        </ContentContainer>
    </header>
</template>

<style scoped></style>

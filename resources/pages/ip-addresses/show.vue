<script setup lang="ts">
import { ContentContainer } from "@/components/ui/content-container"
import { Heading } from "@/components/ui/heading"
import { Page } from "@/components/ui/page"

type Props = {
    ipAddress: App.IpAddress
    audits: App.Audit[]
}

defineProps<Props>()
</script>

<template>
    <Page>
        <ContentContainer>
            <Heading>{{ ipAddress.label }}</Heading>

            <section class="[ grid gap-4 ]">
                <h2>Audit Trail</h2>

                <div v-for="audit in audits" :key="audit.id">
                    <template v-if="audit.event === 'created'">
                        <div class="[ flex items-center gap-2 ]">
                            <div>Added by {{ audit.user.name }}</div>
                            <div class="[ text-sm text-muted-foreground ]">{{ audit.created_at.short }}</div>
                        </div>
                    </template>

                    <template v-if="audit.event === 'updated'">
                        <div>
                            <div class="[ flex items-center gap-2 ]">
                                <div>Updated by {{ audit.user.name }}</div>
                                <div class="[ text-sm text-muted-foreground ]">{{ audit.created_at.short }}</div>
                            </div>

                            <div class="[ ps-4 ]">
                                <div v-for="([attribute, changes], index) in Object.entries(audit.changes)" :key="index" class="[ flex items-center ]">
                                    <div class="[ w-12 capitalize font-medium ]">
                                        {{ attribute }}
                                    </div>

                                    <div>
                                        was changed <span class="[ text-muted-foreground ]">{{ changes.before }}</span> to <span class="[ font-medium ]">{{ changes.after }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </section>
        </ContentContainer>
    </Page>
</template>

<style scoped></style>

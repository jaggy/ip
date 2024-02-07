<script setup lang="ts">
import { ContentContainer } from "@/components/ui/content-container"
import { Heading } from "@/components/ui/heading"

type Props = {
    ipAddress: App.IpAddress
    audits: App.Audit[]
}

defineProps<Props>()
</script>

<template>
    <div class="[ py-12 ]">
        <ContentContainer>
            <Heading>{{ ipAddress.label }}</Heading>

            <section class="[ grid gap-4 ]">
                <div v-for="audit in audits" :key="audit.id">
                    <template v-if="audit.event === 'created'">
                        <div>IP Address created</div>
                    </template>

                    <template v-if="audit.event === 'updated'">
                        <div>
                            <div>IP Address updated</div>

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
    </div>
</template>

<style scoped></style>

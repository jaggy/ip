<script setup lang="ts">
import { Button } from "@/components/ui/button"
import { ContentContainer } from "@/components/ui/content-container"
import { Heading } from "@/components/ui/heading"
import { Page } from "@/components/ui/page"
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from "@/components/ui/table"
import { inertia } from "@/utils"

type Props = {
    ipAddresses: App.IpAddress[]
    links: Links
}

defineProps<Props>()
</script>

<template>
    <Page>
        <ContentContainer>
            <header class="[ flex justify-between items-center ]">
                <Heading>IP Addresses</Heading>

                <div>
                    <Button as="a" :href="links.create_path"> Add ip address </Button>
                </div>
            </header>

            <Table class="[ mt-12 ]">
                <TableHeader>
                    <TableRow>
                        <TableHead>Label</TableHead>
                        <TableHead>IP Address</TableHead>
                        <TableHead>Actions</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="ipAddress in ipAddresses" :key="ipAddress.id">
                        <TableCell>{{ ipAddress.label }}</TableCell>
                        <TableCell>{{ ipAddress.ip_address }}</TableCell>
                        <TableCell>
                            <div class="[ flex gap-4 ]">
                                <Button @click="inertia" size="sm" look="secondary" as="a" :href="ipAddress.links.show_path">View</Button>
                                <Button @click="inertia" size="sm" look="secondary" as="a" :href="ipAddress.links.edit_path">Edit</Button>
                            </div>
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </ContentContainer>
    </Page>
</template>

<style scoped></style>

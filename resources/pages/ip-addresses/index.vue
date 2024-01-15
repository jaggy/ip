<script setup lang="ts">
import { Button } from "@/components/ui/button"
import { ContentContainer } from "@/components/ui/content-container"
import { Heading } from "@/components/ui/heading"
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from "@/components/ui/table"

type Props = {
    ipAddresses: {
        id: number
        label: string
        ip_address: string
    }[]
}

defineProps<Props>()
</script>

<template>
    <div class="[ py-12 ]">
        <ContentContainer>
            <Heading>IP Addresses</Heading>

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
                                <Button size="sm" look="secondary" as="a" href="ipAddress.links.show_path">View</Button>
                                <Button size="sm" look="secondary" as="a" href="ipAddress.links.update_path">Edit</Button>
                            </div>
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </ContentContainer>
    </div>
</template>

<style scoped></style>

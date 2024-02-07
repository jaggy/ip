<script setup lang="ts">
import { DropdownMenuRoot } from "radix-vue"
import { router } from "@inertiajs/vue3"
import { Button } from "@/components/ui/button"
import { DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from "@/components/ui/dropdown-menu"
import { $user } from "../../request"

type Props = {}

defineProps<Props>()

function signout() {
    router.delete("/signout")
}
</script>

<template>
    <DropdownMenuRoot>
        <DropdownMenuTrigger as-child>
            <Button look="ghost" type="button" class="[ tracking-tight ]">
                {{ $user.name }}
            </Button>
        </DropdownMenuTrigger>

        <DropdownMenuContent class="[ w-[16rem] ]">
            <div class="[ px-4 py-2 border-b text-sm mb-2 ]">
                <div>
                    <p class="[ text-xs text-muted-foreground ]">You're signed in as</p>
                    <span class="[ font-medium tracking-tight ]">{{ $user.name }}</span>
                </div>
            </div>

            <DropdownMenuItem @select="signout"> Sign out </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenuRoot>
</template>

<style scoped></style>

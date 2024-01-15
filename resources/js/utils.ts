import { type ClassValue, clsx } from "clsx"
import { twMerge } from "tailwind-merge"
import { router } from "@inertiajs/vue3"
import { camelize, getCurrentInstance, toHandlerKey } from "vue"

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs))
}

export function inertia(event: PointerEvent) {
    if (event.shiftKey || event.altKey || event.metaKey || event.ctrlKey) {
        return
    }

    event.preventDefault()

    router.visit(event.currentTarget.href)
}

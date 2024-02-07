import { usePage } from "@inertiajs/vue3"
import { computed } from "vue"

const page = usePage()

export const $user = computed(() => page.props.inertiaUser as App.User)

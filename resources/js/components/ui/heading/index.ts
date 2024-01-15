import { cva } from "class-variance-authority"

export { default as Heading } from "./Heading.vue"

export const headingVariants = cva(`content-container [ mx-auto w-full ]`, {
    variants: {
        level: {
            1: "[ text-3xl font-semibold tracking-tight ]",
        },
    },
    defaultVariants: {
        level: 1,
    },
})

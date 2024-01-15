import { cva } from "class-variance-authority"

export { default as ContentContainer } from "./ContentContainer.vue"

const WrapOptions = {
    none: "wrap--none",
    dialog: "wrap--dialog [ max-w-xl ]",
    medium: "wrap--medium [ max-w-5xl ]",
}

const PaddingOptions = {
    none: "padding--none",
    viewport: "padding--default [ px-[8vw] md:px-[6vw] lg:px-[4vw] 2xl:px-12 ]",
}

export const contentContainerVariants = cva(`content-container [ mx-auto w-full ]`, {
    variants: {
        wrap: WrapOptions,
        padding: PaddingOptions,
    },
    defaultVariants: {
        wrap: "medium",
        padding: "viewport",
    },
})

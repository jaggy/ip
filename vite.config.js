import vue from "@vitejs/plugin-vue"
import laravel from "laravel-vite-plugin"
import path from "path"
import { defineConfig } from "vite"

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.ts"],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            "@": path.resolve("resources/js"),
        },
    },
})

import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";
import livewire, { defaultWatches } from "@defstudio/vite-livewire-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/backend.js",
                "resources/sass/backend.scss",
                "resources/js/frontend.js",
                "resources/sass/frontend.scss",
            ],
            refresh: false,
        }),
        livewire({
            refresh: [
                "resources/sass/backend.scss",
                "resources/sass/frontend.scss",
            ],
        }),
    ],
    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
        },
    },
});

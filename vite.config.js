import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
const path = require("path"); // <-- require path from node

export default defineConfig({
    plugins: [
        laravel({
            // edit the first value of the array input to point to our new sass files and folder.
            input: [
                //* assets backoffice
                "resources/scss/app.scss",
                "resources/js/app.js",

                //*assets frontoffice
                "resources/scss/front.scss",
                "resources/js/front.js",
            ],
            refresh: true,
        }),
    ],
    // Add resolve object and aliases
    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
            "~resources": "/resources/",
        },
    },
});

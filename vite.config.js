import path from 'path';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

function getFiles(dir, ext = '') {
    return readdirSync(resolve(__dirname, dir))
        .filter(file => file.endsWith(ext))
        .map(file => `${dir}/${file}`);
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                path.resolve(__dirname, 'resources/css/**/*.css'), // Tất cả các file CSS trong thư mục resources/css
                path.resolve(__dirname, 'resources/js/**/*.js'),   // Tất cả các file JS trong thư mục resources/js
            ],
            refresh: true,
        }),
    ],
});

import path from 'path';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { readdirSync } from 'fs';

// Hàm getFiles để lấy các file có phần mở rộng cụ thể
function getFiles(dir, ext = '') {
    return readdirSync(path.resolve(__dirname, dir))
        .filter(file => file.endsWith(ext))
        .map(file => `${dir}/${file}`);
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Tìm tất cả các file CSS và JS trong thư mục resources/css và resources/js
                ...getFiles('resources/css', '.css'),
                ...getFiles('resources/js', '.js'),
            ],
            refresh: true,
        }),
    ],
});

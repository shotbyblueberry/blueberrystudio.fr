const fs = require('fs');
const path = require('path');

// Variables to setup
const baseUrl = 'http://blueberrypictures.fr/'; // Base URL of the website
const excludedPages = ['admin.php', 'adminLogin.php','404.php', '500.php', '403.php']; // Pages to exclude from the sitemap
const priorityPages = ['index.php']; // Priority is set to 1 for these pages
const defaultPriority = 0.8; // Default priority for pages

// Generate sitemap content
function generateSitemap(pages, priorityPages) {
    const currentDate = new Date().toISOString().split('T')[0];

    let xml = `<?xml version="1.0" encoding="UTF-8"?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">`;

    pages.forEach(page => {
        xml += `
        <url>
            <loc>${baseUrl}${page}</loc>
            <lastmod>${currentDate}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>${priorityPages.includes(page) ? '1' : defaultPriority}</priority>
        </url>`;
    });

    xml += `
    </urlset>`;

    return xml;
}

// List pages to include in the sitemap
const pages = fs.readdirSync(path.join(__dirname, '../'))
    .filter(file => file.endsWith('.php') && !excludedPages.includes(file));
    //.map(file => `/${file.replace('.php', '')}`); // Extension remover

// Write content to sitemap.xml
const sitemapPath = path.join(__dirname, '../sitemap.xml');
const sitemapContent = generateSitemap(pages, priorityPages);

fs.writeFile(sitemapPath, sitemapContent, err => {
    if (err) {
        console.error('Error while generating the sitemap:', err);
    } else {
        console.log('The file sitemap.xml has been generated successfully!');
    }
});
const items = [
    'Linux',
    'Unix',
    'Sudo',
    'Apt',
    'Get',
    'TypeScript',
    'JavaScript',
    'JS',
    'Ajax',
    'ES6',
    'ECMAScript 6',
    'Node.js',
    'npm',
    'npx',
    'Yarn',
    'React.js',
    'ReactNative.js',
    'Next.js',
    'Nuxt.js',
    'Vite.js',
    'Vue.js',
    'Express.js',
    'Python',
    'Django',
    'Artificial Intelligence',
    'PHP',
    'Laravel',
    'Blade',
    'Composer',
    'HTML',
    'CSS',
    'SCSS',
    'SASS',
    'Java',
    'Android Application',
    'iOS Application',
    'Photoshop',
    'Adobe XD',
    'Figma',
    'SEO',
    'Git',
    'SQL',
    'MySQL',
    'MangoDB',
    'SQLite',
    'XML',
    'JSON',
    'C',
    'Arduino',
];

items.forEach((item) => {
    for (let i = 0; i < 10; i++) {
        const span = document.createElement('span');
        span.innerText = item;
        span.style.opacity = Math.random();
        span.style.transform = `translate(${-90 + ~~(Math.random() * 180)}vw, ${90 - ~~(Math.random() * 180)}vh)`;

        document.querySelector('#bg').append(span);
    }
});